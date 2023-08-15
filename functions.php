<?php
    define("MB",1048576);

        function filterRequest($request){
    return  htmlspecialchars(strip_tags($_POST[$request]));
        }
        function imageUpload($image){
            global $masError;
            $imagename =    rand(1000,500).$_FILES[$image]["name"];
            $imagetmp_name = $_FILES[$image]["tmp_name"];
            $size = $_FILES[$image]["size"];
            $allow = array("png", "jpg", "gif");
            $strtoarry = explode(".", $imagename);
            $ext = end($strtoarry);
            $ext = strtolower($ext);
            if (!empty($imagename) && !in_array($ext, $allow)) {
                $masError[] = "Ext";
            }
            if ($size > 1* MB) { // 2 * MB
                $masError[] = "size";
            }
            if (empty($masError)) {
                move_uploaded_file($imagetmp_name, "../upload/" . $imagename);
                return $imagename;
            } else {
                echo "<pre>";
                return "file";
                print_r($masError);
            }
        }

        function deletefile($dri,$nmaeimage){
            if (file_exists($dri. "/" .$nmaeimage)){
                unlink($dri. "/" .$nmaeimage);
            }
        }

