<?php
session_start();
$dbhost = "remotemysql.com";
$dbuser = "DGynRSEipT";
$dbpass = "WezFIBGzuR";
$db = "DGynRSEipT";

if (isset($_SESSION['id'])) {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);
    $requser = $pdo->prepare("SELECT * FROM Student WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if (isset($_POST['newusername']) and !empty($_POST['newusername']) and $_POST['newusername'] != $user['username']) {
        $newusername = htmlspecialchars($_POST['newusername']);
        $insertusername = $pdo->prepare("UPDATE Student SET username = ? WHERE id = ?");
        $insertusername->execute(array($newusername, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newfirst_name']) and !empty($_POST['newfirst_name']) and $_POST['newfirst_name'] != $user['first_name']) {
        $newfirst_name = htmlspecialchars($_POST['newfirst_name']);
        $insertfirst_name = $pdo->prepare("UPDATE Student SET first_name = ? WHERE id = ?");
        $insertfirst_name->execute(array($newfirst_name, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newlast_name']) and !empty($_POST['newlast_name']) and $_POST['newlast_name'] != $user['last_name']) {
        $newlast_name = htmlspecialchars($_POST['newlast_name']);
        $insertlast_name = $pdo->prepare("UPDATE Student SET last_name = ? WHERE id = ?");
        $insertlast_name->execute(array($newlast_name, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newmail']) and !empty($_POST['newmail']) and $_POST['newmail'] != $user['mail']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $pdo->prepare("UPDATE Student SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newlinkedin']) and !empty($_POST['newlinkedin']) and $_POST['newlinkedin'] != $user['linkedin']) {
        $newlinkedin = htmlspecialchars($_POST['newlinkedin']);
        $insertlinkedin = $pdo->prepare("UPDATE Student SET linkedin = ? WHERE id = ?");
        $insertlinkedin->execute(array($newlinkedin, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newgithub']) and !empty($_POST['newgithub']) and $_POST['newgithub'] != $user['github']) {
        $newgithub = htmlspecialchars($_POST['newgithub']);
        $insertgithub = $pdo->prepare("UPDATE Student SET github = ? WHERE id = ?");
        $insertgithub->execute(array($newgithub, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newpw']) and !empty($_POST['newpw']) and $_POST['newpw'] != $user['pw']) {
        $newpw = htmlspecialchars($_POST['newpw']);
        $insertpw = $pdo->prepare("UPDATE Student SET pw = ? WHERE id = ?");
        $insertpw->execute(array($newpw, $_SESSION['id']));
        header('Location: profil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['newpw']) and !empty($_POST['newpw']) and isset($_POST['newpw2']) and !empty($_POST['newpw2'])) {
        $pw1 = sha1($_POST['newpw']);
        $pw2 = sha1($_POST['newpw2']);
        if ($pw1 == $pw2) {
            $insertmdp = $pdo->prepare("UPDATE Student SET password = ? WHERE id = ?");
            $insertmdp->execute(array($pw1, $_SESSION['id']));
            header('Location: profil.php?id=' . $_SESSION['id']);
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
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
    <title>Document</title>
</head>

<body>
    <div class="profil container">
        <div class="row">
            <div class="col-12">
                <div class="contentprofil offset-4 col-4">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <h2>Profil de <?php echo $userinfo['username']; ?></h2>
                        <label>First name :</label>
                        <input type="text" name="newfirst_name" placeholder="First name" value="<?php echo $user['first_name']; ?>" />
                        <label>Last name :</label>
                        <input type="text" name="newlast_name" placeholder="Last name" value="<?php echo $user['last_name']; ?>" />
                        <label>Username :</label>
                        <input type="text" name="newusername" placeholder="Username" value="<?php echo $user['username']; ?>" />
                        <label>Mail :</label>
                        <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['email']; ?>" />
                        <label>Mot de passe :</label>
                        <input type="password" name="newpw" placeholder="Password" />
                        <label>Confirmation - mot de passe :</label>
                        <input type="password" name="newpw2" placeholder="Confirmation du mot de passe" />
                        <input type="submit" value="Mettre à jour mon profil !" />
                        <?php
                        if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
                            ?>
                            <br />
                            <a href="edit.php">Editer mon profil</a>
                            <a href="disconect.php">Se déconnecter</a>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>