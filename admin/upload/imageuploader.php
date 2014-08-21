<?php
//session_start();
include './../layout/head.php'; ?>

<div class="be-header">
    <?php include('./../layout/beheader.php');?>
</div>

    <div class="container">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <?php if(isset($_GET['message'])):?>
                <p class="bg-danger"><?php echo $_GET['message']; ?></p>
            <?php endif;?>

            <form action="upload_script.php" method="post" role="form"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Filename:</label>
                    <input type="file" class="form-control"  name="file" id="file"><br>
                </div>




                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                </div>

                <div class="form-group">
                    <label for="alt">Fehlertext (Alt-Text)</label>
                    <input type="text" name="alt" class="form-control" id="alt" placeholder="Alt">
                </div>





                <input type="submit" class="btn" name="Hochladen" value="Submit">
                <div class="form-group">
                    <label>Wohin soll das Bild</label>
                    <select name="gallery_identifier">
                        <option value="tier">Index/TierIllustration</option>
                        <option value="flyer">Flyer</option>
                        <option value="auto">Auto</option>
                        <option value="weitere">Weitere</option>
                        <option value="comic">Comics</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <?php
    if(isset($_SESSION['angemeldet']) || $_SESSION['angemeldet']) {

        echo '<div class="container">

    <div class="form-group">
    Sie sind angemeldet</div>';
        echo '<div class="container">
            <form action="/login/logout.php" method="post" xmlns="http://www.w3.org/1999/html">
            <fieldset><input type="submit" class="btn" name="logout" value="Logout" /></form>
             </fieldset>
             </div>
        </div>
    </div>';



    }
    ?>
    <div class="panel panel-default">
        <div class="container">
        <div class="panel-body">

            <a href="/admin/gallerylist.php"><button type="button" class="btn btn-success">Zur Detalierteren
            Listenansicht der Galerien mit bearbeitungsfunktionen</button></a>

            </div>
        </div>
    </div>


</body>
</html>


