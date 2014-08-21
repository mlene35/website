<?php


/*if(!isset($_SESSION['angemeldet']) || ($_SESSION['angemeldet']==false) )
{

    header('Location:../login/login.php');
    exit();
}*/


?>
<html>
    <head>
        <?php include './../layout/head.php'; ?>

    </head>
    <body>
    <div class="be-header">
        <?php include('layout/beheader.php');?>
    </div>
        <?php

        $database = Database::getInstance(); //verbindung zur Datenbank

        $database->query("SELECT * FROM gallery");
        $galleryArray = $database->fetchArray();
             ?>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Gallery Namen</th>
                    <th>Theme/Style </th>
                    <th> </th>
                </tr>
                </thead>
                <?php
                foreach($galleryArray as $gallery )
                {
                    echo '<tr>';
                        echo '<td>' . $gallery["id"] . '</td>';
                        echo '<td>' . $gallery["identifier"] . '</td>';
                        echo '<td>' . $gallery["theme"] . '</td>';
                        echo '<td><a href="/admin/gallery_image_list.php?id=' .
                           $gallery['id'] .
                            '"><button type="button" class="btn btn-success">Bearbeiten</button></a>';
                    echo '</tr>';
                }
                ?>
        </table>
    </body>
</html>



