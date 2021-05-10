<?php
// BDD
$bdd_name = "vgql5359_davy_paris";
$bdd_host = "localhost";
$bdd_user = "vgql5359_davy_paris";
$bdd_password = "Dimi25@gmail.com";

$bdd_mysql = 'mysql:host=' . $bdd_host . ';dbname=' . $bdd_name . ';charset=utf8';

$pdo_object = new PDO($bdd_mysql, $bdd_user, $bdd_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// DEFINE
define("URL", "https://dating-paris.one-website.com");

// VARIABLES
$erreur = "";
$notification = "";

// OUVERTURE SESSION
session_start();

// VOIR SESSION
// echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>