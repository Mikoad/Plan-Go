loginController

<?php
$regexMail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$regexPassword = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

if(count($_POST) > 0) {
    if(!empty($_POST['email'])) {
        $email = $_POST['email'];
        if (preg_match($regexMail, $email)){
            echo 'ok';
        }
    }
}

require_once '../views/login.php'; ?>