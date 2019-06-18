<?php

namespace App\Modeles;
use DB;
use App\Metier\annonce;
use http\Client;
use Illuminate\Database\Eloquent\Model;

class AnnonceDAO extends DAO
{
    public function getLesAnnonces($client)
    {
        $annonces = DB::table('annonce')->where('client','=',$client)->get();
        $annonce = array();
        foreach ($annonces as $anno) {
            $id= $anno->id;
            $annonce[$id] = $this->creerObjetMetier($anno);
        }
        return $annonce;

    }

    public function getAnnonceParId($id)
    {
        $annonces = DB::table('annonce')->where('id','=',$id)->first();
        $annonce= $this->creerObjetMetier($annonces);
        return $annonce;
    }

    //
    protected function creerObjetMetier(\stdClass $objet)
    {
        // TODO: Implement creerObjetMetier() method.
        $laAnnonce=new annonce();
        $laAnnonce->setId($objet->id);
        $laAnnonce->setSujet($objet->sujet);
        $laAnnonce->setDescription($objet->description);

        $cli=new ClientDAO();
        $client=$cli->getClientParId($objet->client);
        if($client){$laAnnonce->setClient($client);}
        else{$laAnnonce->setClient(null);}
        return $laAnnonce;
    }

    public function creationAnnonce(annonce $anonce)
    {
        DB::table('annonce')->insert(['client' => $anonce->getClient()->getAuthIdentifier(), 'sujet' => $anonce->getSujet(),
             'description' => $anonce->getDescription()]);
    }

}
