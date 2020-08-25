<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Register</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<form method="post" action="annonces.php">
    <label for="nom"> nom</label>
    <input type="text" name="nom" id="idnom"/>
    <br />
    <label for="prenom"> prenom</label>
    <input type="text" name="prenom" id="idprenom"/>
    <br />
    <label for="mail"> adresse mail</label>
    <input type="text" name="mail" id="idmail"/>
    <br />
    <label for="pays"> pays</label>
    <select name="pays" id="idpays">
        <?php
        $pays = pays('');
        natsort($pays);
        foreach( $pays as $nom => $cp ){
            echo '<option>'.$nom.'</option>';
        }

        ?>
    </select>
    <br />
    <label for="ville"> ville</label>
    <select name="ville" id="idville">
        <?php
        $villesNC = cityNC('');
        natsort($villesNC);
        foreach( $villesNC as $nom => $cp ) {
            echo '<option>' . $nom . '</option>';
        }
        ?>
    </select>
    <br />
    <br />
    <label for="idlogin"> identifiant </label> :
    <input type="text" name="login" id="idlogin" placeholder="defaut" />
    <br />
    <label for="idpassword"> mot de passe </label> :
    <input type="password" name="password" id="idpassword" />
    <br />
    <input type="submit" value="Valider">
    <input type="button" value="Annuler" onClick="javascript:document.location.href='index.html'" />
</form>
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
?>
</body>
</html>