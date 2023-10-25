<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion');
}
$title = 'Profil';
require_once '../models/usersModel.php';
//peut être ne faire qu'une seule instanciation et remplacer par $userUpdate->id = $_SESSION['user']['id'];
$user = new users;
$user->id = $_SESSION['user']['id'];

$regex = [
    'username' => '/^(?=.*[a-zA-Z]{3,})[a-zA-Z0-9-]+$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
];

$formErrors = [];
$userUpdate = new users;

//UPDATE PART


//update user infos form
if (isset($_POST['updateInfos'])) {

    if (!empty($_POST['username'])) {
        if (preg_match($regex['username'], $_POST['username'])) {
            $userUpdate->username = strip_tags($_POST['username']);
        } else {
            $formErrors['username'] = 'Votre nom d\'utilisateur n\'est pas valide. Il doit comporter au moins 3 lettres et ne peut contenir que des lettres, chiffres et tirets.';
        }
    } else {
        $formErrors['username'] = 'Veuillez renseigner votre nouveau nom d\'utilisateur.';
    }

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $userUpdate->email = strip_tags($_POST['email']);
            try {
                //vérification de la disponibilté de l'email dans la bdd
                if ($userUpdate->checkAvaibility() == 1 && $userUpdate->email != $_SESSION['user']['email']) {
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
    //si aucune erreur
    if (count($formErrors) == 0) {
        //stockage de l'id de l'utilisateur de la session dans la propriété id de l'objet userUpdate
        $userUpdate->id = $_SESSION['user']['id'];
        try {
            //si la méthode de modification des infos de l'user marche
            if ($userUpdate->updateInfos()) {
                //je stocke l'username de l'user dans la session
                $_SESSION['user']['username'] = $_POST['username'];
                //et j'affiche un message de succès
                $success['updateInfos'] = 'Vos informations ont bien été modifié.';
            }
        } catch (PDOException $e) {
            $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
            echo $e->getMessage();
        }
    }
}

//update user password form
if (isset($_POST['updatePassword'])) {
    if (!empty($_POST['currentPassword'])) {
        $userUpdate->email = $_SESSION['user']['email'];
        $password = $userUpdate->getHash();
        if (!password_verify($_POST['currentPassword'], $password)) {
            $formErrors['currentPassword'] = 'Votre mot de passe actuel est incorrect.';
        }
    } else {
        $formErrors['currentPassword'] = 'Veuillez entrer votre mot de passe actuel avant de le modifier.';
    }

    if (!empty($_POST['newPassword'])) {
        if (!preg_match($regex['password'], $_POST['newPassword'])) {
            $formErrors['newPassword'] = 'Votre mot de passe n\'est pas valide. Il doit comporter au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial.';
        }
    } else {
        $formErrors['newPassword'] = 'Veuillez renseigner votre mot de passe.';
    }

    if (!empty($_POST['passwordConfirm'])) {
        if (!isset($formErrors['newPassword'])) {
            if ($_POST['newPassword'] == $_POST['passwordConfirm']) {
                $userUpdate->password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            } else {
                $formErrors['newPassword'] = $formErrors['passwordConfirm'] = 'Les mots de passes ne correspondent pas.';
            }
        }
    } else {
        $formErrors['passwordConfirm'] = 'Veuillez confirmer votre mot de passe.';
    }

    if (count($formErrors) == 0) {
        $userUpdate->id = $_SESSION['user']['id'];
        try {
            if ($userUpdate->updatePassword()) {
                $success['password'] = 'Votre mot de passe à bien été modifié';
            }
        } catch (PDOException $e) {
            $formErrors['general'] = 'Une erreur est survenue, l\'administrateur a été prévenu';
            // die($e->getMessage());
        }
    }
}

//si la donnée delete existe => si l'utilisateur clique sur l'input submit 
if (isset($_POST['delete'])) {
    //si la méthode de suppression de compte est lancée
    if ($user->deleteAccount()) {
        //je détruit les variables de session du user
        unset($_SESSION['user']);
        //je détruis la session
        session_destroy();
        //et je le redirige vers l'accueil
        header('Location: /accueil');
        exit;
    }
}
//appel de la méthode getOneById de mon usersModel pour récupérer des informations de l'utilisateur
$userDetails = $user->getOneById();


//PLANNING PART 


require_once '../models/usersReservationsModel.php';
$usersReservations = new usersReservations;
//sotcké l'id de l'utilisateur récupérer avec l'URL dans la propriété id_users de l'objet usersReservations
$usersReservations->id_users = $_SESSION['user']['id'];

//appeler getList() pour lister les réservations de l'utilisateur
$urList = $usersReservations->getList();

//si le formulaire est soumis, lancer la méthode de suppression
if (isset($_POST['deleteReservation'])) {
    $usersReservations->deleteReservation();
}
// if (isset($_POST['deleteOneById'])) {
//     $usersReservations->deleteOneById();
// }


//voir la view reservation quand je clique sur l'oeil
//supprimer la reservation du planning au clic sur trash

require_once '../views/parts/header.php';
require_once '../views/profile.php';
require_once '../views/parts/footer.php';
