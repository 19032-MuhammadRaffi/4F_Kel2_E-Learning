<?php
    require '../../koneksi.php';
    $id = $_GET['id'];
    $hapusSQL = mysqli_query($koneksi, "DELETE FROM user WHERE id = $id") or die(mysqli_error($koneksi));
    if ($hapusSQL){
        echo "
            <script>
                alert('Siswa berhasil dihapus!');
                document.location.href = '../siswa.php';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Siswa gagal dihapus!');
                document.location.href = '../siswa.php';
            </script>
        ";
    }
?>