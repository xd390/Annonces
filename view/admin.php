<?php $title= 'Exemple Annonces Basic PHP: Admin gestion'; ?>
<?php ob_start(); ?>
<h1>Listes des Posts</h1>
<ul>
    <?php foreach( $posts as $post ) : ?>
        <li>
            <a><?php echo $post['title']; ?></a>
            <a href="admin?deletePost=<?php echo $post['id']; ?>">
                supprimer
            </a>
        </li>
    <?php endforeach ?>
</ul>
<h1>Listes des Users</h1>
<ul>
    <?php foreach( $users as $user ) : ?>
        <li>
            <label for="login">Login :</label>
            <a name="login"><?php echo $user['login']; ?></a>
            <label for="nom">Nom :</label>
            <a name="nom"><?php echo $user['nom']; ?></a>
            <label for="prenom"> Prenom :</label>
            <a name="prenom"><?php echo $user['prenom']; ?></a>
            <a href="admin?deleteUser=<?php echo $user['login']; ?>">
                supprimer
            </a>
        </li>
    <?php endforeach ?>
</ul>
<button><a href="/dev_web/Anonnces/index.php/annonces">Retour</a></button>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
