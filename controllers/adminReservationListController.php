<?php

require_once '../models/reservationsModel.php';
$reservation = new reservations;
$reservationList = $reservation->getList();




require_once '../views/parts/header.php';
require_once '../views/adminReservationList.php';
require_once '../views/parts/footer.php';
