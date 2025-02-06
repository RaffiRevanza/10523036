<?php
include "../koneksi/koneksi.php";

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    
    if (!preg_match('/^\d+$/', $nip)) {
        echo "<script>alert('NIP tidak valid'); window.location='./?adm=mahasiswa';</script>";
        exit;
    }

    
    $queryDelete = "DELETE FROM dosen WHERE nip = ?";
    $stmt = mysqli_prepare($koneksi, $queryDelete);
    mysqli_stmt_bind_param($stmt, "s", $nip);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data berhasil dihapus'); window.location='./?adm=mahasiswa';</script>";
    } else {
        error_log("Gagal menghapus data: " . mysqli_error($koneksi)); 
        echo "<script>alert('Gagal menghapus data');</script>";
    }

    
    mysqli_stmt_close($stmt);
}


mysqli_close($koneksi);
?>