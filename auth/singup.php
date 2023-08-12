<?php
include "../connect.php";
include "../zon.php";
    $username = filterRequest("username");
        $email = filterRequest("email");
        $password = filterRequest("password");
        $stsm = $con->prepare("INSERT INTO `users`(`username`, `email`, `password`) VALUES (?,?,?)");
        $stsm->execute(array($username, $email, $password));
        $count = $stsm->rowCount();
        if ($count > 0) {
            echo json_encode(array("1" => "1"));
        } else {
            echo json_encode(array ("2" => "2"));
        }