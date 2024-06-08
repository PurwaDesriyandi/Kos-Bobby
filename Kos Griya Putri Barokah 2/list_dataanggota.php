<?php
    include('assets/php/dbconnection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['no_kamar']) && isset($_POST['nama'])) {
        $no_kamar = intval($_POST['no_kamar']);
        $nama = $con->real_escape_string($_POST['nama']);
        $sql = "UPDATE data_kamar SET nama='$nama' WHERE no_kamar=$no_kamar";
        $con->query($sql);
    }

    $sql = "SELECT no_kamar, nama FROM data_kamar";
    $result = $con->query($sql);

    $edit_no_kamar = isset($_GET['no_kamar']) ? intval($_GET['no_kamar']) : null;
    $edit_nama = "";

    if ($edit_no_kamar !== null) {
        $sql = "SELECT nama FROM data_kamar WHERE no_kamar = $edit_no_kamar";
        $edit_result = $con->query($sql);
        if ($edit_row = $edit_result->fetch_assoc()) {
            $edit_nama = $edit_row['nama'];
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Putri Griya Barokah 2</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/images/1.png">
</head>
<body>
    <div id="header-top">       
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="social text-center pull-right">
                        <a><i class="fa fa-home"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">
                    <img src="assets/images/Griya Barokah.png" alt="Logo Surakarta" style="height: 60px; width: 60px;">
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right mainNav">
                    <li><a href="index.html" id="logout-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header id="head" class="secondary secondary-1">
        <h1 style="width: 100%; font-size: 25px; text-align: center; align-items: center; " id="logout-announcement"></h1>
    </header>
    <div class="head-box" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center text-uppercase last" style=" margin-top: 15px;">KOS PUTRI GRIYA BAROKAH 2</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="box-list">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>No Kamar</th>
                    <th>Nama</th>
                    <th>Edit Nama</th>
                </tr>
                <?php
                    echo "<link rel='stylesheet' href='assets/css/style.css'>";
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["no_kamar"] . "</td>
                                    <td>" . $row["nama"] . "</td>
                                    <td>
                                        <button class='btn-list' id=' btn btn-primary'><a style='cursor: pointer; color:#424530; text-decoration: none;' href='list_dataanggota.php?no_kamar=" . $row["no_kamar"] . "'>EDIT</a></button>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No data found</td></tr>";
                    }
                ?>
            </table>
        </div>

        <?php if ($edit_no_kamar !== null): ?>
        <div class="edit-form">
            <h2>Edit Nama for No Kamar <?php echo $edit_no_kamar; ?></h2>
            <form action="list_dataanggota.php" method="post">
                <input type="hidden" name="no_kamar" value="<?php echo $edit_no_kamar; ?>">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $edit_nama; ?>">
                <input style="background-color: #87DB4F; color: black; border-color: #424530;" type="submit" value="Update">
            </form>
        </div>
        <?php endif; ?>
    </section>
    <section>
        <div class="col-md-12">
            <div style="padding-bottom: 100px; padding-top: 50px;">
                <div class="col-md-12" style="text-align: center;">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <script>
        function displayLogoutAnnouncement() {
            var logoutHeader = document.getElementById("logout-announcement");
            logoutHeader.innerHTML = "Kamu Akan Logout Dalam <span id='countdown'>3</span> Detik...";
            var count = 3;
            var countdown = setInterval(function() {
                count--;
                document.getElementById("countdown").innerText = count;
                if (count === 0) {
                    clearInterval(countdown);
                    window.location.href = "index.html"; 
                }
            }, 1000);
        }

        $(document).ready(function() {
            $("#logout-link").click(function(event) {
                event.preventDefault();
                displayLogoutAnnouncement();
            });
        });
    </script>
</body>
</html>