<?php
//démarrer une session pour pouvoir y stocker des informations de l'utilisateur sur tout mon site
session_start();
//appel du modèle de l'utilisateur pour récupérer des méthodes
require_once '../models/usersModel.php';

//regex array
$regex = [
    'username' => '/^(?=.*[a-zA-Z]{3,})[a-zA-Z0-9-]+$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    'birthdate' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
];

//error array
$formErrors = [];

//si le formulaire est rempli
if (count($_POST) > 0) {
    //j'instancie mon objet users
    $user = new users;
    //si la donnée username n'est pas vide (est remplie)
    if (!empty($_POST['username'])) {
        //si cette donnée correspond bien au format de la regex associée
        if (preg_match($regex['username'], $_POST['username'])) {
            //je stocke cette donnée dans la propiété username de mon objet $user. J'utilise strip_tags pour retirer les balises HTML qui peuvent nuirent mon code (+ de sécurité)
            $user->username = strip_tags($_POST['username']);
            //si la donnée ne correpond pas a la regex associée alors je crée une erreur
        } else {
            $formErrors['username'] = 'Votre nom d\'utilisateur n\'est pas valide. Il doit comporter au moins 3 lettres et ne peut contenit que des lettres, chiffres et tirets.';
        }
        //si la donnée est vide (si le champs n'est pas rempli), alors j'affiche une erreur
    } else {
        $formErrors['username'] = 'Veuillez renseigner votre nom d\'utilisateur.';
    }

    if (!empty($_POST['email'])) {
        //j'utilise filter_var pour vérifier si la donnée email correspond à une adresse email valide et qu'elle respecte les normes acceptées
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = strip_tags($_POST['email']);
            //bloc try-catch pour gérer les erreurs
            try {
                //vérification de la disponibilté de l'email dans la bdd
                if ($user->checkAvaibility() == 1) {
                    $formErrors['email'] = 'L\'adresse mail est déjà utilisée.';
                }
                //sinon j'attrape les erreurs lié au PDO et j'affiche mon erreur 
            } catch (PDOException $e) {
                $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
            }
            //si les conditions ne sont pas remplies, j'affiche des erreurs
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
                //haché le mot de passe avant de l'envoyer dans la bdd avec password_hash => + de sécurité
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
            //diviser la donnée birthdate en 3 parties : année, mois, jour, tous séparés par des tirets et stockés dans un tabeau $date
            $date = explode('-', $_POST['birthdate']);
            //checkdat vérifie si la date est valide et réorganise la date en mois-jour-année
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
    //s'il n'y a pas d'erreur, ajouter l'utilisateur à la bdd avec méthode add()
    if (count($formErrors) == 0) {
        try {
            if ($user->add()) {
                //si l'ajout s'est effectué sans problème, j'affiche un message de succès
                $success = "Votre inscription a bien été prise en compte";
            }
            //j'attrape les erreurs liées au PDO qui pourraient être générées au moment du try 
        } catch (PDOException $e) {
            //et je créer mon erreur
            $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
            //j'affiche le message d'erreur généré par PDOException pour mieux comprendre et corriger l'erreur
            echo $e->getMessage();
        }
    }
}
//appel des vues 
require_once '../views/parts/header.php';
require_once '../views/register.php';
require_once '../views/parts/footer.php';
