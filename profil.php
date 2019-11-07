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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
</head>

<body>
    <div class="profil container">
        <div class="row">
            <div class="col-12">
                <div class="contentprofil offset-4 col-4">
                    <h2>Profil de <?php echo $userinfo['username']; ?></h2>
                    <p>First Name : <?= $userinfo['first_name']; ?></p>
                    <p>Last Name : <?= $userinfo['last_name']; ?></p>
                    <p>Username : <?php echo $userinfo['username']; ?></p>
                    <p>Mail : <?php echo $userinfo['email']; ?></p>
                    <p>Linkedin : <?= $userinfo['linkedin']; ?></p>
                    <p>Github : <?= $userinfo['github']; ?></p>
                    <?php
                    if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
                        ?>
                        <br />
                        <a href="edit.php">Editer mon profil</a>
                        <a href="disconect.php">Se déconnecter</a>
                        <a href="delete.php">Delete your account</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>