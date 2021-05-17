<?php
    require '../../koneksi.php';
    $id_tugas = $_GET['id_tugas'];
    $id_soal = $_GET['id_soal'];
    $cariFile = mysqli_query($koneksi, "SELECT gambar FROM soal WHERE id_soal = $id_soal") or die(mysqli_error($koneksi));
    $cariRow = mysqli_fetch_array($cariFile);
    $namaFile = $cariRow['gambar'];
    $lokasi = "../../uploadSoal/".$namaFile;
    if (file_exists($lokasi)){
        unlink($lokasi);
    }
    $hapusSQL = mysqli_query($koneksi, "DELETE FROM soal WHERE id_soal = $id_soal") or die(mysqli_error($koneksi));
    if ($hapusSQL){
        echo "
            <script>
                alert('Soal berhasil dihapus!');
                document.location.href = '../soal.php?id_tugas=$id_tugas';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Soal gagal dihapus!');
                document.location.href = '../soal.php?id_tugas=$id_tugas';
            </script>
        ";
    }
?>