<?php
    function addUser ($username, $email, $firstName, $password) {
        $user = ORM::for_table('users')->create();

        $user->username = $username;
        $user->email = $email;
        $user->firstName = $firstName;
        $user->password = $password;

        $user->save();
        header("Location: view/welcome.php");
    }