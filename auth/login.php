<?php
include "../connect.php";
include "../zon.php";
    $email = filterRequest("email");
    $password = filterRequest("password");
    $stsm = $con->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stsm->execute(array( $email, $password));
    $count = $stsm->rowCount();
        if ($count > 0) {
            // نجاح تسجيل الدخول
            echo json_encode(array('success' => true, 'message' => 'تم تسجيل الدخول بنجاح.'));
        } else {
            // فشل تسجيل الدخول
            echo json_encode(array('success' => false, 'message' => 'فشل تسجيل الدخول. الرجاء التحقق من اسم المستخدم وكلمة المرور.'));
}