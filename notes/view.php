<?php
include "../connect.php";
include "../zon.php";
$id = filterRequest("id");
$stsm = $con->prepare("SELECT * FROM notes WHERE iduser = ? ");
$stsm->execute(array( $id));
$data = $stsm->fetch(PDO::FETCH_ASSOC);
$count = $stsm->rowCount();
if ($count > 0) {
    // نجاح تسجيل الدخول
    echo json_encode(array('success' => true, 'message' => 'تم تسجيل الدخول بنجاح.','data' => $data ));
} else {
    // فشل تسجيل الدخول
    echo json_encode(array('success' => false, 'message' => 'فشل تسجيل الدخول. الرجاء التحقق من اسم المستخدم وكلمة المرور.'));
}