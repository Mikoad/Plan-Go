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
        } else $formErrors['name'] = 'Le nom du groupe ne peut contenir que des minuscules, majuscules et chiffres avec 60 caractères maximum';
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
        $formErrors['description'] = 'La description du gorupe est obligatoire';
    }
    if (isset($_POST['add'])) {
        $addGroup = $group->add();
    }
}
require_once '../views/parts/header.php';
require_once '../views/addGroup.php';
require_once '../views/parts/footer.php';
