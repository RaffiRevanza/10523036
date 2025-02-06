<?php
include ('../koneksi/koneksi.php');

$getNim = $_GET['nim'];
$editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
$resultMhs = mysqli_query($koneksi, $editMhs);
$dataMhs = mysqli_fetch_array($resultMhs);
?>

<h3>UBAH DATA MAHASISWA</h3>
<br /><br />
<?php
if (!isset($_POST['submit']))
{
?>
<form enctype="multipart/form-data" method="post">
    <table width="1008" border="0">
        <tr>
            <td width="278">NIM</td>
            <td width="4%">:</td>
            <td width="698">
                <input type="text" name="nim" size="30" value="<?php echo $dataMhs['nim'] ?>" readonly="readonly"/>
            </td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td>
                <input name="nama" type="text" id="nama" size="30" value="<?php echo $dataMhs['nama'] ?>" />
            </td>
        </tr>
        <tr>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td>
                <label>
                    <input type="radio" name="jk" value="Laki-Laki" <?php echo ($dataMhs['jk'] == 'Laki-Laki') ? 'checked' : ''; ?>> Laki-Laki
                </label>
                <label>
                    <input type="radio" name="jk" value="Perempuan" <?php echo ($dataMhs['jk'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
                </label>
            </td>
        </tr>
        <tr>
            <td height="50">JURUSAN</td>
            <td>:</td>
            <td>
                <select name="jur">
                    <option value="<?php echo $dataMhs['jur']; ?>" selected><?php echo $dataMhs['jur']; ?></option>
                    <option value="">--PILIH--</option>
                    <option value="Sistem Informasi">SISTEM INFORMASI</option>
                    <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
                    <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td>:</td>
            <td>
                <input type="password" name="password" size="30" value="<?php echo $dataMhs['password'] ?>" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="submit" value="UBAH" />
            </td>
        </tr>
    </table>
</form>
<?php
}
else
{
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];
    $password = md5($_POST['password']);

    
    $updateMhs = "UPDATE mahasiswa SET nama='$nama', jk='$jk', jur='$jur', password='$password' WHERE nim='$nim'";
    $queryMhs = mysqli_query($koneksi, $updateMhs);

    if ($queryMhs)
    {
        echo "<script>alert('Data Berhasil Diubah !');</script>";
        echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
    }
    else
    {
        echo "<script>alert('Data Gagal Diubah !');</script>";
        echo "<script type='text/javascript'>window.location='mahasiswaView.php';</script>";
    }
}
?>
<a href="./?adm=mahasiswa">KEMBALI</a>