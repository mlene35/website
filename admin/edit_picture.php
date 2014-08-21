<html>


<?php
$theBild = $_GET["bild"];
var_dump($_GET['bild']);

if (!isset ($theBild))
{
    header('Location:/admin/gallerylist.php');
}
?>
<head>
    <?php include '../layout/head.php'; ?>

</head>
<body>

<div class="be-header">
    <?php include('layout/beheader.php');?>
</div>

<?php

$database = Database::getInstance(); //verbindung zur Datenbank

$database->query("SELECT * FROM gallery_image WHERE id = $theBild");
$picturedatas = $database->fetchArray();
?>

<form action="/admin/upload/upload_script.php" class="form-horizontal" method="post" role="form"
      enctype="multipart/form-data">
        <div class="container"> <div class="panel panel-default">
                <div class="panel-heading">TierIllustrationen</div>
                <div class="panel-body">
                    <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Aktuelle Daten</th>
                                    <th>Änderungen</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($picturedatas as $picturelist)
                                {
                                    echo '<tr>';
                                    echo '<td>ID</td>';
                                    echo '<td>' . $picturelist['id'] . '</td>';
                                    echo '<input type="hidden" name="id" id="id" value="' . $picturelist['id'] . '">';
                                    echo '<td></td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Link</td>';
                                    echo '<td>' . $picturelist['src'] . '</td>';
                                    echo '<td></td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Bild</td>';
                                    echo
                                        '<td>
                                        <div class="paketgroessebild">
                                            <a href="#" class="thumbnail">
                                                <img src="' . $picturelist['src'] . '" alt="...">
                                                </a>
                                            </div>
                                            </td>';
                                    echo '<td>

                                           <label for="exampleInputFile">Bild Aussuchen</label>
                                           <label for="file">Filename:</label>
                                            <input type="file" class="form-control"  name="file" id="file">
                                            ';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Titel</td>';
                                    echo  '<td>'. $picturelist['title'] . '</td>';
                                    echo '<td> <input value="' . htmlentities($picturelist['title']) . '" type="text" class="form-control" id="title" name="title" placeholder="Titel"></td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td>Fehlertext</td>';
                                    echo '<th>' . $picturelist['alt'] . '</th>';
                                    echo '<td> <input value="' . htmlentities($picturelist['alt']) . '" type="text" class="form-control" id="alt" name="alt" placeholder="Fehlertext"></td>';
                                    echo '</tr>';


                                    echo '<td>Bild Löschen?</td>';
                                    echo '<th></th>';
                                    echo '<td><button name="loeschen" type="submit" value="1" class="btn btn-danger" id="loeschen">Bild/Eintrag Löschen</button></td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
    <button type="submit" class="btn btn-success">Speichern</button>

   <a href="/admin/gallerylist.php"> <button type="button" class="btn btn-default">Zur Übersicht</button></a>

        <a href="/admin/upload/imageuploader.php"> <button type="button" class="btn btn-success">+ Neues Bild in Die gallerie Hinzufügen
    </button>

    </div>
</form>

</body>
</html>