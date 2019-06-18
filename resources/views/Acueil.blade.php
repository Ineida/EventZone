@extends('template')

@section('titre_page')
    Page acueil
@endsection

@section('titre')
    <h1 class="align-content-center text-success"> La page d'accueil </h1>
@endsection

@section('contenu')

    <section>
        <h2 class="align-content-center text-success">L'entreprise </h2>
        <p>Organiser un événement sans perte de temps et
        d’énergie, voici ce qui nous a motivé dans la création
        de notre entreprise. Tout le monde sait que
        l’organisation d’un événement demande une
        préparation et une rigueur à toute épreuve ainsi
        qu’un lourd travail en amont. De longues recherches
        dans les annuaires, sur le Web, ou dans son
        entourage proche pour réaliser l’événement parfait.
        Qu’en-est-il si tout cela était réuni sous une seule et même plateforme ?</p>

        <p>EventZone propose à la clientèle un site internet de
        comparaison de prestataires dans le domaine de
        l’événementiel notamment mariages, anniversaires,
        baby shower ainsi que tout type de fêtes. La société
        pourra facilement se faire une place en proposant un
        service de qualité dont le besoin est évident dans un
        contexte où le secteur enregistre de belles perspectives
        de croissance. Avec une description détaillée des
        prestations réalisés par chacun des prestataires, un
        système de filtres pour trouver la prestation sur mesure
        et un système de notes basés sur les avis des particuliers
        ayant déjà eu affaire à un prestataire, plus besoin de
        paniquer pour organiser votre événement : cela devient à la portée de tous</p>
        <p> Vous retrouverez tout les prestataires grace à notre plateforme.
        <br/> Vous pouvez egalement laisser de commentaires ou postuler des annonce grace à votre compte utilisateur</p>
    </section>
    <section>
        <h2 class="align-content-center text-success">Services  </h2>
        <table border=2 class="align-items-center">
            <tr><th></th><th>Essentiel      </th><th>Premium    </th></tr>
            <tr><td>Description precise et complete de
                    la prestataire sur le
                    site web</td><td>   ok       </td><td>ok     </td></tr>
            <tr><td>Synchronisation de
                    l’agenda pour la
                    prise de rdv</td><td>    ok   </td><td>ok     </td></tr>
            <tr><td>Article rédigé dans le
                    magazine</td><td>       </td><td>ok        </td></tr>
            <tr><td>Affichage des
                    promotions sur le site</td><td>         </td><td>ok     </td></tr>
            <tr><td>Avis rédigés sur le
                    site</td><td></td><td>ok</td></tr>
            <tr><td><strong>Prix</strong></td><td>20 euros      </td><td>50 euros     </td></tr>

            <p>Vous pouvez vous inscrire sur notre plateforme en tant qu'etablissement ou en tant que prestataire si vous le souhaitez. Cela vous permetta de gagner en visibilité.</p>


        </table>
    </section>
    <section>
        <h2 class="align-content-center text-success">Qui sommes nous </h2>
        <p>D’une expérience de plusieurs années en tant que
            conseillères de prestataires sur les réseaux sociaux
            et le Web, Amina Bekkouche, Emma Dieny, Ines
            Belgacem, Manuela M. Gopdjim, Zeinab Hadja
            MAIGA et Ineida Cardoso nous sommes associés
            pour créer Event Zone qui révolutionnera le monde
            de l’événementiel particulier. Nous connaissant
            depuis le début de cette année, nous avons su
            marier nos savoirs afin d’être les plus polyvalentes
            et diversifiées possible.</p>
    </section>
@endsection