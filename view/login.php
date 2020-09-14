<?php $title= 'Exemple Annonces Basic PHP: Connexion'; ?>
<?php ob_start(); ?>
<form method="post" action="/dev_web/Anonnces/index.php/annonces">
    <label for="login"> Votre identifiant </label> :
    <input type="text" name="login" id="login" placeholder="defaut" maxlength="12" required />
    <br />
    <label for="password"> Votre mot de passe </label> :
    <input type="password" name="password" id="password" maxlength="12" required />
    <p><a href="/dev_web/Anonnces/index.php/register">Créer un compte</a></p>
    <input type="submit" value="Envoyer">
</form>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
