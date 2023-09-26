<?php
session_start();
require_once '../models/usersModel.php';
require_once '../models/groupsMembersModel.php';

$formErrors = [];

if (count($_POST) > 0) {
    //Etape 1 vérifier que l'user existe
    $user = new users;

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = $_POST['email'];
            if ($user->checkAvaibility() == 0) {
                $formErrors['email'] = $formErrors['password'] = 'L\'adresse mail ou le mot de passe est incorrect.';
            }
        } else {
            $formErrors['email'] = 'Votre adresse e-mail n\'est pas valide. Elle ne peut comporter que des lettres, tirets, underscores, points et chiffres.';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre email';
    }

    // Etape 2 récupérer le mot de passe
    if (!empty($_POST['password'])) {
        if (!isset($formErrors['email'])) {
            $user->password = $user->getHash();
            if (password_verify($_POST['password'], $user->password)) {
                $_SESSION['user'] = $user->getInfos();
                $_SESSION['user']['email'] = $user->email;
                if (isset($_SESSION['id_groups_add'])) {
                    $gm = new groupsMembers;
                    $gm->id_groups = $_SESSION['id_groups_add'];
                    $gm->id_users = $_SESSION['user']['id'];

                    $gmAdd = $gm->add();
                }


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
