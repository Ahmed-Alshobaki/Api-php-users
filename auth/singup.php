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
    // نجاح تسجيل الدخول
    echo json_encode(array('success' => true, 'message' => 'تم تسجيل الدخول بنجاح.'));
} else {
    // فشل تسجيل الدخول
    echo json_encode(array('success' => false, 'message' => 'فشل تسجيل الدخول. الرجاء التحقق من اسم المستخدم وكلمة المرور.'));
}