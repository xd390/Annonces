<?php $title= 'Nouveau post' ?>
<?php ob_start(); ?>
    <h3> Nouveau post:</h3>
    <form method="post" action="annonces">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title"/>
        <br />
        <label for="date">Date :</label>
        <a name="date" id="date"> <?php echo date('d/m/Y'); ?> </a>
        <br />
        <label for="body">Texte</label>
        <textarea name="body" id="body" cols="20" rows="5"></textarea>
        <br />
        <input type="submit" value="Valider">
        <input type="button" value="Annuler" onClick="javascript:document.location.href='annonces'" />
    </form>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>