<?php
if( !isset( $login) ){
    header( "refresh:5;url=index.php" );
    echo 'Erreur de login et/ou de mot de passe (redirection
automatique dans 5 sec.)';
    exit;
}
?>
<?php $title= 'Exemple Annonces Basic PHP: Annonces'; ?>
<?php ob_start(); ?>
<p> Hello <?php echo $login; ?> </p>
<h1>Listes des Posts</h1>
<ul>
    <?php foreach( $posts as $post ) : ?>
        <li>
            <a href="post?id=<?php echo $post['id']; ?>">
                <?php echo $post['title']; ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>
<p><input type="button" value="New post" onClick="javascript=document.location.href='/dev_web/Anonnces/index.php/Newpost'"></p>
<h1>Listes des Offres du gouvernemt</h1>
    <form method="get" action="annonces">
        <label for="name"> Entrer un mot en rapport avec l'emploi rechercher </label> :
        <input type="text" name="name" id="name"  class="input"/>
        <input class="button" type="submit" value="Envoyer">
    </form>
<?php
if(isset($_GET['name'])) {
    $offreListe = offre($_GET['name']);
    if($offreListe) {
        echo '<ul>';
        foreach ($offreListe as $nom => $cp):
            echo '<li><a href="offre?id=' . $nom . '"> '.$cp.'</a></li>';
        endforeach;
        echo '</ul>';
    }
    else {
        echo '<p> pas de resultat</p> Résultat';;
    }
}
?>
<a href="/dev_web/Anonnces/index.php/admin">Admin</a>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
