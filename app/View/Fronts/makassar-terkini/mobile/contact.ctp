<!--Content-->
<!--==================================================-->
<section>
    <div class="container">
        <div class="row section-color">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-marginTop">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-menuTabKontak">
                            <div class="col-md-12 col-sm-12 col-xs-12 font-sourceSansProSemibold">
                                <ul class="nav nav-tabs edit-navtabs-profil">
                                    <li class="active tab-title">
                                        <a data-toggle="tab" href="#tab1">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-12 col-sm-12 col-xs-12 flex boxOut-menuTab-1">
                                                    Tentang 
                                                    kami
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="triangle-red"></div>
                                        </div>
                                    </li>
                                    <li class="tab-title">
                                        <a data-toggle="tab" href="#tab2">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-12 col-sm-12 col-xs-12 flex boxOut-menuTab-2">
                                                    Kontak
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="triangle-red"></div>
                                        </div>
                                    </li>
                                    <li class="tab-title">
                                        <a data-toggle="tab" href="#tab3">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-12 col-sm-12 col-xs-12 flex boxOut-menuTab-3">
                                                    Disclaimer
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="triangle-red"></div>
                                        </div>
                                    </li>
                                    <li class="tab-title">
                                        <a data-toggle="tab" href="#tab4">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-12 col-sm-12 col-xs-12 flex boxOut-menuTab-4">
                                                    Privacy
                                                    Policy
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="triangle-red"></div>
                                        </div>
                                    </li>
                                    <li class="tab-title">
                                        <a data-toggle="tab" href="#tab5">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-12 col-sm-12 col-xs-12 flex boxOut-menuTab-5">
                                                    Pedoman
                                                    Media Siber
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="triangle-red"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-containTab">
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?php
                                        $abouts = ClassRegistry::init("About")->find("all");
                                        $is_active = "";
                                        foreach($abouts as $contents) {
                                        ?>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-title">
                                                    <div class="box-title box-title-1 font-sourceSansProSemibold">
                                                        <?= $contents['About']['title'] ?>
                                                    </div>
                                                    <div class="box-titleTriangle"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiContent">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-isiContent font-sourceSansPro">
                                                        <?= $contents['About']['content'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane fade">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-title">
                                                <div class="box-title box-title-kontak font-sourceSansProSemibold">
                                                    Kontak Kami
                                                </div>
                                                <div class="box-titleTriangle"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="map-canvas" class="col-md-12 col-sm-12 col-xs-12 boxOut-mapKontak"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 box-mapText font-sourceSansPro">
                                                Sesuai komitmen kami dalam memberikan layanan prima dan professional untuk Anda, Makassar Terkini memastikan bahwa informasi apapun yang Anda butuhkan segera terlayani hanya dengan menghubungi kami.
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField-kontak font-sourceSansProSemibold">
                                                        Nama Anda*
                                                    </div>
                                                </div>
                                                <div class="row row-paddingBottom">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="" class="form-control field-kontak font-sansPro" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField-kontak font-sourceSansProSemibold">
                                                        Email Anda*
                                                    </div>
                                                </div>
                                                <div class="row row-paddingBottom">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="" class="form-control field-kontak font-sansPro" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField-kontak font-sourceSansProSemibold">
                                                        Judul pesan*
                                                    </div>
                                                </div>
                                                <div class="row row-paddingBottom">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="" class="form-control field-kontak font-sansPro" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleField-kontak font-sourceSansProSemibold">
                                                        Isi pesan*
                                                    </div>
                                                </div>
                                                <div class="row row-paddingBottom">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control editTextArea-kontak"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-kirim">
                                                <div class="col-md-8 col-sm-8 col-xs-8 boxOut-captcha">
                                                    <form>
                                                        <div class="g-recaptcha" data-theme="white" data-sitekey="6LcEMSETAAAAANxJ4IMQxQlUdpW9Zgt3MoIVFiQw" style="transform:scale(1.18);-webkit-transform:scale(1.18);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <button type="button" class="btn button-kirimKontak font-sourceSansProSemibold">KIRIM<img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/arrow-buttonWhite.png", true) ?>" /></button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $data = ClassRegistry::init("CompanyProfile")->find("first");
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-address">
                                                <div class="col-md-6 col-sm-6 col-xs-6 boxOut-addressLeft">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/address-lokasi.png", true) ?>" />
                                                            </div>
                                                            <div class="col-md-10 col-sm-10 col-xs-10 boxOut-addressText font-sourceSansPro">
                                                                <?php echo $data['CompanyProfile']['address']; ?>
                                                                </br>
                                                                <?php echo $data['CompanyProfile']['postal_code']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row boxOut-addressTelp">
                                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/address-telp.png", true) ?>" />
                                                            </div>
                                                            <div class="col-md-10 col-sm-10 col-xs-10 boxOut-addressText font-sourceSansPro">
                                                                Telp: <?php echo $data['CompanyProfile']['phone']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 boxOut-addressRight">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/address-email.png", true) ?>" />
                                                            </div>
                                                            <div class="col-md-10 col-sm-10 col-xs-10 boxOut-addressText font-sourceSansPro">
                                                                <?php echo $data['CompanyProfile']['email']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="row boxOut-addressEmail">
                                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/address-facebook.png", true) ?>" />
                                                            </div>
                                                            <div class="col-md-10 col-sm-10 col-xs-10 boxOut-addressText font-sourceSansPro">
                                                                Makassar Terkini
                                                            </div>
                                                        </div>
                                                        <div class="row boxOut-addressEmail">
                                                            <div class="col-md-2 col-sm-2 col-xs-2">
                                                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/address-twitter.png", true) ?>" />
                                                            </div>
                                                            <div class="col-md-10 col-sm-10 col-xs-10 boxOut-addressText font-sourceSansPro">
                                                                @makassarterkini
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab3" class="tab-pane fade">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-title">
                                                <div class="box-title box-title-disclaimer font-sourceSansProSemibold">
                                                    Disclaimer
                                                </div>
                                                <div class="box-titleTriangle"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiContent">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-isiContent-disclaimer font-sourceSansPro">
                                                    <?php
                                                    $disclaimer = ClassRegistry::init("Disclaimer")->find("first");
                                                    echo $disclaimer['Disclaimer']['content'];
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab4" class="tab-pane fade">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-title">
                                                <div class="box-title box-title-privacy font-sourceSansProSemibold">
                                                    Privacy Policy
                                                </div>
                                                <div class="box-titleTriangle"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiContent">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-isiContent-privacy font-sourceSansPro">
                                                    Seluruh layanan yang diberikan mengikuti aturan main yang berlaku dan ditetapkan oleh makassarterkini.com.
                                                    makassarterkini.com tidak bertanggung-jawab atas tidak tersampaikannya data/informasi yang disampaikan oleh pembaca melalui berbagai jenis saluran komunikasi (e-mail, sms, online form) karena faktor kesalahan teknis yang tidak diduga-duga sebelumnya
                                                    <br>
                                                    <br>
                                                    makassarterkini.com berhak untuk memuat , tidak memuat, mengedit, dan/atau menghapus data/informasi yang disampaikan oleh pembaca.
                                                    <br>
                                                    <br>
                                                    Data dan/atau informasi yang tersedia di makassarterkini.com hanya sebagai rujukan/referensi belaka, dan tidak diharapkan untuk tujuan perdagangan saham, transaksi keuangan/bisnis maupun transaksi lainnya. 
                                                    Walau berbagai upaya telah dilakukan untuk menampilkan data dan/atau informasi seakurat mungkin, makassarterkini.com dan semua mitra yang menyediakan data dan informasi, termasuk para pengelola halaman konsultasi, tidak bertanggung jawab atas segala kesalahan dan keterlambatan memperbarui data atau informasi, atau segala kerugian yang timbul karena tindakan yang berkaitan dengan penggunaan data/informasi yang disajikan makassarterkini.com.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab5" class="tab-pane fade">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-title">
                                                    <div class="box-title box-title-pedoman font-sourceSansProSemibold">
                                                        Pedoman Media Siber
                                                    </div>
                                                    <div class="box-titleTriangle"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-isiContent">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-isiContent-pedoman font-sourceSansPro">
                                                        <?php
                                                        $catalogs = ClassRegistry::init("Catalog")->find("first");
                                                        echo $catalogs['Catalog']['header'] . "<br><br>";
                                                        ?>
                                                        <?php
                                                        $i = 1;
                                                        foreach($catalogs['CatalogDetail'] as $details) {
                                                            echo $i . " " . $details['title'] . "<br><br>";
                                                            echo $details['content'] . "<br>";
                                                            $i++;
                                                        }
                                                        ?>
                                                        <?= $catalogs['Catalog']['footer'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-buttonDesktop">
                    <div class="box-buttonDesktop center-block">
                        <button type="button" class="btn button-desktop font-openSans-bold"><a href="<?= Router::url("/", true) ?>">DESKTOP VERSION</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {


        $.material.init()
        var lat = -6.89430374088573;
        var long = 107.61096328496933;
        setMap(lat, long, "", "");

//            google.charts.load('current', {'packages': ['corechart']});
//            google.charts.setOnLoadCallback(drawChart);
//            function drawChart() {
//
//                var data = google.visualization.arrayToDataTable([
//                    ['Task', 'Hours per Day'],
//                    ['Pria', 44],
//                    ['Wanita', 56]
//                ]);
//
//                var options = {
//                    //title: 'My Daily Activities'
//                    legend: {display: 'none'}
//                };
//
//                var chart = new google.visualization.PieChart(document.getElementById('piechart-1'));
//
//                chart.draw(data, options);
//            }

    });
</script>