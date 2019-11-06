<?php
include("functions.php");
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
    <h1>Sign up</h1>
    <div class="container">

        <form method="post" action="index.php" name="formulaire">
            <div class="form-group offset-4 col-4">
                <label for="usename">Username</label>
                <input type="text" class="form-control" name="username" id="usename" aria-describedby="emailHelp" placeholder="Enter email">

            </div>
            <div class="form-group offset-4 col-4">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group offset-4 col-4">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group offset-4 col-4">
                <label for="passwordVal">Password validation</label>
                <input type="password" class="form-control" name="passwordval" id="passwordVal" placeholder="Password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary offset-5 col-2">Submit</button>
        </form>
        <div class="offset-4 col-4">

            <?php
            if (isset($error)) {
                echo '<p class="error">' . $error . "</p>";
            } else {
                echo '<p class="succes">' . $good . "</p>";
            }
            ?>

        </div>

    </div>
</body>


</html>