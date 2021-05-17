<?php
    require '../../koneksi.php';
    $id_tugas = $_GET['id_tugas'];
    $hapusSQL = mysqli_query($koneksi, "DELETE FROM tugas WHERE id_tugas = $id_tugas") or die(mysqli_error($koneksi));
    $hapus2SQL = mysqli_query($koneksi, "DELETE FROM soal WHERE id_tugas = $id_tugas") or die(mysqli_error($koneksi));
    if ($hapusSQL){
        echo "
            <script>
                alert('Tugas berhasil dihapus!');
                document.location.href = '../tugas.php';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Tugas gagal dihapus!');
                document.location.href = '../tugas.php';
            </script>
        ";
    }
?>