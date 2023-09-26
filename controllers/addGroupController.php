<?php
$title = 'Groupe';
require_once '../models/groupsModel.php';
$formErrors = [];
$regex = [
    "name" => '/^[A-Za-z0-9\-]{1,60}$/',
    "description" => '/^[A-Za-z0-9\s\-;:]{1,200}$/'
];




if (count($_POST) > 0) {
    $group = new groups;


    if (!empty($_POST['name'])) {
        if (preg_match($regex['name'], $_POST['name'])) {
            $group->name = strip_tags($_POST['name']);
        } else {
            $formErrors['name'] = 'Le nom du groupe ne peut contenir que des minuscules, majuscules et chiffres avec 60 caractères maximum';
        }
    } else {
        $formErrors['name'] = 'Le nom du groupe est obligatoire';
    }

    if (!empty($_POST['description'])) {
        if (preg_match($regex['description'], $_POST['description'])) {
            $group->description = strip_tags($_POST['description']);
        } else {
            $formErrors['description'] = 'La description du groupe ne peut contenir que des minuscules, majuscules, chiffres et caractères spéciaux(:;-)';
        }
    } else {
        $formErrors['description'] = 'La description du groupe est obligatoire';
    }

    if (count($formErrors) == 0) {
        $groupAdd = $group->add();
        if ($groupAdd != false) {
            //boucle pour envoyer un mail à chaque membre
            foreach ($_POST['email'] as $member) {
                //si l'email ou les emails sont rentrés,
                if (!empty($member)) {
                    if (filter_var($member, FILTER_VALIDATE_EMAIL)) {
                        //envoyé tel mail.
                        $to = $member;
                        $subject = 'Invitation du groupe ' . $group->name . ' sur Plan&Go';
                        $message = 'Vous avez reçu une invitation pour entrer dans le groupe ' . $group->name . '.' . ' Cliquez sur ce lien pour accepter l\'invitation et accéder au groupe.
                        http://localhost/inscription-' . $groupAdd;
                        $headers = array(
                            'From' => 'plan-go@gmail.com',
                            'Replyto' => 'plan-go@gmail.com',
                            'Content-Type' => 'text/plain; charset="utf-8'
                        );
                        mail($to, $subject, $message, $headers);
                    }
                }
            }
            header('Location: liste-groupes');
            exit;
        }
    }
}


require_once '../views/parts/header.php';

require_once '../views/addGroup.php';

require_once '../views/parts/footer.php';
