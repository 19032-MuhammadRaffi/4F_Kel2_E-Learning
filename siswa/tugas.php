<?php
    require '../koneksi.php';
    require 'function/session.php';
    require 'function/statusBox.php';
    $sqlTugas = "SELECT * FROM tugas";
    $query = mysqli_query($koneksi, $sqlTugas);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Dashboard</title>
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
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
                onclick="return confirm('Keluar ?')">
                    <i class="fas fa-power-off me-2"></i>Keluar</a>
            </div>
        </div>
<!-- Status Bar -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-2 py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left warna-1 fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 warna-1">Kelola Tugas</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-4">
                        <div class="p-3 bg-1 shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $rowMateri ?></h3>
                                <p class="fs-5 fw-bold" name>Materi</p>
                            </div>
                            <i class="fas fa-book-reader fs-1 warna-1 rounded-full bg-2 p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-1 shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $rowTugas ?></h3>
                                <p class="fs-5 fw-bold">Tugas</p>
                            </div>
                            <i
                                class="fas fa-tasks fs-1 warna-1 rounded-full bg-2 p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-1 shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $rowSiswa ?></h3>
                                <p class="fs-5 fw-bold">Siswa</p>
                            </div>
                            <i class="fas fa-users fs-1 warna-1 rounded-full bg-2 p-3"></i>
                        </div>
                    </div>
                </div>
                <hr class="bg-white hr">
<!-- Content -->
                    <div class="table-responsive-xxl">
                        <table class="table table-bordered border-primary align-middle text-center  mx-auto" style="min-width: 1000px;">
                            <thead class="table-dark border-light">
                                <tr>
                                    <th style="width: 25%;">Guru</th>
                                    <th style="width: 40%;">Judul Tugas</th>
                                    <th style="width: 15%;">Waktu Pengerjaan</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-light border-dark">
                                <?php
                                    while ($row = mysqli_fetch_array($query)){
                                        $queryID = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$row[id]'");
                                        $rowUser = mysqli_fetch_array($queryID);
                                        $queryTgs = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id=$id AND id_tugas=$row[id_tugas]");
                                        $rowTgs = mysqli_fetch_array($queryTgs);
                                        $waktu = $row['waktu']/60;
                                        if ($rowTgs==0) {
                                            echo '
                                            <form action="" method="post">
                                                <tr>
                                                    <td>'.$rowUser['nama'].'</td>
                                                    <td>'.$row['judul'].'</td>
                                                    <td>'.$waktu.' Menit</td>
                                                    <td><span class="badge bg-danger">Belom Dikerjakan</span></td>
                                                    <td>
                                                        <a href="soal.php?id_tugas='.$row['id_tugas'].'" class="btn btn-primary w-100"><i class="fas fa-pen-alt me-2"></i>Kerjakan</a>
                                                        
                                                    </td>
                                                </tr>
                                            </form>';
                                        } else {
                                            echo '
                                            <form action="" method="post">
                                                <tr>
                                                    <td>'.$rowUser['nama'].'</td>
                                                    <td>'.$row['judul'].'</td>
                                                    <td>'.$waktu.' Menit</td>
                                                    <td><span class="badge bg-success">Selesai</span></td>
                                                    <td>
                                                        <a href="nilai.php" class="btn btn-primary w-100"><i class="fas fa-poll me-2"></i>Hasil</a>
                                                    </td>
                                                </tr>
                                            </form>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<!-- Footer -->
            <footer class="footer mt-auto pb-4 bg-transparant fixed-bottom">   
                <div class="container-fluid text-center">
                    <span class="text-muted">Dibuat penuh ❤️ Kelompok 2 - 4F &copy 2021</span>
                </div>
            </footer>
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