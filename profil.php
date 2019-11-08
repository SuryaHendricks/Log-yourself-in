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
                <div class="contentprofil offset-2 col-8">
                    <h1><?php echo $userinfo['username']; ?> 's<span class="profil"> Profil </span> : </h1>
                    <div class="row">
                        <div class="labeldesc col-4">
                            <p class="label">First Name : </p>
                            <p class="label">Last Name : </p>
                            <p class="label">Username : </p>
                            <p class="label">Mail : </p>
                            <p class="label">Linkedin :</p>
                            <p class="label">Github : </p>
                        </div>
                        <div class="col-6">
                            <p class="profinfo"> <?php echo $userinfo['first_name']; ?></p>
                            <p class="profinfo"> <?php echo $userinfo['last_name']; ?></p>
                            <p class="profinfo"> <?php echo $userinfo['username']; ?></p>
                            <p class="profinfo"> <?php echo $userinfo['email']; ?></p>
                            <p class="profinfo"> <?php echo $userinfo['linkedin']; ?></p>
                            <p class="profinfo"> <?php echo $userinfo['github']; ?></p>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['id']) and ($userinfo['id'] == $_SESSION['id'])) {
                        ?>
                        <div class="bottom col-12">
                            <div class="row">
                                <div class="button-content col-9">
                                    <a class="button-profil edit" href="edit.php">Edit</a>
                                    <a class="button-profil disconect" href="disconect.php">Disconnect</a>
                                </div>
                                <div class="col-3">
                                    <a class="button-profil delete" href="delete.php">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>