<?php
require_once 'model.php';
$post = get_post( $_GET['id'] );
// inclut le code de la présentation HTML
require 'view/post.php';
?>