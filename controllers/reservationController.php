<?php
session_start();
require_once '../models/reservationsModel.php';

if (isset($_GET['id'])) {
    $reservationId = intval($_GET['id']);
}
$reservation = new reservations;
$reservationById = $reservation->getOneById($reservationId);

require_once '../views/parts/header.php';
require_once '../views/reservation.php';
require_once '../views/parts/footer.php';
