<?php
    // The php programm for the login page
    session_start();
    require_once 'config.php';

    if(isset($_POST['email']) && isset($_POST['password']))
    {

        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $check = $bdd->prepare('SELECT pseudo, email, password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if ($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $password = hash('sha256', $password."ZOwO");
                // We verify that all the inputs are in the good way
                if($data['password'] === $password)
                {

                    $_SESSION['user'] = $data['pseudo'];
                    $_SESSION['valid'] = true;
                    header('Location:landing.php');

                }else header('Location:index.php?login_err=password');
            }else header('Location:index.php?login_err=email');

        } else header('Location:index.php?login_err=already');

    }else header('Location:index.php');