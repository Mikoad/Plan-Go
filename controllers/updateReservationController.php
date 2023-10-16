<?php
require_once '../models/reservationsModel.php';
require_once '../models/reservationsSubTypeModel.php';
require_once '../models/citiesModel.php';




$regex = [
    'name' => '/^[A-Za-z0-9\s]{1,50}$/',
    'price' => '/^\d+(\.|\,)?\d{0,2}$/',
];

$formErrors = [];
$reservation = new reservations;
$reservation->id = $_GET['id'];
$reservationInfos = $reservation->getOneById();

$reservationsSubTypes = new reservationsSubTypes;
$subTypeList = $reservationsSubTypes->getList();

$cities = new cities;
$citiesList = $cities->getList();


if (isset($_POST['update'])) {
    //reservation object instance
    $updateReservation = new reservations;

    //form reservation checks
    if (!empty($_POST['name'])) {
        if (preg_match($regex['name'], $_POST['name'])) {
            $updateReservation->name = strip_tags($_POST['name']);
        } else {
            $formErrors['name'] = 'Le nom de la réservation doit contenir 50 caractères maximum. Les caractères spéciaux sont interdits';
        }
    } else {
        $formErrors['name'] = 'Le nom de la réservation est obligatoire';
    }

    if (!empty($_POST['price'])) {
        if (preg_match($regex['price'], $_POST['price'])) {
            $updateReservation->price = strip_tags($_POST['price']);
        } else {
            $formErrors['price'] = 'Le prix de la réservation ne doit contenir que des chiffres, séparés par une virgule ou un point';
        }
    } else {
        $formErrors['price'] = 'Le prix de la réservation est obligatoire';
    }

    if (!empty($_POST['description'])) {
        $updateReservation->description = strip_tags($_POST['description']);
    } else {
        $formErrors['description'] = 'La description de la réservation est obligatoire';
    }

    if (!empty($_POST['id_reservationsSubTypes'])) {
        $updateReservation->id_reservationsSubTypes = strip_tags($_POST['id_reservationsSubTypes']);
    } else {
        $formErrors['id_reservationsSubTypes'] = 'La sous-catégorie de la réservation est obligatoire';
    }

    if (!empty($_POST['id_cities'])) {
        $updateReservation->id_cities = strip_tags($_POST['id_cities']);
    } else {
        $formErrors['id_cities'] = 'La ville de la réservation est obligatoire';
    }

    if (isset($_POST['update'])) {
        if (isset($_POST['reservation_id'])) {
            $updateReservation->id = strip_tags($_POST['reservation_id']);
        }
    }





    //if no error => update reservation
    if (count($formErrors) == 0) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../' . $updateReservation->image)) {
            // ... et si l'article n'arrive pas à se créer ...
            if ($updateReservation->update()) {
                $success = 'L\'article a été modifié avec succès';
            } else {
                $formErrors['general'] = 'L\'article n\'a pas pu être modifié. Veuillez réessayer plus tard.';
                // ... je supprime l'image.
                unlink('../' . $updateReservation->image);
            }
        } else {
            $formErrors['image'] = 'L\'image n\'a pas pu être envoyée.';
        }
    }
}

// image update reservation
if (isset($_POST['updateImg'])) {
    if ($_FILES['image']['error'] != 4) {
        if ($_FILES['image']['size'] < 1000000) {
            //Au final, si je n'ai pas d'autres erreurs...
            if ($_FILES['image']['error'] == 0) {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $authorizedExtension = [
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    'webp' => 'image/webp'
                ];
                //array_key_exists vérifie si la clé dans le tableau $authorizedExtension existe 
                if (
                    array_key_exists($extension, $authorizedExtension) &&
                    //mime_content_type vérifie le vrai type d'image
                    mime_content_type($_FILES['image']['tmp_name']) == $authorizedExtension[$extension]
                ) {
                    $updateReservation->image = 'assets/img/' . uniqid() . '_' . date('d-m-Y') . '.' . $extension;
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
}

//delete reservation checks
if (isset($_POST['delete'])) {

    $reservation = new reservations;
    $reservation->delete();
    header('Location: /reservations');
    exit;
}



require_once '../views/parts/header.php';
require_once '../views/updateReservation.php';
require_once '../views/parts/footer.php';
