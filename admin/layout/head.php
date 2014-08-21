<?php
session_start();
require_once __DIR__ . '/../../lib/autoloader.php';

if(!isset($_SESSION['angemeldet']) || $_SESSION['angemeldet'] == false)
{
    header('Location:/admin/login.php');
    exit();
}

?>
<html>
<head lang="de">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Das neueste kompilierte und minimierte CSS -->
    <link href='//fonts.googleapis.com/css?family=Fugaz+One|Molengo|Actor|Sansita+One&subset=latin,latin-ext'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/my-styles.css">
    <link rel="stylesheet" href="/css/slider.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Das neueste kompilierte und minimierte JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/galleria-1.3.5.js"></script>


    <style>
        .galleria{
            width: auto;
            height: 600px; background: #fefff3
        }
    </style>
</head>
<body>



