<?php
    require '../koneksi.php';
    require 'function/session.php';
    $id_soal = $_GET['id_soal'];
    $readSoal = mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$id_soal'");
    $soal = mysqli_fetch_array($readSoal);
    $id_tugas = $soal['id_tugas'];
    if (isset($_POST["editSoal"])) {
        $id_soal = $_GET['id_soal'];
        $soal = $_POST["soal"];
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];
        $d = $_POST["d"];
        $jawaban = $_POST["jawaban"];
        $updateSQL = mysqli_query($koneksi, "UPDATE soal SET soal='$soal', pil_a='$a', pil_b='$b', pil_c='$c', pil_d='$d', jawaban = '$jawaban' WHERE id_soal='$id_soal'") or die ($koneksi);
        if ($updateSQL){
            echo "
                <script>
                    alert('Soal berhasil diedit!');
                    document.location.href = 'soal.php?id_tugas=$id_tugas';
                </script>
            ";
        }
        else {
            echo "
                <script>
                    alert('Soal gagal diedit!');
                    document.location.href = 'soal.php?id_tugas=$id_tugas';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Kelola Materi</title>
</head>
<body>
<!-- Sidebar -->
    <div class="d-flex" id="wrapper">
        <div class="bg-3" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 warna-1 fs-4 fw-bold text-uppercase">
                <i class="fas fa-user-secret me-2"></i>E-Learning</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent fw-bold warna-1">
                    <i class="fas fa-tachometer-alt me-2"></i>Beranda</a>
                <a href="materi.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-book-reader me-2"></i>Kelola Materi</a>
                <a href="tugas.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold active-bar">
                    <i class="fas fa-tasks me-2"></i>Kelola Tugas</a>
                <a href="nilai.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-chart-bar me-2"></i>Nilai Siswa</a>
                <a href="siswa.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-users-cog me-2"></i>Kelola Siswa</a>
                <a href="setting.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-users-cog me-2"></i>Pengaturan Akun</a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
                onclick="return confirm('Keluar ?')">
                    <i class="fas fa-power-off me-2"></i>Keluar</a>
            </div>
        </div>
<!-- Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-2 py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left warna-1 fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 warna-1">Dashboard</h2>
                </div>
            </nav>
            <div class="container-fluid px-4">
                <div class="row my-2">
                    <div class="table-responsive-xxl mt-3">
                        <table class="table table-bordered table-light border-dark align-middle mx-auto">
                            <tr class="table-dark text-center">
                                <td colspan="2">Tambah Soal</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="my-2">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                    echo '
                                        Pertanyaan: <textarea name="soal" class="form-control w-100">'.$soal["soal"].'</textarea><br>
                                        Jawaban A : <input type="text" name="a" class="form-control" value="'.$soal["pil_a"].'"><br>
                                        Jawaban B : <input type="text" name="b" class="form-control" value="'.$soal["pil_b"].'"><br>
                                        Jawaban C : <input type="text" name="c" class="form-control" value="'.$soal["pil_c"].'"><br>
                                        Jawaban D : <input type="text" name="d" class="form-control" value="'.$soal["pil_d"].'"><br>
                                        <label>Kunci Jawaban :</label>
                                            <select name="jawaban"  class="form-select text-center" style="width: 100px;">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </select><br>
                                        <div class="text-center">
                                            '?><button type="submit" name="editSoal" class="btn btn-primary w-25" onclick="return confirm('Edit soal?')">Simpan</button><?php echo '
                                        </div>
                                    ';
                                    ?>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Javascript -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>