<?php

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$mail = $_POST['mail'];
$pw = $_POST['password'];
$passwordval = $_POST['passwordval'];
$linkedin = $_POST['linkedin'];
$github = $_POST['github'];

if (isset($_POST['submit'])) {

    $dbhost = "remotemysql.com";
    $dbuser = "DGynRSEipT";
    $dbpass = "WezFIBGzuR";
    $db = "DGynRSEipT";

    if (!empty($username) and !empty($mail) and !empty($pw)) {
        $pdo = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);
        $insertmbr = $pdo->prepare("INSERT INTO Student (first_name,last_name,username, email, password,linkedin , github) VALUES( ?,?,?,?,?,?,?)");
        $insertmbr->execute(array($first_name, $last_name, $username, $mail, $pw, $linkedin, $github));

        $good = "You have successfully created a new account!  <a href=\"signin.php\">Me connecter</a>";
    } else {
        $error = "Missing informations! please fill all the fields.";
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
    <title>Sign up</title>
</head>

<body>
    <div class="container">
        <div class="content col-12 ">
            <div class="col-4">
                <form method="post" action="signup.php" name="formulaire">
                    <div class="form-group">
                        <h1>Sign up</h1>
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="usename">Username</label>
                        <input type="text" class="form-control" name="username" id="usename" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="passwordVal">Password validation</label>
                        <input type="password" class="form-control" name="passwordval" id="passwordVal" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Enter your linkedin">
                    </div>
                    <div class="form-group">
                        <label for="github">Github</label>
                        <input type="text" class="form-control" name="github" id="github" placeholder="Enter your github">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary offset-4">Submit</button>
                </form>
                <div class="">
                    <?php
                    if (isset($error)) {
                        echo '<p class="error">' . $error . "</p>";
                    } else {
                        echo '<p class="succes">' . $good . "</p>";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</body>

</html>