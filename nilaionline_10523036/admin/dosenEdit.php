<?php
include "../koneksi/koneksi.php";


if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    
    $query = "SELECT * FROM dosen WHERE nip = '$nip'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    
    
    if (!$data) {
        echo "<script>alert('Data dosen tidak ditemukan'); window.location='dosenView.php';</script>";
        exit;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kode_mtkul = mysqli_real_escape_string($koneksi, $_POST['kode_mtkul']);
    $password = $_POST['password'] ? md5($_POST['password']) : $data['password']; 

    
    $queryUpdate = "UPDATE dosen SET nama = '$nama', kode_mtkul = '$kode_mtkul', password = '$password' WHERE nip = '$nip'";

    
    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('Data berhasil diubah'); window.location='./?adm=dosenView';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<h3>Edit Data Dosen</h3>
<hr/>
<form method="post" action="dosenEdit.php?nip=<?php echo $nip; ?>">
    <label for="nip">NIP:</label><br />
    <input type="text" name="nip" value="<?php echo $data['nip']; ?>" readonly /><br /><br />
    
    <label for="nama">Nama:</label><br />
    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required /><br /><br />
    
    <label for="kode_mtkul">Kode Mata Kuliah:</label><br />
    <input type="text" name="kode_mtkul" value="<?php echo $data['kode_mtkul']; ?>" required /><br /><br />
    
    <label for="password">Password:</label><br />
    <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" /><br /><br />
    
    <input type="submit" value="Update" />
    <a href="./?adm=dosenView"><button type="button">Kembali</button></a>
</form>
