<?php
session_start();
require_once '../models/usersModel.php';
$formErrors = [];

//si le formulaire est rempli
if (count($_POST) > 0) {
    //instanciation de l'objet user
    $user = new users;

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = $_POST['email'];
            //si l'email n'existe pas
            if ($user->checkAvaibility() == 0) {
                //afficher une erreur
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
            //stocker le password haché dans la propriété password de l'objet user
            $user->password = $user->getHash();
            //vérifier si le password haché correspond au password saisi avec password_verify
            if (password_verify($_POST['password'], $user->password)) {
                //si oui, je stocke les infos de l'utilisateur grâce à getInfos() dans la session
                $_SESSION['user'] = $user->getInfos();
                //je stocke également l'email dans la session
                $_SESSION['user']['email'] = $user->email;

                //une fois connecté, l'utilisateur est redirigé vers son profil
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



//appel des vues
require_once '../views/parts/header.php';
require_once '../views/login.php';
require_once '../views/parts/footer.php';
