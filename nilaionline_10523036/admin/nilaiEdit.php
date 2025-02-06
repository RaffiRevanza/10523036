<?php
include "../koneksi/koneksi.php";

if (isset($_GET['nim']) && isset($_GET['nip'])) {
    $nim = $_GET['nim'];
    $nip = $_GET['nip'];

    
    $query = "SELECT * FROM nilai WHERE nim = '$nim' AND nip = '$nip'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location='nilaiView.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('NIM atau NIP tidak diterima'); window.location='nilaiView.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nip = $_POST['nip'];
    $nl_tugas = $_POST['nl_tugas'];
    $nl_uts = $_POST['nl_uts'];
    $nl_uas = $_POST['nl_uas'];

    
    $queryUpdate = "UPDATE nilai SET nl_tugas = '$nl_tugas', nl_uts = '$nl_uts', nl_uas = '$nl_uas'
                    WHERE nim = '$nim' AND nip = '$nip'";

    if (mysqli_query($koneksi, $queryUpdate)) {
        
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href = './?adm=mahasiswa';  // Ganti dengan halaman admin yang sesuai
              </script>";
    } else {
        
        echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<h3>Edit Data Nilai</h3>
<hr/><br />

<form method="post" action="nilaiEdit.php?nim=<?php echo $nim; ?>&nip=<?php echo $nip; ?>">
    <label for="nim">NIM:</label><br />
    <input type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly /><br /><br />
    
    <label for="nip">NIP Dosen:</label><br />
    <input type="text" name="nip" value="<?php echo $data['nip']; ?>" readonly /><br /><br />
    
    <label for="nl_tugas">Nilai Tugas:</label><br />
    <input type="number" name="nl_tugas" step="0.01" value="<?php echo $data['nl_tugas']; ?>" required /><br /><br />
    
    <label for="nl_uts">Nilai UTS:</label><br />
    <input type="number" name="nl_uts" step="0.01" value="<?php echo $data['nl_uts']; ?>" required /><br /><br />
    
    <label for="nl_uas">Nilai UAS:</label><br />
    <input type="number" name="nl_uas" step="0.01" value="<?php echo $data['nl_uas']; ?>" required /><br /><br />
    
    <input type="submit" value="Update" />
    
    <!-- Tombol Batal yang mengarahkan kembali ke halaman nilaiView.php -->
    <a href="./?adm=mahasiswa"><button type="button">Batal</button></a>
</form>
