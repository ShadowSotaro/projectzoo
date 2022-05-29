<?php
    session_start();
    session_destroy();
    header('Location:index.php');
    //we destroy the session after disconnection