<?php
    if (isset($_POST["tambahSoal"])){    
        $id_tugas = $_GET['id_tugas'];
        $soal = $_POST["soal"];
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];
        $d = $_POST["d"];
        $jawaban = $_POST["jawaban"];
        // File Upload
        $namaAsli = $_FILES['fileSoal']['name'];
        $x = explode('.',$namaAsli);
        $eks = strtolower(end($x));
        $asal = $_FILES['fileSoal']['tmp_name'];
        $dir = "../uploadSoal/";
        $nama = uniqid();
        $nama .= '.'.$eks;
        $targetFile = $dir.$nama;
        $uploadOk = 1;
        // Cek apakah file sudah ada difolder ?
        if (file_exists($targetFile)){
            $uploadOk = 0;
        }
        // Cek Proses Upload
        if ($uploadOk == 0){
            echo '<script>alert("Nama file sudah ada!");</script>';
        } else if ($namaAsli=="") {
            $tambahSoal = mysqli_query($koneksi, "INSERT INTO soal VALUES (null,'$id_tugas','$soal','$namaAsli','$a','$b','$c','$d','$jawaban', NOW())") or die($koneksi);
            if ($tambahSoal){
                echo "<script>alert('Soal berhasil ditambahkan!')
                window.location.replace('soal.php?id_tugas=$id_tugas');</script>";
            }
        }
        else {
            if (move_uploaded_file($asal, $targetFile)){
                $tambahSoal = mysqli_query($koneksi, "INSERT INTO soal VALUES (null,'$id_tugas','$soal','$nama','$a','$b','$c','$d','$jawaban', NOW())") or die($koneksi);
                if ($tambahSoal){
                    echo "<script>alert('Soal berhasil ditambahkan!')
                    window.location.replace('soal.php?id_tugas=$id_tugas');</script>";
                }
            } else {
                echo '<script>alert("Proses Upload GAGAL!");</script>';
            }
        }
    }
?>