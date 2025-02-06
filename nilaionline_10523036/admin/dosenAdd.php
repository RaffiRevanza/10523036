<?php
include "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kode_mtkul = mysqli_real_escape_string($koneksi, $_POST['kode_mtkul']);
    $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

    
    $queryAdd = "INSERT INTO dosen (nip, nama, kode_mtkul, password) 
                 VALUES ('$nip', '$nama', '$kode_mtkul', '$password')";
    
    if (mysqli_query($koneksi, $queryAdd)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='./?adm=dosenView';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<h3>Tambah Data Dosen</h3>
<hr/>
<form method="post" action="dosenAdd.php">
    <label for="nip">NIP:</label><br />
    <input type="text" name="nip" required /><br /><br />
    
    <label for="nama">Nama:</label><br />
    <input type="text" name="nama" required /><br /><br />
    
    <label for="kode_mtkul">Kode Mata Kuliah:</label><br />
    <input type="text" name="kode_mtkul" required /><br /><br />
    
    <label for="password">Password:</label><br />
    <input type="password" name="password" required /><br /><br />
    
    <input type="submit" value="Tambah" />
    <a href="./?adm=dosenView"><button type="button">Kembali</button></a>
</form>