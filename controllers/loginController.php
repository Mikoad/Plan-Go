<?php
session_start();
require_once '../models/usersModel.php';
$formErrors = [];

if (count($_POST) > 0) {
    //instanciation de l'objet user
    $user = new users;

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = $_POST['email'];
            //si l'email n'existe pas, afficher une erreur
            if ($user->checkAvaibility() == 0) {
                $formErrors['email'] = $formErrors['password'] = 'L\'adresse mail ou le mot de passe est incorrect.';
            }
        } else {
            $formErrors['email'] = 'Votre adresse e-mail n\'est pas valide. Elle ne peut comporter que des lettres, tirets, underscores, points et chiffres.';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre email';
    }

    if (!empty($_POST['password'])) {
        if (!isset($formErrors['email'])) {
            //stocker le password haché
            $user->password = $user->getHash();
            //vérifier si le password haché correspond au passord saisi
            if (password_verify($_POST['password'], $user->password)) {
                $_SESSION['user'] = $user->getInfos();
                $_SESSION['user']['email'] = $user->email;


                header('Location:/profil');
                exit;
            } else {
                $formErrors['email'] = $formErrors['password'] = 'L\'adresse mail ou le mot de passe est incorrect.';
            }
        }
    } else {
        $formErrors['password'] = 'Le mot de passe est obligatoire';
    }
}




require_once '../views/parts/header.php';
require_once '../views/login.php';
require_once '../views/parts/footer.php';
