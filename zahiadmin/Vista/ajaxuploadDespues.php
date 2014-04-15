<?php
session_start();
$valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$max_size = 600 * 3024; // max file size
$path = '../uploads/'; // upload directory
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['accionp'] == 'registrar'){
        if (!empty($_FILES['imageProduct'])) {
            // get uploaded file extension
            $ext = strtolower(pathinfo($_FILES['imageProduct']['name'], PATHINFO_EXTENSION));
            // looking for format and size validity
            if (in_array($ext, $valid_exts) AND $_FILES['imageProduct']['size'] < $max_size) {
                $idunico = uniqid();
                $path = $path.'productos/'.$idunico.'.'.$ext;
                // move uploaded file from temp to uploads directory
                if (move_uploaded_file($_FILES['imageProduct']['tmp_name'], $path)) {
                    echo ($idunico . '.' . $ext);
                }
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    }else if ($_POST['accionp'] === "modificar"){
        if (isset($_POST['imgono4']) && $_POST['imgono4'] === '1') {

            if (!empty($_FILES['imageDespuesUpd'])){
                // get uploaded file extension
                $ext = strtolower(pathinfo($_FILES['imageDespuesUpd']['name'], PATHINFO_EXTENSION));
                // looking for format and size validity
                if (in_array($ext, $valid_exts) AND $_FILES['imageDespuesUpd']['size'] < $max_size) {
                    $idunico = uniqid();
                    $path = $path . 'despues/' . $idunico . '.' . $ext;
                    // move uploaded file from temp to uploads directory
                    if (move_uploaded_file($_FILES['imageDespuesUpd']['tmp_name'], $path)) {
                        //delete preview image
                        $imge = $_POST['imagenAntiguaDespues'];
                        if($imge !== "dp.jpg")
                        unlink("../uploads/despues/" . $imge);
                        echo ($idunico . '.' . $ext);
                    }
                } else {
                    echo '1';
                }
            } else {
                echo '2';
            }
        } else {
            echo ($_POST['imagenAntiguaDespues']);
        }
    }
} else {
    echo '3';
}
?>