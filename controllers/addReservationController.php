<?php
session_start();
require_once '../models/reservationsModel.php';
require_once '../models/reservationsSubTypeModel.php';
require_once '../models/citiesModel.php';

// faire les regex name, price + vérif image + checkIfexists dans les models de id_cities et id_reservationsSubTypes pour vérifier si la catégorie/la ville existe bien
$regex = [
    'name' => '/^[A-Za-z0-9\s]{1,50}$/',
    'price' => '/^\d+(\.|\,)?\d{0,2}$/',
];

$formErrors = [];
//reservationsSubTypes object instance
$reservationsSubTypes = new reservationsSubTypes;
//call getList method 
$subTypeList = $reservationsSubTypes->getList();
$cities = new cities;
$citiesList = $cities->getList();


if (count($_POST) > 0) {
    //reservation object instance
    $reservation = new reservations;

    //form checks
    if (!empty($_POST['name'])) {
        if (preg_match($regex['name'], $_POST['name'])) {
            $reservation->name = strip_tags($_POST['name']);
        } else {
            $formErrors['name'] = 'Le nom de la réservation doit contenir 50 caractères maximum. Les caractères spéciaux sont interdits';
        }
    } else {
        $formErrors['name'] = 'Le nom de la réservation est obligatoire';
    }

    if (!empty($_POST['price'])) {
        if (preg_match($regex['price'], $_POST['price'])) {
            $reservation->price = strip_tags($_POST['price']);
        } else {
            $formErrors['price'] = 'Le prix de la réservation ne doit contenir que des chiffres, séparés par une virgule ou un point';
        }
    } else {
        $formErrors['price'] = 'Le prix de la réservation est obligatoire';
    }

    if (!empty($_POST['description'])) {
        $reservation->description = strip_tags($_POST['description']);
    } else {
        $formErrors['description'] = 'La description de la réservation est obligatoire';
    }


    if ($_FILES['image']['error'] != 4) {
        if ($_FILES['image']['size'] < 1000000) {
            //Au final, si je n'ai pas d'autres erreurs...
            if ($_FILES['image']['error'] == 0) {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $authorizedExtension = [
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif'
                ];
                //array_key_exists vérifie si la clé dans le tableau $authorizedExtension existe 
                if (
                    array_key_exists($extension, $authorizedExtension) &&
                    //mime_content_type vérifie le vrai type d'image
                    mime_content_type($_FILES['image']['tmp_name']) == $authorizedExtension[$extension]
                ) {
                    $reservation->image = 'assets/img/' . uniqid() . '_' . date('d-m-Y') . '.' . $extension;
                } else {
                    $formErrors['image'] = 'L\'image doit être au format jpg, jpeg, png ou gif.';
                }
            } else {
                $formErrors['image'] = 'L\'image n\'a pas pu être envoyée.';
            }
        } else {
            $formErrors['image'] = 'L\'image ne doit pas dépasser 1Mo.';
        }
    } else {
        $formErrors['image'] = 'L\'image est obligatoire.';
    }




    if (!empty($_POST['id_reservationsSubTypes'])) {
        $reservation->id_reservationsSubTypes = strip_tags($_POST['id_reservationsSubTypes']);
    } else {
        $formErrors['id_reservationsSubTypes'] = 'La sous-catégorie de la réservation est obligatoire';
    }

    if (!empty($_POST['id_cities'])) {
        $reservation->id_cities = strip_tags($_POST['id_cities']);
    } else {
        $formErrors['id_cities'] = 'La ville de la réservation est obligatoire';
    }

    //reservation publication check
    if (count($formErrors) == 0) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../' . $reservation->image)) {
            // ... et si l'article n'arrive pas à se créer ...
            if ($reservation->add()) {
                $success = 'L\'article a été ajouté avec succès';
            } else {
                $formErrors['general'] = 'L\'article n\'a pas pu être créé. Veuillez réessayer plus tard.';
                // ... je supprime l'image.
                unlink('../' . $reservation->image);
            }
        } else {
            $formErrors['image'] = 'L\'image n\'a pas pu être envoyée.';
        }
    }
}

require_once '../views/parts/header.php';
require_once '../views/addReservation.php';
require_once '../views/parts/footer.php';
