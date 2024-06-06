<?php
    include('assets/php/dbconnection.php');
    $errorMessage = "";
    $stored_nama = "";
    $stored_nomor_hp = ""; 
    $stored_alamat = ""; 
    $stored_fasilitas = "";
    $stored_tanggal = "";
    $stored_sewa_bulan = "";
    $stored_no_kamar = "";
    $stored_total_harga = "";
    

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['address']) && isset($_POST['date']) && isset($_POST['rent_duration']) && isset($_POST['nokamar']) && isset($_POST['total_harga'])) {
        $nama = mysqli_real_escape_string($con, $_POST['name']);
        $nomor_hp = mysqli_real_escape_string($con, $_POST['phone_number']);
        $alamat = mysqli_real_escape_string($con, $_POST['address']);
        $fasilitas = isset($_POST['additional_facilities']) ? mysqli_real_escape_string($con, implode(", ", $_POST['additional_facilities'])) : '';
        $tanggal = mysqli_real_escape_string($con, $_POST['date']);
        $sewa_bulan = mysqli_real_escape_string($con, $_POST['rent_duration']);
        $no_kamar = mysqli_real_escape_string($con, $_POST['nokamar']);
        $total_harga = mysqli_real_escape_string($con, $_POST['total_harga']);


        if(empty($nama) || empty($nomor_hp) || empty($alamat) || empty($fasilitas) || empty($tanggal) || empty($sewa_bulan) || empty($no_kamar)){
            $errorMessage = "<h4 style='color: #FB8B24; text-align: center;'>Please fill out both fields.</h4>";
        } else {
            $sql = "INSERT INTO data_kos (nama, nomor_hp, alamat, fasilitas, tanggal, sewa_bulan, no_kamar, total_harga) VALUES ('$nama', '$nomor_hp', '$alamat', '$fasilitas', '$tanggal', '$sewa_bulan', '$no_kamar', '$total_harga')";
            if (mysqli_query($con, $sql)) {
                $stored_nama = $nama;
                $stored_nomor_hp = $nomor_hp; 
                $stored_alamat = $alamat; 
                $stored_fasilitas = $fasilitas;
                $stored_tanggal = $tanggal;
                $stored_sewa_bulan = $sewa_bulan;
                $stored_no_kamar = $no_kamar;
                $stored_total_harga = $total_harga;
            } else {
                $errorMessage = "ERROR: Sorry $sql. " . mysqli_error($con);
            }
        }
    } else {
        $errorMessage = "One or more required fields are missing.";
    }
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Interior-Design-Responsive-Website-Templates-Edge">
    <meta name="author" content="webThemez.com">
    <title>Kos Putri Griya Barokah 2</title>
    <link rel="favicon" href="assets/images/favicon.png">
    <link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css' href='assets/css/camera.css' type='text/css' media='all'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/images/1.png" >
</head>
<body>
    <header>
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
                            <li><a href="about.html">Fasilitas</a></li>
                            <li><a href="list.html">List Anggota Kos</a></li>
                            <li class="active" ><a href="pesan.php">Pemesanan</a></li>
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
            <header id="head" class="secondary secondary-2">
            </header>
            <div class="head-box">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="text-center text-uppercase last" style=" margin-top: 15px;">Pemesanan Kos Putri Griya Barokah 2</h2>
                        </div>
                    </div>
                </div>
            </div>
    </header>
    <section>
        <div class="section-heading">
            <h2>Form Pemesanan</h2>
        </div>
        <div class="container" style="max-width:1000px; padding: 40px 100px; border-radius: 40px;  background-color: #ffffff;">
            <form method="POST" class="form-horizontal" role="form" id="rentalForm">
                <div class="form-group">
                    <label for="name" class="col-sm-1">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Sesuai KTP" required>
                </div>
                <div class="form-group">
                    <label for="phone_number" class="col-sm-3">No Handphone</label>
                    <input type="number" name="phone_number" class="form-control" id="phone_number" placeholder="No. Handphone" required>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3">Alamat Domisili</label>
                    <textarea class="form-control" name="address" id="address" rows="3" placeholder="Alamat Domisili" required></textarea>
                </div>
                <div class="form-group">
                    <label for="facilities" class="col-sm-4">Fasilitas Tambahan</label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                        <label><input type="checkbox" name="additional_facilities[]" value="Magicom" id="25000"> Magicom</label><br>
                        <label><input type="checkbox" name="additional_facilities[]" value="Kipas" id="0"> Kipas</label><br>
                        <label><input type="checkbox" name="additional_facilities[]" value="Laptop" id="0"> Laptop</label><br>
                        <label><input type="checkbox" name="additional_facilities[]" value="Kulkas" id="50000"> Kulkas</label><br>
                        <label><input type="checkbox" name="additional_facilities[]" value="Lain Lain" id="0"> Lain Lain</label>
                                <input type="text" class="form-control" id="other_facilities" placeholder="Lain Lain">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-sm-3">Tanggal Masuk</label>
                    <input type="date" name="date" class="form-control" id="date" required>
                </div>
                <div class="form-group">
                    <label for="rent_duration" class="col-sm-4">Waktu Sewa</label>
                    <div class="col-sm-9">
                        <div class="radio">
                        <label><input type="radio" name="rent_duration" value="6" id="4200000" required> 6 Bulan</label>
                        <label><input type="radio" name="rent_duration" value="12" id="8000000" required> 12 Bulan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_kamar" class="col-sm-4">Pilih No Kamar</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <input type="radio" name="nokamar" id="1" value="1"> 1
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="2" value="2"> 2
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="3" value="3"> 3
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="4" value="4"> 4
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="5" value="5"> 5
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="6" value="6"> 6
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="7" value="7"> 7
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="8" value="8"> 8
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="9" value="9"> 9
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="10" value="10"> 10
                            </label>
                            <label>
                                <input type="radio" name="nokamar" id="11" value="11"> 11
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="total_harga" id="total_price">
                    <button type="submit button" id="whatsappButton" class="btn btn-success" onclick="whatsappMessage()">Save</button>
                    <button type="button" class="btn btn-primary" onclick="total()">Total Harga</button>
                    <h4 id="result">Total Harga:</h4>
                </div>
            </form>
        </div>    
        <div id="echoMessage">
            <div class="box-list">
            <?php  if(!empty($stored_nama) && !empty($stored_nomor_hp) && !empty($stored_alamat) && !empty($stored_fasilitas) && !empty($stored_tanggal) && !empty($stored_sewa_bulan) && !empty($stored_no_kamar)): ?>
                <h4 style="font-weight: bold; color: #4B6363; text-align: center;">Data stored in a database successfully.</h4>
            <?php endif; ?>
            </div>
        </div>
        <div id="echoMessage">
            <?php if(!empty($errorMessage)): ?>
                    <?php echo $errorMessage; ?>
            <?php endif; ?>
        </div>
    </section>
    <section>
        <div class="col-md-12">
            <div style="padding-bottom: 100px; padding-top: 50px;">
                <div class="col-md-12" style="text-align: center;">
                    <a href="https://wa.me/6289649955776" class="btn btn-large"><i class="ifc-right"></i> Contact Person </a>
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
        <img src="assets/images/Griya Barokah.png" style="height: 20px;"> UHUY CORPORATION
    </div>
    <script src="assets/js/modernizr-latest.js"></script>
    <script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script>
    <script type='text/javascript' src='assets/js/camera.min.js'></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <script type ='text/javascript' src='assets/js/javascript.js'></script>
    <script>
        function total() {
            let total = 0;
            let rentDurationValue = 0;

            document.querySelectorAll('input[type=radio][name=rent_duration]:checked').forEach(function(item) {
                rentDurationValue = parseInt(item.value); 
                total += parseInt(item.id);
            });
            document.querySelectorAll('input[type=checkbox]:checked').forEach(function(item) {
                total += parseInt(item.id) * rentDurationValue; // Multiply facility cost by the rent duration value
            });

            document.getElementById("result").innerText = "Total Harga: Rp " + total.toLocaleString();
            document.getElementById("total_price").value = total; // Set the hidden input value
        }

        // function hideEchoMessage() {
        //     setTimeout(function() {
        //         document.getElementById('echoMessage').style.display = 'none';
        //     }, 4000);
        // }
        // document.addEventListener('DOMContentLoaded', function() {
        //     hideEchoMessage();
        // });
        
        function whatsappMessage(){
            var name = document.getElementById('name').value;
            var phone_number = document.getElementById('phone_number').value;
            var address = document.getElementById('address').value;
            var additional_facilities_checked = Array.from(document.querySelectorAll('input[name="additional_facilities[]"]:checked')).map(el => el.value);
            var additional_facilities_prices = Array.from(document.querySelectorAll('input[name="additional_facilities[]"]:checked')).map(el => el.id);
            var additional_facilities_info = [];
            for (var i = 0; i < additional_facilities_checked.length; i++) {
                additional_facilities_info.push(additional_facilities_checked[i] + ' (Rp. ' + additional_facilities_prices[i] + ')');
            }
            var date = document.getElementById('date').value;
            var total_sewa = document.querySelector('input[name="rent_duration"]:checked') ? document.querySelector('input[name="rent_duration"]:checked').value : '';
            var rent_duration = document.querySelector('input[name="rent_duration"]:checked') ? document.querySelector('input[name="rent_duration"]:checked').id : '';
            var nokamar = document.querySelector('input[name="nokamar"]:checked') ? document.querySelector('input[name="nokamar"]:checked').id : '';
            total();
            var total_price= document.getElementById('result').textContent.replace('Total Harga:', '')

            var whatsappMessage = `*Pemesanan Kos Putri Griya Barokah 2*\n\n` +
                `*Nama:* ${name}\n` +
                `*No Handphone:* ${phone_number}\n` +
                `*Alamat Domisili:* ${address}\n` +
                `*Fasilitas Tambahan:* ${additional_facilities_info.join(', ')}\n` + 
                `*Tanggal Masuk:* ${date}\n` +
                `*Waktu Sewa:* ${total_sewa} Bulan = Rp. ${rent_duration} \n` +
                `*Pilih No Kamar:* ${nokamar}\n` +
                `*Total Harga Sewa: Rp. ${total_price}*`;

            var whatsappUrl = `https://wa.me/6282256430291?text=${encodeURIComponent(whatsappMessage)}`;
            window.open(whatsappUrl, '_blank');
        };
    </script>
    <script>
        setTimeout(function() {
            document.getElementById('echoMessage').style.display = 'none';
        }, 4000);
    </script>
</body> 
</html>