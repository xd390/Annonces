<html lang="fr">
<header>
</header>
<body>

<?php
$pays = pays('');
echo '<ul>';
foreach( $pays as $nom => $cp ){
    echo '<li>'.$nom.' ('.$cp.')</li>';
}
echo '</ul>';

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
?>
</body>
</html>