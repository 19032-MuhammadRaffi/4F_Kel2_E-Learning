<?php
    require '../../koneksi.php';
    $id = $_GET["id"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $alamat = $_POST["alamat"];
    $wa = $_POST["wa"];
    $pwd1 = $_POST["password1"];
    $pwd2 = $_POST["password2"];
    $read = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id' AND password=md5('$pwd1')");
    $row = mysqli_fetch_array($read);
    if ($row>=1) {
        $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', jk='$jk', wa='$wa', password=md5('$pwd2'), alamat='$alamat' WHERE id='$id' AND password=md5('$pwd1')") or die ($koneksi);
        if ($query) {
            echo "<script>alert('Akun berhasil diedit!')
            window.location.replace('../setting.php');</script>";
        }
        else {
            echo "<script>alert('Akun gagal diedit!')
            window.location.replace('../setting.php');</script>";
        }
    }
    else {
        echo "<script>alert('Password salah!')
        window.location.replace('../setting.php');</script>";
    }
?>