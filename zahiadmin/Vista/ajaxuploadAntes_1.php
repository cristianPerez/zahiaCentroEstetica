<?php
session_start();
$valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$max_size = 200 * 1024; // max file size
$path = '../uploads/'; // upload directory
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($_POST['accionp'] == 'registrar'){
        if (!empty($_FILES['imageProduct'])){
            // get uploaded file extension
            $ext = strtolower(pathinfo($_FILES['imageProduct']['name'], PATHINFO_EXTENSION));
            // looking for format and size validity
            if (in_array($ext, $valid_exts) AND $_FILES['imageProduct']['size'] < $max_size) {
                $idunico = uniqid();
                $path = $path.'antes/'.$idunico.'.'.$ext;
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
        if (isset($_POST['imgono3']) && $_POST['imgono3'] === '1') {

            if (!empty($_FILES['imageProductUpd'])){
                // get uploaded file extension
                $ext = strtolower(pathinfo($_FILES['imageProductUpd']['name'], PATHINFO_EXTENSION));
                // looking for format and size validity
                if (in_array($ext, $valid_exts) AND $_FILES['imageProductUpd']['size'] < $max_size) {
                    $idunico = uniqid();
                    $path = $path . 'antes/' . $idunico . '.' . $ext;
                    // move uploaded file from temp to uploads directory
                    if (move_uploaded_file($_FILES['imageProductUpd']['tmp_name'], $path)) {
                        //delete preview image
                        $imge = $_POST['imagenAntigua'];
                        if($imge !== "dp.jpg")
                        unlink("../uploads/antes/" . $imge);
                        //add new image in user session
                        //$_SESSION["image"] = $idunico . '.' . $ext;
                        echo ($idunico . '.' . $ext);
//                        echo ($idunico . '.' . $ext.','.$_POST['id_history']);
                    }
                } else {
                    echo '1';
                }
            } else {
                echo '2';
            }
        } else {
            echo ($_POST['imagenAntigua']);
//            echo ($_POST['imagenAntigua'].','.$_POST['idProducto']);
        }
    }
} else {
    echo '3';
}
?>