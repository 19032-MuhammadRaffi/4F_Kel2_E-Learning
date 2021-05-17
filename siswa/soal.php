<?php
    require '../koneksi.php';
    require 'function/session.php';
    $id_tugas = $_GET['id_tugas'];
    $readSoal = mysqli_query($koneksi, "SELECT * FROM soal WHERE id_tugas='$id_tugas'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Materi</title>
</head>

<body>
<!-- Sidebar -->
    <div class="d-flex" id="wrapper">
        <div class="bg-3" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 warna-1 fs-4 fw-bold text-uppercase">
                <i class="fas fa-user-secret me-2"></i>E-Learning</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="materi.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-book-reader me-2"></i>Materi</a>
                <a href="tugas.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold active-bar">
                    <i class="fas fa-tasks me-2"></i>Tugas</a>
                <a href="nilai.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-chart-bar me-2"></i>Nilai</a>
                <a href="setting.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-users-cog me-2"></i>Pengaturan Akun</a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-power-off me-2"></i>Logout</a>
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
                    <div class="table-responsive-xxl">
                        <table class="table table-bordered table-light border-dark align-middle mx-auto">
                            <thead class="text-center table-dark">
                                <tr>
                                    <td>Soal</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row = mysqli_fetch_array($readSoal)){
                                        $gambar = $row['gambar'];
                                        echo '
                                        <form action="" method="post">
                                            <tr>
                                                <td>
                                                    '.$row['soal'].'<br>';
                                                    if ($gambar=="") {
                                                        echo '<br>';
                                                    } else {
                                                        echo '<br><img src="../uploadSoal/'.$gambar.'" style="width: 100px; height: 100px;"><br><br>';
                                                    }
                                                    echo '
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="a" value="'.$row['pil_a'].'">
                                                        <label class="form-check-label" for="a">A. '.$row['pil_a'].'</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="b" value="'.$row['pil_b'].'">
                                                        <label class="form-check-label" for="b">B. '.$row['pil_b'].'</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="c" value="'.$row['pil_c'].'">
                                                        <label class="form-check-label" for="c">C. '.$row['pil_c'].'</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="d" value="'.$row['pil_d'].'">
                                                        <label class="form-check-label" for="d">D. '.$row['pil_d'].'</label>
                                                    </div>
                                                    <input type="hidden" value="'.$row['jawaban'].'" name="kunci">
                                                
                                                </td>
                                            </tr>
                                        </form>';
                                    }
                                ?>
                                <tr>
                                    <td class="text-center"><button class="btn btn-primary">Submit</button></td>
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
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>