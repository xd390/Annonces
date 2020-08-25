<html lang="fr">
<header>
</header>
<body>

<?php
    $villesNC = cityNC('');
    echo '<ul>';
        foreach( $villesNC as $nom => $cp ){
    echo '<li>'.$nom.' ('.$cp.')</li>';
    }
    echo '</ul>';

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
?>
</body>
</html>