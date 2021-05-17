<?php
    require '../koneksi.php';
    require '../auth.php';
// Ambil Session
    session_start();
    $id = $_SESSION['id'];
    $querySession = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
    $rowSession = mysqli_fetch_array($querySession);
    $_SESSION['nama'] = $rowSession['nama'];
// Cek Session
    if (!isset($_SESSION["guru"])){
        header("Location: ../gate.php");
        exit;
    }
    else{
    }
?>
