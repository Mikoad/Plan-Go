<?php
session_start();
require_once '../models/messagesModel.php';
require_once '../models/usersModel.php';
require_once '../models/groupsModel.php';





if (count($_POST) > 0) {
    $message = new messages;
    $message->content = strip_tags($_POST['content']);
    if ($message->add()) {
        $messageList = $message->getList();
    }
}
$messageList = $message->getList();
require_once '../views/parts/header.php';
require_once '../views/messages.php';
require_once '../views/parts/footer.php';
