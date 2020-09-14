<?php
// charge et initialise les bibliothèques globales
require_once 'model.php';
require_once 'dataAPI.php';
require_once 'controllers.php';
// démarrage de la session
session_start();
// route la requête en interne
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//initialisation de la variable error pour eviter les erreurs de variable non défini
$error = NULL;

//verification de si l'utlisateur est sur la page d'enregistrement
if('/dev_web/Anonnces/index.php/register' == $uri) {
    $login=NULL;
    register_action($login,$error);
    // exit pour empecher l'affichage d'index.php
    exit();
}

// enregistrement d'un utilisateur dans la base de donnee
elseif(isset($_POST['mail'])) {
    register2_action($_POST['login'], $_POST['password'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['pays'], $_POST['ville']);
}

//enregistrement d'un post dans la base de donnee
elseif(isset($_POST['body'])){
    create_post($_POST['title'],$_POST['body']);
}

// vérification utilisateur authentifié
if( !isset($_SESSION['login']) ) {
    if( !isset($_POST['login']) || !isset($_POST['password']) ) {
        $error='not connected';
        $uri='/dev_web/Anonnces/index.php' ;
    }
    elseif( !is_user($_POST['login'],$_POST['password']) ){
        $error='bad login/pwd';
        $uri='/dev_web/Anonnces/index.php' ;
    }
    else {
        $_SESSION['login'] = $_POST['login'] ;
        $login = $_SESSION['login'];
    }
}
else
    $login = $_SESSION['login'];


// vérification utilisateur authentifié
if ('/dev_web/Anonnces/index.php' == $uri) {
    $login='';
    login_action($login,$error);
}
//renvoye au menu de connexion et ferme la session
elseif('/dev_web/Anonnces/index.php/logout' == $uri ) {
// fermeture de la session
    session_destroy();
// affichage de la page de connexion
    login_action('','');
}
// menu principale pour acceder au differentes parties de l'application
elseif ('/dev_web/Anonnces/index.php/annonces' == $uri ){
    annonces_action($login, $error);
}
// renvoie le bon post
elseif ('/dev_web/Anonnces/index.php/post' == $uri  && isset($_GET['id'])) {
    post_action($_GET['id'],$login,$error);
}
// creation de nouveau post
elseif('/dev_web/Anonnces/index.php/Newpost' == $uri){
    newpost_action($login,$error);
}
// accés au tableau admin pour gerer les contenues des differentes bases de donnes
elseif('/dev_web/Anonnces/index.php/admin' == $uri){
    if(isset($_GET['deletePost'])){
        deletePost_action($_GET['deletePost']);
    }
    elseif (isset($_GET['deleteUser'])){
        deleteUser_action($_GET['deleteUser']);
    }
    admin_action($login,$error);
}
// renvoie la bonne offre
elseif('/dev_web/Anonnces/index.php/offre'){
    if(isset($_GET['id'])) {
        offre_action($_GET['id'], $login, $error);
    }
    else $error = 'pas de résultat';
}
else {
    header('Status: 404 Not Found');
    echo $uri;
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}
?>