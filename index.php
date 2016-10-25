<?php
    require __DIR__ . '/vendor/autoload.php';

    use j4mie\idiorm\idiorm;
    use Respect\Validation\Validator as v;
    include_once ('includes/connection.php');
    include_once ('includes/addUser.php');
    include_once('view/index.php');        

    $msg = '';

    $usernameValidator = v::alnum()->noWhitespace()->length(3, 15);
    $firstNameValidator = v::alnum()->noWhitespace()->length(3, 40);
    $passwordValidator = v::alnum()->noWhitespace()->length(8, 64);


    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        if ($usernameValidator->validate($username)) {
            $valid = TRUE;
        }
        else {
            echo $msg = "<div class='message'>Wrong username or empty</div>";
            $valid = FALSE;
        }
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        if (v::email()->validate($email)) {
            $valid = TRUE;
        }
        else {
            echo $msg = '<div class=\'message\'>Wrong email or empty</div>';
            $valid = FALSE;
        }
    }

    if (isset($_POST['firstName'])) {
        $first_name = $_POST['firstName'];
        if ($firstNameValidator->validate($first_name)) {
            $valid = TRUE;
        }
        else {
            echo $msg = '<div class=\'message\'>Wrong first name or empty</div>';
            $valid = FALSE;
        }
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($passwordValidator->validate($password)) {
            $valid = TRUE;
        }
        else {
            echo $msg = "<div class='message'>Wrong password or empty</div>";
            $valid = FALSE;
        }
    }

    if (isset($_POST['confirm'])) {
        $confirm = $_POST['confirm'];
        if ($passwordValidator->validate($confirm)) {
            $valid = TRUE;
        }
        else {
            echo $msg = "<div class='message'>Wrong confirm password or empty</div>";
            $valid = FALSE;
        }
    }

    if ($valid) {
        echo "<div class='message'>All ok</div>";
        addUser($username, $email, $first_name, $password);
    } else {
        echo "<div class='message'>All not ok</div>";
    }