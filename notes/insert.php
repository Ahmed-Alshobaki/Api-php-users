<?php
include "../connect.php";
include "../zon.php";
$title= filterRequest("title");
$body= filterRequest("body");
$id  = filterRequest("iduser");
$stsm = $con->prepare("INSERT INTO `notes`(`title`, `body`, `iduser`) VALUES (?,?,?)");
$stsm->execute(array($title, $body , $id ));
$count = $stsm->rowCount();
if ($count > 0) {
    // نجاح تسجيل الدخول
    echo json_encode(array('success' => true, 'message' => 'تم تسجيل الدخول بنجاح.',));
} else {
    // فشل تسجيل الدخول
    echo json_encode(array('success' => false, 'message' => 'فشل تسجيل الدخول. الرجاء التحقق من اسم المستخدم وكلمة المرور.'));
}