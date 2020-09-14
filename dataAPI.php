<?php
function pays($name)
{
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url .'?dataset=liste-des-pays-et-territoires-etrangers&q=&sort=libcog&facet=libcog&facet=libenr'. urlencode($name).'&rows=500';
// initialisation d'une session
    $curl = curl_init($request_url);
// spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
// envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response = json_decode(curl_exec($curl));
// fermeture de la session
    curl_close($curl);
// test
    foreach ($response->records as $infopays) {
        $pays[$infopays->fields->libcog] = $infopays->fields->libenr;
    }
    return $pays;
}
function cityNC($name)
{
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url .'?dataset=communes-nc&q='. urlencode($name).'&rows=50';
// initialisation d'une session
    $curl = curl_init($request_url);
// spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
// envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response = json_decode(curl_exec($curl));
// fermeture de la session
    curl_close($curl);
// stockage des villes et des codes postaux dans un tableau associatif
    foreach( $response->records as $infoville ){
        $villes[$infoville->fields->nom_minus]=$infoville->fields->code_post;
    }
    return $villes;
}
function offre($name){
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url .'?dataset=offres-demploi&q='. urlencode($name).'&rows=50';

    // initialisation d'une session
    $curl = curl_init($request_url);

    // spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

    // envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response = json_decode(curl_exec($curl));

    // fermeture de la session
    curl_close($curl);
    if($response)
        // stockage des villes et des codes postaux dans un tableau associatif
        foreach( $response->records as $infoOffre ){
            $offreListe[$infoOffre->fields->coderome]=$infoOffre->fields->titreoffre;
        }
    else{
        $offreListe = NULL;
    }
    return $offreListe;
}
function offreID($id){
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url .'?dataset=offres-demploi&q='. urlencode($id).'&rows=1';

    // initialisation d'une session
    $curl = curl_init($request_url);

    // spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

    // envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response = json_decode(curl_exec($curl));

    // fermeture de la session
    curl_close($curl);

    foreach ( $response->records as $infoOffre) {
        $detailsOffre["code"]=$infoOffre->fields->coderome;
        $detailsOffre["titre"]=$infoOffre->fields->titreoffre;
        $detailsOffre["type"]=$infoOffre->fields->typecontrat;
        $detailsOffre["commune"]=$infoOffre->fields->communeemploi;
        $detailsOffre["formation"]=$infoOffre->fields->niveauformation;
        $detailsOffre["experience"]=$infoOffre->fields->experience;
        $detailsOffre["diplome"]=$infoOffre->fields->diplome;
        $detailsOffre["mail"]=$infoOffre->fields->contact_mail;
        $detailsOffre["telephone"]=$infoOffre->fields->contact_telephone;
        $detailsOffre["identite"]=$infoOffre->fields->contact_identite;
        $detailsOffre["competences"]=$infoOffre->fields->competences_multivalue;
        $detailsOffre["activite "]=$infoOffre->fields->activites_multivalue;
    }
    return $detailsOffre;
}
?>