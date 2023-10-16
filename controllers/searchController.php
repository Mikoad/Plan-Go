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
//récupérer la liste des types
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


if (!empty($_GET['search'])) {
    require_once '../models/reservationsModel.php';
    $reservationList = $reservation->search($_GET['search']);
} else {
    $reservationList = $reservation->getList();
}
//appel méthode checkIfExists

if (!empty($_POST['category'])) {
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
