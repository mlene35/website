<?php session_start();  //session wird gestartet ?>

<?php

require_once __DIR__ . './../lib/autoloader.php';

$database = Database::getInstance();  //Stellt die verbindung zur db her

//es wird gefragt ob bereits angemeldet...wenn ja -> weiter gehts zum uploader
//$_SESSION ist ne variable die nur während der session ist
/*if (isset($_SESSION['angemeldet']) && $_SESSION['angemeldet']) {
    header('Location: /upload/imageuploader.php');
    exit;
} */
//wenn nicht bereits angemeldet fragen ob anfrage methode durchj formular?

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];  //Die daten aus dem formular werden nun abgespeichert
    $passwort = md5($_POST['password']);

    //Die daten aus den Variablen werden in das db script eingesetzt, es funktioniert auch nur,
    //wensst stimmt
   $database->query("SELECT * FROM user
                        WHERE username='$username'
                        AND password='$passwort'
                        LIMIT 1");

    //Wenn es nicht null ist, gab es einen eintrag in der db mit den eingebenen Daten
    //Da muss was richtig eingegeben werten...Also true
    if ($database->getResult()->rowCount() != 0) {
        $_SESSION['angemeldet'] = true;


        header('Location: /admin/upload/imageuploader.php');
        exit;
    } else {
        echo "<p><b>Falsche Login-Daten!!</b></p>";
        echo ' <a href="./../login/login.php"><button type="button" class="btn btn-success">Zurück zum Log-In</button></a>';
        exit;
    }
}

//funktion zum Testen von login
if(!isset($_SESSION['angemeldet']) || $_SESSION['angemeldet'] ==false)
{
   echo 'Sie sind nicht eingeloggt';
   echo ' <a href="./../login/login.php"><button type="button" class="btn btn-success">Zurück zum Log-In</button></a>';
    exit;
}

?>

