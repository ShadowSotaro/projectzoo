<?php
    // In this page we get the register and we verify that all is in the good way then we insert that on the DB
    require_once 'config.php';

    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password']))
    {
        
        $pseudo  = htmlspecialchars($_POST['pseudo']);
        $email  = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];

        $check = $bdd->prepare('SELECT pseudo, email, password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if ($row == 0)
        {
            if(strlen($pseudo) <= 100)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                    if($password == $re_password){

                        $password = hash('sha256', $password."ZOwO");
                      

                        $insert = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES(:pseudo, :email, :password)');
                        $insert->execute(array(
                            'pseudo' => $pseudo,
                            'email'  => $email,
                            'password' => $password     
                    ));
                    header('Location:register.php?reg_err=succes');
                    header('Location:index.php');

                    }else header('Location:register.php?reg_err=password');

                }else header('Location:register.php?reg_err=email');

            }else header('Location:register.php?reg_err=length');


        }else header('Location:register.php?reg_err=already');    

    }