<?php
$title = 'Recherche';
require_once '../models/reservationsModel.php';
require_once '../models/citiesModel.php';


$reservation = new reservations;



if (!empty($_GET['search'])) {
    require_once '../models/reservationsModel.php';

    $reservation = new reservations;
    $reservationList = $reservation->search($_GET['search']);
} else {
    $reservationList = $reservation->getList();
}
//faire en sorte que la recherche marche et affiche les résultats attendus


require_once '../views/parts/header.php';
require_once '../views/search.php';
require_once '../views/parts/footer.php';
