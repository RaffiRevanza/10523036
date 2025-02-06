<?php
include "../koneksi/koneksi.php";

$queryMhs = "SELECT * FROM mahasiswa";
$resultMhs = mysqli_query($koneksi, $queryMhs);
$countMhs = mysqli_num_rows($resultMhs);
?>

<h3>DATA MAHASISWA</h3>
<br/><br/>
<a href="mahasiswaAdd.php"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA MAHASISWA"/></a>

<table border="1">
    
    <tr>
        <th>NIM</th>
        <th>NAMA</th>
        <th>JENIS KELAMIN</th>
        <th>JURUSAN</th>
        <th>PASSWORD</th>
        <th>AKSI</th>
    </tr>

<?php
if ($countMhs > 0) {
    while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
        echo "<tr class='add'>";
        echo "<td class='value'>" . $dataMhs[0] . "</td>";
        echo "<td class='value'>" . $dataMhs[1] . "</td>";
        echo "<td class='value'>" . $dataMhs[2] . "</td>";
        echo "<td class='value'>" . $dataMhs[3] . "</td>";
        echo "<td class='value'>" . $dataMhs[4] . "</td>";
        echo "<td class='value'>
                <a href='mahasiswaEdit.php?nim=" . $dataMhs[0] . "'>Edit</a> | 
                <a href='mahasiswaDelete.php?nim=" . $dataMhs[0] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='6' align='center' height='20'>";
    echo "<div>Belum ada Data Mahasiswa</div>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?>
