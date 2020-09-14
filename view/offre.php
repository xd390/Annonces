<?php $title = $offre['titre']; ?>
<?php ob_start(); ?>

<?php
echo "<p>Code Annonce : ".$offre["code"]."</p>";
echo "<p>Type d'offre : ".$offre["type"]."</p>";
echo "<p>Commune : ".$offre["commune"]."</p>";
echo "<p>Formation demandee : ".$offre["formation"]."</p>";
echo "<p>Expérience demandee : ".$offre["experience"]."</p>";
echo "<p>Compétences demandees : ".$offre["competences"]."</p>";
echo "<p>Description : ".$offre["activite "]."</p>";
echo "<p>Diplome demande : ".$offre["diplome"]."</p>";
echo "<p>Contact : ".$offre["identite"]."</p>";
echo "<p>Mail : ".$offre["mail"]."</p>";
echo "<p>Telephone : ".$offre["telephone"]."</p>";?>
<a href="javascript:history.go(-1)">Retour</a>

<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
