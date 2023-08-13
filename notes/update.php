<?php
include "../connect.php";
include "../zon.php";
$title= filterRequest("title");
$idbody= filterRequest("body");
$id  = filterRequest("id");
$stsm = $con->prepare("UPDATE `notes` SET `title`=?,`body`=? WHERE id=?");
$stsm->execute(array($title, $idbody , $id ));

$count = $stsm->rowCount();
if ($count > 0) {
    // نجاح تسجيل الدخول
    echo json_encode(array('success' => true, 'message' => 'تم تسجيل الدخول بنجاح.',));
} else {
    // فشل تسجيل الدخول
    echo json_encode(array('success' => false, 'message' => 'فشل تسجيل الدخول. الرجاء التحقق من اسم المستخدم وكلمة المرور.'));
}