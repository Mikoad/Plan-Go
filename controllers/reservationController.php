<?php
session_start();
require_once '../models/reservationsModel.php';
//si l'id existe dans l'url, s'il est bien récupéré dans l'url
if (isset($_GET['id'])) {
    //je le stocke dans la variable $reservationId
    $reservationId = intval($_GET['id']);
}

//instanciation de l'objet reservations
$reservation = new reservations;
//stockage de l'id récupéré via l'url dans la propriété id de l'objet $reservation
$reservation->id = $reservationId;
//appel de la méthode getOneById de l'objet $reservation qui est stockée dans $reservationById
$reservationById = $reservation->getOneById();

require_once '../views/parts/header.php';
require_once '../views/reservation.php';
require_once '../views/parts/footer.php';
