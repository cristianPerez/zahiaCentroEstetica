<?php
session_start();
$valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$max_size = 200 * 1024; // max file size
$path = '../uploads/'; // upload directory
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (!empty($_FILES['imageProduct'])){
            // get uploaded file extension
            $ext = strtolower(pathinfo($_FILES['imageProduct']['name'], PATHINFO_EXTENSION));
            // looking for format and size validity
            if (in_array($ext, $valid_exts) AND $_FILES['imageProduct']['size'] < $max_size) {
                $idunico = uniqid();
                $path = $path.'antes/antes'.$idunico.'.'.$ext;
                // move uploaded file from temp to uploads directory
                if (move_uploaded_file($_FILES['imageProduct']['tmp_name'], $path)) {
                    echo ('antes'.$idunico . '.' . $ext);
                }
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    
} else {
    echo '3';
}