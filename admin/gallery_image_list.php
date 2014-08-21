<?php


/*
    if(!isset($_SESSION['angemeldet']) || ($_SESSION['angemeldet']==false) )
    {

        header('Location:../login/login.php');
        exit();
    }*/




?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <?php include '../layout/head.php'; ?>

</head>
<body>
<div class="be-header">
    <?php include('layout/beheader.php');?>
</div>

<?php

$theID = $_GET["id"];

if (!isset ($theID))
{
    header('Location:/admin/gallerylist.php');

}


$database = Database::getInstance(); //verbindung zur Datenbank

$database->query("SELECT * FROM gallery_image WHERE gallery_id = $theID");
$galleryIdArray = $database->fetchArray();


?>


<div class="container"> <div class="panel panel-default">
        <div class="panel-heading">TierIllustrationen</div>
        <div class="panel-body">

            <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Bild ID</th>
                                <th>Dateiname</th>
                                <th>Bild</th>
                                <th>Infosatz</th>
                                <th>FehlerText</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($galleryIdArray as $arrayElement): ?>
                                <tr>
                                    <td><?php echo $arrayElement['id']?></td>
                                    <td><?php echo $arrayElement['src']?></td>
                                    <td>
                                        <div class="paketgroessebild">
                                            <a href="#" class="thumbnail">
                                                <img src="<?php echo $arrayElement['src']?>">
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php echo $arrayElement['title']?></td>
                                    <td><?php echo $arrayElement['alt']?></td>
                                    <td>
                                        <a href="/admin/edit_picture.php?bild=<?php echo $arrayElement['id']?>">
                                            <button type="button" class="btn btn-success">Bearbeiten</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>




<div class="panel panel-default">
    <div class="container">
        <div class="panel-body">

            <a href="gallerylist.php"><button type="button" class="btn btn-success">Zurück zur Übersicht</button></a>


        </div>
    </div>
</div>












</body>