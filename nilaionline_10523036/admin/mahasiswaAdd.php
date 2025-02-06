<?php
include('../koneksi/koneksi.php');
?>

<!-- Assuming you're within a layout that has a header and footer -->
<div class="content-wrapper">
    <h3>TAMBAH DATA MAHASISWA</h3>
    <hr/><br/><br/>

    <?php
    if (!isset($_POST['submit'])) {
    ?>
        <div class="form-container">
            <form enctype="multipart/form-data" method="post">
                <table width="100%" border="0">
                    <tr>
                        <td width="27%">NIM</td>
                        <td width="3%">:</td>
                        <td width="70%"><input type="text" name="nim" size="30" placeholder="NIM" required /></td>
                    </tr>
                    <tr>
                        <td>NAMA</td>
                        <td>:</td>
                        <td><input type="text" name="nama" size="30" placeholder="NAMA" required /></td>
                    </tr>
                    <tr>
                        <td>JENIS KELAMIN</td>
                        <td>:</td>
                        <td>
                            <label>
                                <input type="radio" name="jk" value="Laki-Laki" required /> Laki-Laki
                            </label>
                            <label>
                                <input type="radio" name="jk" value="Perempuan" /> Perempuan
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>JURUSAN</td>
                        <td>:</td>
                        <td>
                            <select name="jurusan" required>
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
                        <td><input type="password" name="password" size="30" placeholder="PASSWORD" required /></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="submit" name="submit" value="TAMBAH" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php
    } else {
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $jk = $_POST["jk"];
        $jurusan = $_POST["jurusan"];
        $password = md5($_POST["password"]);

        
        $insertMhs = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jk', '$jurusan', '$password')";
        $queryMhs = mysqli_query($koneksi, $insertMhs);

        if ($queryMhs) {
            echo "<script>alert('Data Berhasil Disimpan!');</script>";
            echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan!');</script>";
            echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
        }
    }
    ?>

    <a href="./?adm=mahasiswa">&raquo; KEMBALI</a>
</div>