<?php
include "../koneksi/koneksi.php";

$queryNilai = "SELECT 
    m.nim, 
    m.nama, 
    n.nl_tugas, 
    n.nl_uts, 
    n.nl_uas,
    (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4 * n.nl_uas) AS nilai_akhir,
    d.nip, 
    d.nama AS nama_dosen
FROM nilai n
LEFT JOIN mahasiswa m ON n.nim = m.nim
LEFT JOIN dosen d ON n.nip = d.nip";

$resultNilai = mysqli_query($koneksi, $queryNilai);
$countNilai = mysqli_num_rows($resultNilai);
?>

<h3>DATA NILAI</h3>
<hr/><br />
<a href="nilaiAdd.php"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA NILAI"/></a>
<br><br>

<table border="1">
   
    <tr>
        <th>NIM</th>
        <th>NAMA</th>
        <th>TUGAS</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>NILAI AKHIR</th>
        <th>DOSEN</th>
        <th>AKSI</th>
    </tr>
    <?php
    if ($countNilai > 0) {
        while ($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_NUM)) {
            ?>
            <tr class="add">
                <td class="value"><?php echo $dataNilai[0]; ?></td>
                <td class="value"><?php echo $dataNilai[1]; ?></td>
                <td class="value"><?php echo $dataNilai[2]; ?></td>
                <td class="value"><?php echo $dataNilai[3]; ?></td>
                <td class="value"><?php echo $dataNilai[4]; ?></td>
                <td class="value"><?php echo $dataNilai[5]; ?></td>
                <td class="value"><?php echo $dataNilai[7]; ?></td>
                <td class="value">
                    <a href="nilaiEdit.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>">Edit</a> |
                    <a href="nilaiHapus.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>">Hapus</a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "
        <tr>
            <td colspan='8' align='center' height='20'>
                <div>Belum ada Data Mahasiswa</div>
            </td>
        </tr>";
    }
    ?>
</table>