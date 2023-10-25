<?php
$title = 'Recherche';
require_once '../models/reservationsModel.php';
require_once '../models/reservationsSubTypeModel.php';
require_once '../models/citiesModel.php';



//instanciation de l'objet reservationsSubTypes
$reservationsSubTypes = new reservationsSubTypes;
//récupérer la liste des sous types
$getSubTypesList = $reservationsSubTypes->getListBySubType();

//instanciation objet reservations
$reservation = new reservations;
//récupérer la liste des réservations par types
$reservationsTypes = $reservation->getListByType();


//tableau des types
$typesList = [];
$id = 0;

//Pour chaque sous types de la liste
foreach ($getSubTypesList as $stl) {
    //si l'id_reservationsType d'un sous type est différent de $id (=0)
    if ($stl->rtId != $id) {
        //le nom de l'id_reservationsType d'un sous type = nom du type dans l'objet $stl
        $typesList[$stl->rtId]['name'] = $stl->rtName;
    }
    //dans le tableau des types, stocker l'id-reszrvationsTypes de l'objet $stl
    $typesList[$stl->rtId]['subTypes'][$stl->rstId] = $stl->rstName;
    $id = $stl->rtId;
}

//changer le nom des $reservationList car peut y avoir des conflits

//si la valeur de la recherche est récupérer dans l'url
if (!empty($_GET['search'])) {
    //j'importe mon fichier reservationsModel
    require_once '../models/reservationsModel.php';
    //j'appelle la méthode search de l'objet reservations avec en paramètre la valeur de la recherche récupéré avec l'url, que je stocke dans la variable reservationList
    $reservationList = $reservation->search($_GET['search']);
} else {
    //si la valeur de la recherche n'est pas récupérer dans l'url, j'appelle getList pour lister toutes les réservations.
    $reservationList = $reservation->getList();
}

//si la category est selectionnée
if (!empty($_POST['category'])) {
    //je stocke la valeur de category dans la propriété id_reservationsSubTypes de l'objet reservation
    $reservation->id_reservationsSubTypes = $_POST['category'];

    if (!empty($_POST['price']) && $_POST['price'] == 'DESC') {
        $reservationList = $reservation->getListBySubType('DESC');
    } else {
        $reservationList = $reservation->getListBySubType('ASC');
    }
}




require_once '../views/parts/header.php';
require_once '../views/search.php';
require_once '../views/parts/footer.php';
