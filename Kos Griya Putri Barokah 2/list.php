<?php
    include('assets/php/dbconnection.php');
    $sql = "SELECT no_kamar, nama FROM data_kamar";
    $result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Putri Griya Barokah 2</title>
    <link rel="favicon" href="assets/images/favicon.png">
    <link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/images/1.png">
</head>
<body>
<div id="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">      
                </div>
                    <div class="col-md-6">
                        <div class="social text-center pull-right">
                            <a><i class="fa fa-home"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.html">
                <img src="assets/images/Griya Barokah.png" alt="Logo Surakarta" style="height: 60px; width: 60px;"></a>
        </div>
        <div class="navbar-collapse collapse" >
            <ul class="nav navbar-nav pull-right mainNav">
                <li><a href="index.html">Beranda</a></li>
                <li><a href="fasilitas.html">Fasilitas</a></li>
                <li class="active" ><a href="list.php">List Anggota Kos</a></li>
                <li><a href="pesan.php">Pemesanan</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">menu lain <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="login_admin.php">Login Admin</a></li>
                        <li><a href="kritik_saran.php">Kritik Saran</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<header id="head" class="secondary secondary-3">
</header>
<div class="head-box" style="height: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center text-uppercase last" style=" margin-top: 15px;">List Anggota Kos Griya Barokah</h2>
            </div>
        </div>
    </div>
</div>

<section class="container">
    <div class="box-list">
        <table class="table table-hover table-bordered" id=table>
            <tr>
                <th>No Kamar</th>
                <th>Ketersediaan</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['no_kamar']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</section>
<section>
    <div>
        <div class="container" style="padding-bottom: 50px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Denah KOS Putri Griya Barokah 2 </h2>
                        <img src="assets/images/Denah Kos.png" alt="Denah KOS">
                    </div>
                    <div style="text-align: center;">
                        <a href="https://wa.me/6289649955776" class="btn btn-large btn-hover"><i class="ifc-right"></i> Contact Person </a>
                        <a href="pesan.php" class="btn btn-large btn-hover"><i class="ifc-right"></i> Pemesanan </a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer-1">
    <div class="konten-footer-1">
        <img src="assets/images/Griya Barokah.png" alt="tes" style="height: 110px; width:110px; position: relative; top: 30px;" />
        <p>
            <P style="font-size: 20px; text-align: left;">GRIYA BAROKAH</P>
            <p> Tanon Lor, RT 03/RW 02 Gedongan <br />
                Colomadu, Karanganyar.<br>
                Kode Pos 57173<br>
                0896-4995-5776</p>
        </p>
    </div>
    <div class="garis"></div>
    <div class="konten-footer-2">
        <div class="konten-footer-2-list-1" style="margin-left: 10%;">
            <h2 style="text-align: center; color: rgb(234, 250, 192);">Pengunjung</h2>
            <div class="elfsight-app-096e9283-eb7e-4425-958c-188bdf46be1f" data-elfsight-app-lazy style="width: 200px;"></div>
        </div>
        <div class="konten-footer-2-list-2 " style="margin-right: 70px; ">
            <h1 style="text-align: center; color: rgb(234, 250, 192);">MAP</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.21283154501654!2d110.7711621674591!3d-7.53069549999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1478197db6fd%3A0x9d3f146680f2e612!2sFQ9C%2BPG8%2C%20Jl.%20Lor%20In%2C%20Tanon%20Kidul%2C%20Gedongan%2C%20Kec.%20Colomadu%2C%20Kabupaten%20Karanganyar%2C%20Jawa%20Tengah%2057174!5e0!3m2!1sen!2sid!4v1716356132796!5m2!1sen!2sid" 
            width="295" height="289" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</footer>

<div class="copyright">
        <img src="assets/images/putih_logo.png" style="height: 15px;"> HUY CORPORATION
</div>

<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>