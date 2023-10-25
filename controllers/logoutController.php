<?php
session_start();
//permet de supprimer toutes les variables de session
unset($_SESSION);
//désactive et détruit la session
session_destroy();
//une fois déconnecté, redirection vers le formulaire de connexion
header('Location:/connexion');
exit;
