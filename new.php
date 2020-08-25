<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nouvelle annonce</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<h3> Nouvelle annonce:</h3>
<form method="post" action="annonces.php">
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
    <input type="button" value="Annuler" onClick="javascript:document.location.href='annonces.php'" />
</form>
</body>
</html>
