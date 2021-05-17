<?php
    $folder = "../../uploadMateri/";
    $filename = $_GET['file_materi'];
    $dir = $folder.$filename;
    $file_extension = strtolower(substr(strrchr($filename,"."),1));

    if (!file_exists($folder.$filename)) {
        echo '<script>alert("File Tidak Ada!");</script>';
        header("Location : materi.php");
    }
    else {
     header("Content-Disposition: attachment; filename=".basename($filename));
     header("Content-Type: application/octet-stream;");
     readfile($folder.$filename);
    }
?>