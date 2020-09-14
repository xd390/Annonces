<?php
function open_database_connection()
{
    $link = mysqli_connect('localhost', 'root', '', 'jobstage_db');
return $link;
}
function close_database_connection($link)
{
mysqli_close($link);
}
function create_user( $login, $password, $nom, $prenom, $mail, $pays, $ville){
    $link = open_database_connection();
    $query='INSERT INTO Users(login,password,nom,prenom,mail,pays,ville) VALUES("'.$login.'","'.$password.'","'.$nom.'","'.$prenom.'","'.$mail.'","'.$pays.'","'.$ville.'")';
    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_execute($stmt);
    close_database_connection($link);
}
function insert_post( $title, $body){
    $link = open_database_connection();
    $query='INSERT INTO POST(title,body) VALUES("'.$title.'","'.$body.'")';
    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_execute($stmt);
    close_database_connection($link);
}
function is_user( $login, $password )
{
    $isuser = False ;
    $link = open_database_connection();
    $query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
    $result = mysqli_query($link, $query );
    if( mysqli_num_rows( $result) ) {
        $isuser = True;
    }
    mysqli_free_result( $result );
    close_database_connection($link);
    return $isuser;
}
function get_all_users(){
    $link = open_database_connection();
    $resultall = mysqli_query($link,'SELECT login, nom, prenom FROM Users ');
    $users = array();
    while ($row = mysqli_fetch_assoc($resultall)){
        $users[] = $row;
    }
    mysqli_free_result($resultall);
    close_database_connection($link);
    return $users;
}
function get_all_posts()
{
    $link = open_database_connection();
    $resultall = mysqli_query($link,'SELECT id, title FROM Post');
    $posts = array();
    while ($row = mysqli_fetch_assoc($resultall)) {
        $posts[] = $row;
    }
    mysqli_free_result( $resultall);
    close_database_connection($link);
    return $posts;
}
function get_post( $id )
{
    $link = open_database_connection();
    $id = intval($id);
    $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$id );
    $post = mysqli_fetch_assoc($result);
    mysqli_free_result( $result);
    close_database_connection($link);
    return $post;
}
function deletePost_action($id){
    $link = open_database_connection();
    $query= 'DELETE FROM Post WHERE id =' .$id;
    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_execute($stmt);
    close_database_connection($link);
}
function deleteUser_action($login){
    $link = open_database_connection();
    $query= 'DELETE FROM Users WHERE login = "'.$login.'"';
    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_execute($stmt);
    close_database_connection($link);
}
?>
