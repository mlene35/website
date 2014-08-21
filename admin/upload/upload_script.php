
<?php include '../layout/head.php'; ?>



<?php
require_once __DIR__ . './../../lib/autoloader.php';

$database = Database::getInstance();

if(isset ($_POST['loeschen']))
{

    $idToDelete = $_POST['id'];
   /* $loeschen = "DELETE FROM gallery_image WHERE id= '" . $_POST['id'] . "'";
    $database->query($loeschen);*/
    $database->delete('gallery_image', $idToDelete);
}



function redirect($message = null){
    $location = '/upload/imageuploader.php';
    if($message){
        $location .= '?message=' . urlencode($message);
    }
    header('Location: ' . $location);
    die();
}
echo '$_FILES:<br />';
var_dump($_FILES);
echo '$_POST:<br />';
var_dump($_POST);
echo '$_GET:<br />';
var_dump($_GET);

echo "Änderungen wurden übernommen";
echo "</br>";
echo "<button type='button' class='btn btn-default'><a href='/admin/gallerylist.php'>Zurück zum Editor</button>";


$src = null;
$allowedMimeTypes = array(
    'image/jpg',
    'image/jpeg'
);


foreach($_FILES AS $file){
    if(!$file['tmp_name']){
        continue;
    }
    if(!in_array($file['type'], $allowedMimeTypes)){
        redirect(
            sprintf(
                'invalid mime type "%s", allowed types are: %s',
                $file['type'],
                implode(',', $allowedMimeTypes))
        );
    }
    $filePath = __DIR__ . './../../media/images/uploads/';
    move_uploaded_file(
        $file['tmp_name'],
        $filePath . $file['name']
    );

    $src = './../media/images/uploads/' . $file['name'];
}

if(isset($_POST['id'])) {
/*
    $sql = "UPDATE gallery_image SET
    title = '" . $_POST['title']. "',
    alt = '" . $_POST['alt'] . "'";

    if($src){
        $sql .= ', src="' . $src . '" ';
    }

    $sql .= "WHERE id = " . $_POST['id'];
    $database->query($sql);
*/

    $data = array(
        'title' => $_POST['title'],
        'alt'   => $_POST['alt']
    );


    var_dump($data);

    if($src){
        $data['src'] = $src;
    }

    $database->update('gallery_image', $data, array('id' => $_POST['id']));

    /*
        UPDATE gallery_image SET title = "test title", alt = "test alt" WHERE id = 5

     */
} else {
    if(count($_FILES) === 0){
        redirect('no files to upload');
    }

    $gallery = new Gallery();
    $gallery->loadByIdentifier($_POST['gallery_identifier'], false);

    $imageData = array(
        'src' => $src,
        'gallery_id' => $gallery->getData('id'),
        'title' => $_POST['title'],
        'alt' => $_POST['alt']
    );

    var_dump($imageData);
    $sql = "INSERT INTO gallery_image (src, gallery_id, title, alt) VALUES ('" . $imageData['src'] . "', '" . $imageData['gallery_id'] . "', '" . $imageData['title'] . "', '" . $imageData['alt'] . "')";
    $database->query($sql);



}





