<?php
include "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nl_tugas = mysqli_real_escape_string($koneksi, $_POST['nl_tugas']);
    $nl_uts = mysqli_real_escape_string($koneksi, $_POST['nl_uts']);
    $nl_uas = mysqli_real_escape_string($koneksi, $_POST['nl_uas']);

    $queryInsert = "INSERT INTO nilai (nim, nip, nl_tugas, nl_uts, nl_uas) 
                    VALUES ('$nim', '$nip', '$nl_tugas', '$nl_uts', '$nl_uas')";

    if (mysqli_query($koneksi, $queryInsert)) {
         
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href = './?adm=mahasiswa';  // Ganti dengan halaman admin yang sesuai
              </script>";
    } else {
        
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>


<div class="content-wrapper">
    <h3>Tambah Data Nilai</h3>
    <hr/><br />

    
    <div class="form-container">
        <form method="post" action="nilaiAdd.php">
            <label for="nim">NIM:</label><br />
            <input type="text" name="nim" required /><br /><br />

            <label for="nip">NIP Dosen:</label><br />
            <input type="text" name="nip" required /><br /><br />

            <label for="nl_tugas">Nilai Tugas:</label><br />
            <input type="number" name="nl_tugas" step="0.01" required /><br /><br />

            <label for="nl_uts">Nilai UTS:</label><br />
            <input type="number" name="nl_uts" step="0.01" required /><br /><br />

            <label for="nl_uas">Nilai UAS:</label><br />
            <input type="number" name="nl_uas" step="0.01" required /><br /><br />

            <input type="submit" value="Tambah" />

            
            <a href="./?adm=mahasiswa"><input type="button" value="Kembali" /></a>
        </form>
    </div>
</div>
