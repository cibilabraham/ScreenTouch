<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['PaymentScreenshot']) && $_FILES['PaymentScreenshot']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fileTmpPath = $_FILES['PaymentScreenshot']['tmp_name'];
        $fileName = basename($_FILES['PaymentScreenshot']['name']);
        $fileSize = $_FILES['PaymentScreenshot']['size'];
        $fileType = $_FILES['PaymentScreenshot']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $allowedfileExtensions = array('jpg', 'png', 'pdf');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $dest_path = $uploadDir . $newFileName;
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                // Return the URL of the uploaded file
                $fileURL = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $dest_path;
                echo $fileURL;
            } else {
                echo 'Err';
            }
        } else {
            echo 'Err';
        }
    } else {
        echo 'Err';
    }
} else {
    echo 'Err';
}
?>
