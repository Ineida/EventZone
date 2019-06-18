<?php

namespace App\Http\Controllers;

use App\Metier\annonce;
use App\Metier\client;
use App\Metier\Commentaire;
use App\Modeles\AnnonceDAO;
use App\Modeles\ClientDAO;
use App\Modeles\CommentaireDAO;
use App\Modeles\EtablissementDAO;
use App\Modeles\PrestataireDAO;
use App\Modeles\ProfessionDAO;
use App\Http\Requests\InsertionComRequest;
use App\Http\Requests\InsertionAnnonceRequest;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    //
    public function getClient($id){
        $cli=new ClientDAO();
        $client=$cli->getClientParId($id);
        return view('Client',compact('client'));
    }



    //// annonce
    public function AjouterAnnonce(){
        $pro=new ProfessionDAO();
        $listeProfession=$pro->listeProfession();
        return view("AjouterAnnonce",compact('listeProfession'));
    }
    public function postAjouterAnnonce(InsertionAnnonceRequest $request){
        $annonce=new annonce();
        $annonce->setDescription($request->input('description'));
        $annonce->setSujet($request->input('sujet'));
        $cli=new ClientDAO();
        $client=$cli->getClientParMail($request->input('email'));
        $annonce->setClient($client);

        $anno=new AnnonceDAO();
        $anno->creationAnnonce($annonce);
        return view('Confirmation');
    }

//// commentaire
    public function AjouterCommentaire(){
        $et=new EtablissementDAO();
        $etablissement=$et->getEtablissement();
        $p=new PrestataireDAO();
        $prestataire=$p->getLesPrestataires();
        return view('AjouterCommentaire',compact('etablissement','prestataire'));
    }
    public function postAjouterCommentaire(InsertionComRequest $request){
        $com=new Commentaire();
        $cli=new ClientDAO();
        $client=$cli->getIdClientParMail($request->input('email'));
        $com->setSujet($request->input('sujet'));
        $pre=new PrestataireDAO();
        $pr=$pre->getPrestataireParId($request->input('prestataire'));
        $com->setPretataire($pr);
        $com->setCommentaire($request->input('commentaire'));
        $com->setNote($request->input('note'));
        $et=new EtablissementDAO();
        $eta=$et->getEtablissementParId($request->input('etablissement'));
        $com->setEtablissement($eta);
        $com->setClient($client);

        $commentaire=new CommentaireDAO();
        $commentaire->creationCommentaire($com);
        return view('Confirmation');

    }
}
