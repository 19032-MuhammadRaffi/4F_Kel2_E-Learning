<?php
    require '../../koneksi.php';
    session_start();
    $id = $_SESSION['id'];
    $id_tugas = $_GET['id_tugas'];
    if(isset($_POST['kirim'])){
        if(empty($_POST['pilihan'])){
        ?>
            <script language="JavaScript">
                alert('Oops! Serius. Anda tidak mengerjakan soal apapun ...');
                document.location='./';
            </script>
        <?php
        }
        $pilihan = $_POST["pilihan"];
        $id_soal = $_POST["id"];
        $jumlah = $_POST["jmlSoal"];

        $score = 0;
        $benar = 0;
        $salah = 0;
        $kosong = 0;

        for($i=0;$i<$jumlah;$i++){
            $nomor = $id_soal[$i];
            if(empty($pilihan[$nomor])){
                $kosong++;
            }
            else {
                $jawaban = $pilihan[$nomor];
                $query = mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$nomor' AND jawaban='$jawaban'");
                $cek = mysqli_num_rows($query);
                if($cek){
                    $benar++;
                }
                else {
                    $salah++;
                }
            }
            $hitung = mysqli_query($koneksi, "SELECT * FROM soal WHERE id_tugas=$id_tugas");
            $jumlah_soal = mysqli_num_rows($hitung);
            $score = 100 / $jumlah_soal * $benar;
            $hasil = number_format($score,2);
        }
        $insertNilai = mysqli_query($koneksi, "INSERT INTO nilai VALUES (NULL, '$id_tugas', '$id', '$hasil')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Nilai Tugas</title>
    <style>
        html,body{
            height: 100%;
        }
        .wrapper {
            height: 100%;
        }
    </style>
</head>
<body class="bg-dark">
    <div   div class="container d-flex wrapper" style="margin-top: -100px;">
        <div class="row content m-auto w-50" style="max-width: 700px;">
            <div class="col-md m-auto bg-light p-3" style="border-radius: 10px;">
                <div class="text-center">
                <table class="table table-light table-bordered">
                    <tbody>
                        <tr>
                            <td colspan='4'><h4>Nilai Ujian Anda</h4></td>
                        </tr>
                        <tr>
                            <td width='250px'>Benar ✔</td>
                            <td width='250px'>Salah ✕</td>
                            <td width='250px'>Tidak Terjawab !</td>
                            <td width='250px'>Skor Akhir</td>
                        </tr>
                        <tr>
                            <td><?php echo $benar ?></td>
                            <td><?php echo $salah ?></td>
                            <td><?php echo $kosong ?></td>
                            <td><?php echo $hasil ?></b></td>
                        </tr>
                    </tbody>
                </table>
                <a href='../nilai.php' class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>