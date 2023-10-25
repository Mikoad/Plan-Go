<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
require_once '../models/usersReservationsModel.php';
$usersReservations = new usersReservations;
$usersReservations->id_reservations = $_GET['id'];
$usersReservations->id_users = $_SESSION['user']['id'];

echo $usersReservations->add();
