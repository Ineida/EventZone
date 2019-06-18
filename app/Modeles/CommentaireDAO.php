<?php

namespace App\Modeles;
use DB;
use App\Metier\Commentaire;
use Illuminate\Database\Eloquent\Model;

class CommentaireDAO extends DAO
{
    //
    public function getLesCommentaires($idEtab){
        $lesCommentaires=array();
        $commentaires=DB::table('commentaire')->select('id','sujet','etablissement','client','prestataire','commentaire','note' )->where("etablissement","=",$idEtab)->get();
        if($commentaires){
            foreach ($commentaires as $lecommentaire){
                $idCom=$lecommentaire->idCom;
                $lesCommentaires[$idCom]=$this->creerObjetMetier($lecommentaire);

            }
        }
        return $lesCommentaires;
    }
    public function getLesCommentairesPrestataire($idP){
        $lesCommentaires=array();
        $commentaires=DB::table('commentaire')->select('id','sujet','etablissement','client','prestataire','commentaire','note')->where("prestataire","=",$idP)->get();
        if($commentaires){
            foreach ($commentaires as $lecommentaire){
                $idCom=$lecommentaire->idCom;
                $lesCommentaires[$idCom]=$this->creerObjetMetier($lecommentaire);

            }
        }
        return $lesCommentaires;
    }

    public function getLesCommentairesEtab($idE)
    {
        $lesCommentaires = array();
        $commentaires = DB::table('commentaire')->select('id', 'sujet', 'etablissement', 'client', 'prestataire', 'commentaire', 'note')->where("etablissement", "=", $idE)->get();
        if ($commentaires) {
            foreach ($commentaires as $lecommentaire) {
                $idCom = $lecommentaire->idCom;
                $lesCommentaires[$idCom] = $this->creerObjetMetier($lecommentaire);

            }
        }
        return $lesCommentaires;
    }
    public function getNoteEtab($idE){
        $note =0;
        $commentaires = DB::table('commentaire')->select('id', 'sujet', 'etablissement', 'client', 'prestataire', 'commentaire', 'note')->where("etablissement", "=", $idE)->get();
        if ($commentaires) {
            foreach ($commentaires as $lecommentaire) {
                $note+=$lecommentaire->note;

            }
            $note=$note/count($commentaires);
        }else{
            return null;
        }
        return $note;
    }

    public function getNotePresta($idE){
        $note =0;
        $commentaires = DB::table('commentaire')->select('id', 'sujet', 'etablissement', 'client', 'prestataire', 'commentaire', 'note')->where("prestataire", "=", $idE)->get();
        if ($commentaires) {
            foreach ($commentaires as $lecommentaire) {
                $note+=$lecommentaire->note;

            }
            $note=$note/count($commentaires);
        }else{
            return null;
        }
        return $note;
    }

    public function getLesCommentairesClient($idC)
    {
        $lesCommentaires = array();
        $commentaires = DB::table('commentaire')->select('id', 'sujet', 'etablissement', 'client', 'prestataire', 'commentaire', 'note')->where("client", "=", $idC)->get();
        if ($commentaires) {
            foreach ($commentaires as $lecommentaire) {
                $idCom = $lecommentaire->idCom;
                $lesCommentaires[$idCom] = $this->creerObjetMetier($lecommentaire);

            }
        }
        return $lesCommentaires;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        // TODO: Implement creerObjetMetier() method.
        $com = new Commentaire();
        $com->setId($objet->id);

        $cli=new ClientDAO();
        $client=$cli->getClientParId($objet->client);
        if($client){$com->setClient($client);}
        else{$com->setClient(null);}

        $Etab=new EtablissementDAO();
        $etab=$Etab->getEtablissementParId($objet->etablissement);
        if($etab){$com->setEtablissement($etab);
        }else{$com->setEtablissement(null);}

        $com->setImage_chemin($objet->image_chemin);
        $com->setNote($objet->note);
        $com->setCommentaire($objet->commentaire);

        $p=new PrestataireDAO();
        $prest=$p->getPrestataireParId($objet->prestataire);
        if($prest){
            $com->setPretataire($prest);
        }else{$com->setPretataire(null);}

        $com->setSujet($objet->sujet);
        return $com;
    }

    public function creationCommentaire(Commentaire $comm)
    {
        DB::table('commentaire')->insert(['client' => $comm->getClient(), 'commentaire' => $comm->getCommentaire(),
             'note' => $comm->getNote(),
            'prestataire' => $comm->getPretataire()->getId(), 'etablissement' => $comm->getEtablissement()->getId(),
            'sujet' => $comm->getSujet()]);
    }
}
