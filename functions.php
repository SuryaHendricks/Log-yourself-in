<?php
function openConnection()
{
    // Try to figure out what these should be for you
    $dbhost = "database";
    $dbuser = "root";
    $dbpass = "root";
    $db = "DGynRSEipT";

    // Try to understand what happens here
    $pdo = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);

    // Why we do this here
    return $pdo;
}
$name = $_POST['username'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$passwordval = $_POST['passwordval'];

if (isset($_POST['submit'])) {
    if (!empty($name) and !empty($mail) and !empty($password)) {
        $good = "You have successfully created a new account!";
    } else {
        $error = "Missing informations! please fill all the fields.";
    }
}
