<?php

namespace App\Http\Controllers;

use App\Metier\prestataire;
use App\Modeles\EtablissementDAO;
use App\Modeles\PrestataireDAO;
use App\Http\Requests\InsertionPrestaRequest;
use App\Modeles\ProfessionDAO;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    //
    public function getPrestataires()
    {
        $conference=new PrestataireDAO();
        $lesPrestataires=$conference->getLesPrestataires();
        return view('listePrestataire', compact( 'lesPrestataires'));

    }

    public function getPrestataire($id){
        $prestataireDAO=new PrestataireDAO();
        $laprestataire=$prestataireDAO->getPrestataireParId($id);
        $EtablissementDAO=new EtablissementDAO();
        $Etablissement=$EtablissementDAO->getEtablissementParId($laprestataire->getEtablissement());
        return view('Prestataire', compact( 'laprestataire','Etablissement'));
    }

    public function getPrestatairesParVille($ville)
    {
        $conference=new PrestataireDAO();
        $lesPrestataires=$conference->getLesPrestataires();
        return view('listePrestataire', compact( 'lesPrestataires'));

    }

    public function Acueil(){
        return view('Acueil');
    }

    /// a voir
    public function getPrestatairesParProfession($prof){
        $prestataireDAO=new PrestataireDAO();
        $lesPrestataires=$prestataireDAO->getLesPrestatairesParProfession($prof);
        return view('listePrestataire', compact( 'lesPrestataires'));
    }

    public function InscrirePrestataire(){
        $professionDAO=new ProfessionDAO();
        $listeProfession=$professionDAO->listeProfession();
        return view("InscrirePrestataire",compact('listeProfession'));
    }

    public function postInscrirePrestataire(InsertionPrestaRequest $request){
        $prestataire=new prestataire();
        $prestataire->setNom($request->input('nom'));
        $prestataire->setTelephone($request->input('telephone'));
        $prestataire->setAdresse($request->input('adresse'));
        $prestataire->setEtablissement($request->input('etablissement'));
        $prestataire->setSalle($request->input('salle'));
        $prestataire->setDescription($request->input('description'));
        $pro=new ProfessionDAO();
        $p=$pro->getProfessionById($request->input('profession'));
        $prestataire->setProfession($p);
;        $cli=new PrestataireDAO();
        $cli->creationPrestataire($prestataire);
        return view('Confirmation');
    }
}
