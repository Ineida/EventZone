<?php

namespace App\Modeles;

use App\Metier\profession;
use Illuminate\Database\Eloquent\Model;
use DB;
class ProfessionDAO extends DAO
{
    //
    public function listeProfession()
    {
        $professions = DB::table('profession')->get();
        $lesProfessions = array();
        foreach ($professions as $prof) {
            $id= $prof->id;
            $lesProfessions[$id] = $this->creerObjetMetier($prof);
        }
        return $lesProfessions;

    }

    public function getNomProfession($id){
        $prof=$this->listeProfession()[$id];
        return $prof;
    }

    public function getIdProfession($nom){
        $prof = DB::table('profession')->where("nom",'=',$nom)->first();
        $p=$this->creerObjetMetier($prof);
        return $p->getId();
    }

    public function getProfessionById($id){
        $profession = DB::table('profession')->where('id','=',$id)->first();
        $prof=$this->creerObjetMetier($profession);
        return $prof;
    }


    protected function creerObjetMetier(\stdClass $objet)
    {
        // TODO: Implement creerObjetMetier() method.
        $profession=new profession();
        $profession->setId($objet->id);
        $profession->setNom($objet->nom);
        return $profession;
    }

    public function creationProfession(profession $profession){
        DB::table('profession')->insert(['prestataire'=>$profession->getNom()]);
    }
}
