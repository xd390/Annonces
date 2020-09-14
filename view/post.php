<?php $title= 'Exemple Annonces Basic PHP: Post'; ?>
<?php ob_start(); ?>
<h1><?php echo $post['title']; ?></h1>
<div class="date"> <?php echo $post['date']; ?> </div>
<div class="body"> <?php echo $post['body']; ?> </div>
<input type="button" value="Annuler" onClick="javascript=document.location.href='/dev_web/Anonnces/index.php/annonces'">
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>

