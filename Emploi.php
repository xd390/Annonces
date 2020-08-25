<html lang="fr">
<header>
</header>
<body>

<?php
$emploi = emploi('');
echo '<ul>';
foreach( $emploi as $nom => $cp ){
    echo '<li>'.$nom.' ('.$cp.')</li>';
}
echo '</ul>';

function emploi($name)
{
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url .'?dataset=offres-demploi&q=&facet=employeur_nomentreprise&facet=titreoffre'. urlencode($name).'&rows=500';
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
    foreach ($response->records as $infoEmploi) {
        $emploi[$infoEmploi->fields->employeur_nomentreprise] = $infoEmploi ->fields->titreoffre;
    }
    return $emploi;
}
?>
</body>
</html>