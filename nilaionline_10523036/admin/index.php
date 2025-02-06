<?php
// Start session to check if the user is logged in
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
</body>
</html>

<!DOCTYPE html>

<!-- Developed by Websquare Indonesia -->

<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

<title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="shortcut icon" type="image/x-icon" href="../images/logoicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="../css/style-sheet.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/style-sheet2.css" />-->
<link rel="stylesheet" type="text/css" href="../css/nivo-slider.css" />
</head>

<body onLoad="initialize()">
    <header>
        <section class="logo"><a href="#"><img src="../images/logo.png" /></a></section>
        <section class="title">Sistem Informasi Nilai Online <br /> <span>UNIVERSITAS KOMPUTER INDONESIA</span></section>
        <section class="clr"><center>Jl.Dipatiukur No.112-114, Kota Bandung, Jawa Barat 40132</center></section>
    </header>

    <section id="navigator">
        <ul class="menus">
            <li><a href="./?adm=home">Home</a></li>
            <li><a href="./?adm=mahasiswa">Mahasiswa</a></li>
            <li><a href="./?adm=dosen">Dosen</a></li> 
            <li><a href="./?adm=nilai">Nilai</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </section>

    <section id="container">
        <br><br><br>
        <?php
        if(empty($_GET)){
            include ("home.php");
        }else{
            $adm = isset($_GET["adm"]) ? $_GET["adm"] : '';
            if($adm == "home"){
                include ("home.php");
            }elseif($adm == "mahasiswa"){
                include ("mahasiswaView.php");
            }elseif($adm == "mahasiswaAdd"){
                include ("mahasiswaAdd.php");
            }elseif($adm == "nilai"){
                include ("nilaiView.php");
            }elseif($adm == "dosen"){
                include ("dosenView.php");
            }
        }
        ?>
        <br><br><br><br><br><br>
        <section class="clr"></section>
    </section>

    <footer>
        <font color=#000> Copyright &copy; 2025 - Universitas Komputer Indonesia <br />
        Developed By <a href="biodata.php" target="_new">Raffi Revanza</a> </font>
    </footer>

</body>
</html>
