<?php
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
?>

<h3>DATA DOSEN</h3>
<hr/>
<a href="dosenAdd.php"><button class="buttonadm">TAMBAH DATA DOSEN</button></a>
<br><br>

<table border="1">
    <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Kode Matkul</th>
        <th>Aksi</th>
    </tr>
    <?php
    while ($dataDosen = mysqli_fetch_assoc($resultDosen)) {
        ?>
        <tr>
            <td><?php echo $dataDosen['nip']; ?></td>
            <td><?php echo $dataDosen['nama']; ?></td>
            <td><?php echo $dataDosen['kode_mtkul']; ?></td>
            <td>
                <a href="dosenEdit.php?nip=<?php echo $dataDosen['nip']; ?>">Edit</a> |
                <a href="dosenHapus.php?nip=<?php echo $dataDosen['nip']; ?>">Hapus</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
