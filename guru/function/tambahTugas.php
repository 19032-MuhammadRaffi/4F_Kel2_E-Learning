<?php
    if (isset($_POST["tambahTugas"])){
        $judul = $_POST["judul"];
        $waktu = $_POST["waktu"];
        $queryTugas = mysqli_query($koneksi, "INSERT INTO tugas VALUES ('','$id','$judul','$waktu')") or die($koneksi);
    }
?>