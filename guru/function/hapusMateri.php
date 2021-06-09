<?php
    require '../../koneksi.php';
    session_start();
    $id = $_SESSION['id'];
    $id_materi = $_GET['id_materi'];
    $cariFile = mysqli_query($koneksi, "SELECT file_materi FROM materi WHERE id_materi = $id_materi AND id = $id") or die(mysqli_error($koneksi));
    $cariRow = mysqli_fetch_array($cariFile);
    if($cariRow>0){
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
    }
    else {
        echo "
                <script>
                    alert('Materi tidak bisa dihapus!');
                    document.location.href = '../materi.php';
                </script>
            ";
    }
?>