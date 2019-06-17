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
use App\Http\Requests\InsertionConfRequest;
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
        $annonce->getDescription($request->input('description'));
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
        $com->setPretataire($request->input('prestataire'));
        $com->setCommentaire($request->input('commentaire'));
        $com->setNote($request->input('note'));
        $com->setEtablissement($request->input('etablissement'));
        $com->setClient($client);

        $commentaire=new CommentaireDAO();
        $commentaire->creationCommentaire($com);
        return view('Confirmation');

    }
}
