<?php
session_start();
$dbhost = "remotemysql.com";
$dbuser = "DGynRSEipT";
$dbpass = "WezFIBGzuR";
$db = "DGynRSEipT";


if (isset($_GET['id']) and $_GET['id'] > 0) {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);
    $getid = intval($_GET['id']);
    $requser = $pdo->prepare('SELECT * FROM Student WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div align="center">
        <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
        <br /><br />
        Pseudo = <?php echo $userinfo['username']; ?>
        <br />
        Mail = <?php echo $userinfo['email']; ?>
        <br />
        <?php
        if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
            ?>
            <br />
            <a href="edit.php">Editer mon profil</a>
            <a href="disconect.php">Se déconnecter</a>
        <?php
        }
        ?>
    </div>
</body>

</html>