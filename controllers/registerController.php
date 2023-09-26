<?php
session_start();
if (isset($_GET['id_groups'])) {
    $_SESSION['id_groups_add'] = $_GET['id_groups'];
    var_dump($_SESSION);
}
require_once '../models/usersModel.php';


$regex = [
    'username' => '/^(?=.*[a-zA-Z]{3,})[a-zA-Z0-9-]+$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    'birthdate' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
];

$formErrors = [];

if (count($_POST) > 0) {
    $user = new users;
    if (!empty($_POST['username'])) {
        if (preg_match($regex['username'], $_POST['username'])) {
            $user->username = strip_tags($_POST['username']);
        } else {
            $formErrors['username'] = 'Votre nom d\'utilisateur n\'est pas valide. Il doit comporter au moins 3 lettres et ne peut contenit que des lettres, chiffres et tirets.';
        }
    } else {
        $formErrors['username'] = 'Veuillez renseigner votre nom d\'utilisateur.';
    }

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = strip_tags($_POST['email']);
            try {
                //vérification de la disponibilté de l'email dans la bdd
                if ($user->checkAvaibility() == 1) {
                    $formErrors['email'] = 'L\'adresse mail est déjà utilisée.';
                }
            } catch (PDOException $e) {
                $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
            }
        } else {
            $formErrors['email'] = 'Votre adresse e-mail n\'est pas valide. Elle ne peut comporter que des lettres, tirets, underscores, points et chiffres.';
        }
    } else {
        $formErrors['email'] = 'Veuillez renseigner votre adresse e-mail.';
    }

    if (!empty($_POST['password'])) {
        if (!preg_match($regex['password'], $_POST['password'])) {
            $formErrors['password'] = 'Votre mot de passe n\'est pas valide. Il doit comporter au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial.';
        }
    } else {
        $formErrors['password'] = 'Veuillez renseigner votre mot de passe.';
    }

    if (!empty($_POST['passwordConfirm'])) {
        if (!isset($formErrors['password'])) {
            if ($_POST['password'] == $_POST['passwordConfirm']) {
                //haché le mot de passe avant de l'envoyer dans la bdd
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                $formErrors['password'] = $formErrors['passwordConfirm'] = 'Les mots de passes ne correspondent pas.';
            }
        }
    } else {
        $formErrors['passwordConfirm'] = 'Veuillez confirmer votre mot de passe.';
    }

    if (!empty($_POST['birthdate'])) {
        if (preg_match($regex['birthdate'], $_POST['birthdate'])) {
            $date = explode('-', $_POST['birthdate']);
            if (checkdate($date[1], $date[2], $date[0])) {
                $user->birthdate = $_POST['birthdate'];
            } else {
                $formErrors['birthdate'] = 'Votre date de naissance n\'est pas valide. Elle doit être au format jj/mm/aaaa.';
            }
        } else {
            $formErrors['birthdate'] = 'Votre date de naissance n\'est pas valide. Elle doit être au format jj/mm/aaaa.';
        }
    } else {
        $formErrors['birthdate'] = 'Veuillez renseigner votre date de naissance.';
    }
    //s'il n'y a pas d'erreur, ajouter l'utilisateur à la bdd avec add()
    if (count($formErrors) == 0) {
        try {
            if ($user->add()) {
                $success = true;
            }
        } catch (PDOException $e) {
            $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
            echo $e->getMessage();
        }
    }
}

require_once '../views/parts/header.php';
require_once '../views/register.php';
require_once '../views/parts/footer.php';
