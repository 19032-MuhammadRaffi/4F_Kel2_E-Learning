<?php
    require '../../koneksi.php';
    session_start();
    $id = $_SESSION['id'];
    $id_tugas = $_GET['id_tugas'];
    $cekId = mysqli_query($koneksi, "SELECT * FROM tugas WHERE id_tugas = $id_tugas AND id = $id");
    $rowId = mysqli_fetch_array($cekId);
    if($rowId>0){
        $hapusSQL = mysqli_query($koneksi, "DELETE FROM tugas WHERE id_tugas = $id_tugas AND id = $id") or die(mysqli_error($koneksi));
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
    }
    else {
        echo "
                <script>
                    alert('Tugas tidak bisa dihapus!');
                    document.location.href = '../tugas.php';
                </script>
            ";
    }
?>