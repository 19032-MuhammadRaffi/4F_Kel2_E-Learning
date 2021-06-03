<?php
    require '../../koneksi.php';
    $id_materi = $_GET['id_materi'];
    $cariFile = mysqli_query($koneksi, "SELECT file_materi FROM materi WHERE id_materi = $id_materi") or die(mysqli_error($koneksi));
    $cariRow = mysqli_fetch_array($cariFile);
    $namaFile = $cariRow['file_materi'];
    $lokasi = "../../uploadMateri/".$namaFile;
    if (file_exists($lokasi)){
        unlink($lokasi);
    }
    $hapusSQL = mysqli_query($koneksi, "DELETE FROM materi WHERE id_materi = $id_materi") or die(mysqli_error($koneksi));
    if ($hapusSQL){
        echo "
            <script>
                alert('Materi berhasil dihapus!');
                document.location.href = '../materi.php';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Materi gagal dihapus!');
                document.location.href = '../materi.php';
            </script>
        ";
    }
?>