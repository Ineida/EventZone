<?php

namespace App\Modeles;


use App\Metier\etablissement;
use App\Metier\prestataire;
use DB;

class PrestataireDAO extends DAO
{

    //

    public function getLesPrestataires()
    {
        $prestataires = DB::table('prestataire')->get();
        $laPrestataire = array();
        foreach ($prestataires as $presta) {
            $id= $presta->id;
            $laPrestataire[$id] = $this->creerObjetMetier($presta);
        }
        return $laPrestataire;

    }

    public function getLesPrestatairesParEta($etab)
    {
        $prestataires = DB::table('prestataire')->where('etablissement','=',$etab)->get();
        $laPrestataire = array();
        foreach ($prestataires as $presta) {
            $id= $presta->id;
            $laPrestataire[$id] = $this->creerObjetMetier($presta);
        }
        return $laPrestataire;
    }

    public function getLesPrestatairesParProfession($etab)
    {
        $pro=new ProfessionDAO();
        $prof=$pro->getIdProfession($etab);
        $prestataires = DB::table('prestataire')->where('profession','=',$prof)->get();
        $laPrestataire = array();
        foreach ($prestataires as $presta) {
            $id= $presta->id;
            $laPrestataire[$id] = $this->creerObjetMetier($presta);
        }
        return $laPrestataire;
    }


    public function getLesPrestatairesParVille($etab)
    {
        $etab= DB::table('etablissement')->where('ville','=',$etab)->get();
        foreach ($etab as $e)
        {
            $prestataires = DB::table('prestataire')->where('etablissement','=',$e)->get();
            $laPrestataire = array();
            foreach ($prestataires as $presta) {
                $id= $presta->id;
                $laPrestataire[$id] = $this->creerObjetMetier($presta);
            }
        }
        return $laPrestataire;
    }

    public function getPrestataireParId($id)
    {
        $presta = DB::table('prestataire')->where('id','=',$id)->first();
        $laPrestataire = $this->creerObjetMetier($presta);

        return $laPrestataire;
    }



    protected function creerObjetMetier(\stdClass $objet)
    {
        // TODO: Implement creerObjetMetier() method.
        $prestataire= new prestataire();
        $prestataire->setId($objet->id);
        $prestataire->setNom($objet->nom);
        $prestataire->setAdresse($objet->adresse);
         $prestataire->setEtablissement($objet->etablissement);

        $p=new ProfessionDAO();
        $prof=$p->getProfessionById($objet->profession);
        if($prof){
            $prestataire->setProfession($prof);
        }else{
            $prestataire->setProfession(null);
        }

        $prestataire->setSalle($objet->salle);
        $prestataire->setDescription($objet->description);
        $prestataire->setTelephone($objet->telephone);

        if ($prestataire->getSalle()==1){
            $s=new SalleDAO();
            $salle=$s->getLesSallesParPrestataire($objet->id);
            if($salle){
                $prestataire->setLaSalle($salle);
            }
            else{
                $prestataire->setLaSalle(null);}
        }else{
            $prestataire->setLaSalle(null);
        }
        $com=new CommentaireDAO();
        $commentaires=$com->getLesCommentairesPrestataire($objet->id);
        if($commentaires){
            $prestataire->setCommentaires($commentaires);
            $note=$com->getNoteEtab($objet->id);
            $prestataire->setNoteClient($note);
        }
        $im=new ImagesDAO();
        $images=$im->getImagePrestataire($objet->id);
        $prestataire->setImages($images);

        return $prestataire;
    }

    public function creationPrestataire(prestataire $prestataire){
        $pro=new ProfessionDAO();
        DB::table('prestataire')->insert(['nom'=>$prestataire->getNom(),'adresse'=> $prestataire->getAdresse(),
            'telephone'=>$prestataire->getTelephone(), 'description'=>$prestataire->getDescription(),
            'profession'=>$pro->getIdProfession($prestataire->getProfession()), 'etablissement'=>$prestataire->getEtablissement(),
            'salle'=>$prestataire->getSalle()]);
        if ($prestataire->getSalle()==1){
            $s=new SalleDAO();
            $s->creationSalle($prestataire->getLaSalle());
        }
    }
}
