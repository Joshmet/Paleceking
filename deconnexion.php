<?php 
    session_start(); // demarrage de la session
    //session_unset();
    session_destroy(); // on détruit la session,
    header('Location: connexion.php'); // On redirige
    die();
?>