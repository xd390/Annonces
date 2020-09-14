<?php
function login_action($login,$error)
{
    require 'view/login.php';
}
function register_action($login,$error){
    require 'view/register.php';
}
//fonction de creation d'utilisateur
function register2_action($login, $password, $nom, $prenom, $mail, $pays, $ville)
{
    create_user($login, $password, $nom, $prenom, $mail, $pays, $ville);

}
function create_post($title,$body){
    insert_post($title,$body);
}
function offre_action($id, $login, $error){
    $offre=offreID($id);
    require 'view/offre.php';
}
function annonces_action($login,$error)
{
    $posts = get_all_posts();
    require 'view/annonces.php';

}
function post_action($id,$login,$error)
{
    $post = get_post($id);
    require 'view/post.php';
}
function newpost_action($login,$error)
{
    require 'view/Newpost.php';
}
function admin_action($login,$error){
    $posts = get_all_posts();
    $users = get_all_users();
    require 'view/admin.php';
}
?>
