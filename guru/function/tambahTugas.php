<?php
    if (isset($_POST["tambahTugas"])){
        $judul = $_POST["judul"];
        $queryTugas = mysqli_query($koneksi, "INSERT INTO tugas VALUES (null,'$id','$judul')") or die($koneksi);
    }
?>