<?php
session_start();
require_once '../models/groupsModel.php';

$group = new groups;
$groupsList = $group->getList();

require_once '../views/parts/header.php';
require_once '../views/groupsList.php';
require_once '../views/parts/footer.php';
