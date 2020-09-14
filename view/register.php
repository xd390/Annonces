<?php $title= 'Creation de compte' ?>
<?php ob_start(); ?>
<h1>Formulaire d'inscription </h1>
<form method="post" action="annonces">
    <label for="nom"> nom</label>
    <input type="text" name="nom" id="nom" required>
    <br />
    <label for="prenom"> prenom</label>
    <input type="text" name="prenom" id="prenom" required>
    <br />
    <label for="mail"> adresse mail</label>
    <input type="text" name="mail" id="mail" required>
    <br />
    <label for="pays"> pays</label>
    <select name="pays" id="pays">
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
    <select name="ville" id="ville">
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
    <input type="text" name="login" id="login" placeholder="defaut" required >
    <br />
    <label for="idpassword"> mot de passe </label> :
    <input type="password" name="password" id="password" required>
    <br />
    <input type="submit" value="Valider">
    <input type="button" value="Annuler" onClick="javascript=document.location.href='/dev_web/Anonnces/index.php'">
</form>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
