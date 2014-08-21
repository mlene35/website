<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<?php include('layout/head.php');?>
<body>
<div class="header">
    <?php include ('layout/header.php');?>
</div>

<?php

/** @var Gallery $gallery */
$gallery = new Gallery();
$gallery->loadByIdentifier('comic');
?>

<div class="container">
    <?php echo $gallery->render();?>
</div>
</body>
</html>