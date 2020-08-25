<?php
$link = mysqli_connect('localhost', 'root', '', 'jobstage_db');
if(isset($_POST['mail'])) {
    $query='INSERT INTO Users(login,password,nom,prenom,mail,pays,ville) VALUES("'.$_POST['login'].'","'.$_POST['password'].'","'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['mail'].'","'.$_POST['pays'].'","'.$_POST['ville'].'")';
    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_execute($stmt);
}
elseif(isset($_POST['body'])){
    $query='INSERT INTO POST(title,date,body) VALUES("'.$_POST['title'].'","'.$_POST['date'].'","'.$_POST['body'].'")';
    $stmt = mysqli_prepare($link,$query);
    mysqli_stmt_execute($stmt);
}
$query= 'SELECT login FROM Users WHERE login="'.$_POST['login'].'" and password="'.$_POST['password'].'"';
$resultlogin = mysqli_query($link, $query );
if( mysqli_num_rows( $resultlogin) ){
    mysqli_free_result( $resultlogin );
    $resultall = mysqli_query($link, 'SELECT id, title FROM Post');
}
else {
    header("refresh:5;url=index.html");
    echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
    exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Annonces</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<p> Hello <?php echo $_POST['login']; ?> </p>
<h1>List of Posts</h1>
<ul>
    <?php while ($row = mysqli_fetch_assoc($resultall)): ?>
        <li>
            <a href="post.php?id=<?php echo $row['id']; ?>">
            <?php echo $row['title']; ?>
            </a>
        </li>
    <?php endwhile ?>
</ul>
<p><a href="new.php">Nouvelle annonce</a></p>
</body>
</html>
<?php mysqli_close( $link ); ?>

