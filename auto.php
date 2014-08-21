<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<?php include('layout/head.php');?>
<body>
<div class="header">
    <?php include ('layout/header.php');?>
</div>

<?php
$images = array(



);
/** @var Gallery $gallery */
$gallery = new Gallery();
//$gallery->setTheme('classic');
//$gallery->addImages(
//    array(
//        array(
//            'title' => 'Das Auto',
//            'src' => 'media/images/auto/a1-autoinet.jpg',
//            'alt' => 'Auto konnte nicht geladen werden!'
//        ),
//        array(
//            'title' => 'Das Auto - Ausschnitt 1',
//            'src' => '/media/images/auto/auss-1.jpg'
//        ),
//        array(
//            'title' => 'Das Auto - Auschnitt 2',
//            'src' => '/media/images/auto/auss-2.jpg'
//        ),
//        array(
//            'title' => 'Das Auto - Ausschnitt 3',
//            'src' => '/media/images/auto/auss-3.jpg'
//        )
//    )
//
//);
$gallery->loadByIdentifier('auto');
?>

<div class="container">
    <?php echo $gallery->render();?>
</div>
</body>
</html>