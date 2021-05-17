<?php
    require '../koneksi.php';
    require 'function/session.php';
    require 'function/statusBox.php';
    $sqlUser = "SELECT * FROM user WHERE status='Siswa'";
    $query = mysqli_query($koneksi, $sqlUser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Kelola Siswa</title>
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
                    <i class="fas fa-book-reader me-2"></i>Kelola Materi</a>
                <a href="tugas.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-tasks me-2"></i>Kelola Tugas</a>
                <a href="nilai.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-chart-bar me-2"></i>Nilai Siswa</a>
                <a href="siswa.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold active-bar">
                    <i class="fas fa-users-cog me-2"></i>Kelola Siswa</a>
                <a href="setting.php" class="list-group-item list-group-item-action bg-transparent warna-1 fw-bold">
                    <i class="fas fa-users-cog me-2"></i>Pengaturan Akun</a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
<!-- Status Bar -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-2 py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left warna-1 fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 warna-1">Kelola Siswa</h2>
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
                <div class="row my-5">
                    <div class="table-responsive-xxl">
                        <table class="table table-bordered border-primary align-middle text-center  mx-auto" style="min-width: 1000px;">
                            <thead class="table-dark border-light">
                                <tr>
                                    <th style="width: 10%;">NIS</th>
                                    <th style="width: 25%;">Nama</th>
                                    <th style="width: 5%;">JK</th>
                                    <th style="width: 10%;">Nomer WA</th>
                                    <th style="width: 40%;">Alamat</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-light border-dark">
                            <?php
                                    while ($row = mysqli_fetch_array($query)){
                                        echo '
                                        <form action="" method="post">
                                            <tr>
                                                <td>'.$row['id'].'</td>
                                                <td>'.$row['nama'].'</td>
                                                <td>'.$row['jk'].'</td>
                                                <td>'.$row['wa'].'</td>
                                                <td>'.$row['alamat'].'</td>
                                                <td>
                                                    <a href="function/hapusUser.php?id='.$row['id'].'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </form>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Footer -->
    <footer class="footer mt-auto py-3 bg-transparant fixed-bottom">   
        <div class="container-fluid text-center">
            <span class="text-muted">Dibuat penuh ❤️ Kelompok 2 - 4F &copy 2021</span>
        </div>
    </footer>
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