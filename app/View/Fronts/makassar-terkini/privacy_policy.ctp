<!DOCTYPE html>
<html>
    <head>
        <title>Privacy Policy</title>
        <?php include('_css.php'); ?>
    </head>
    <style type="text/css">
        .adv-hidden{
            display: none;
        }

        .adv-bottom{
            margin-bottom: 0px !important;
            margin-top: 20px;
        }

        .content-disclaimer p{
            margin-bottom: 20px;
        }

        .content-adv {
            margin-top: 40px !important;
        }
    </style>
    <body class="body-offcanvas">
        <!-- Advertisement Top -->
        <!--==================================================-->
        <!-- Header -->
        <!--==================================================-->
        <?php
        $now = new DateTime();
        ?>
        <!--Content-->
        <!--==================================================-->
        <section class="s-main-content content-adv">

            <!-- Adv Middle Top -->
            <!--==================================================-->
            <?php
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 1, "idx" => 1]);
            ?>
            <div class="container-fluid">
                <div class="col-sm-12 font-sourceSansPro" style="text-align: justify;">
                    <div class="s-fancy-header-red">
                        <span class="s-title">Privacy &amp; Policy</span>
                    </div>
                    <p>
                        Seluruh layanan yang diberikan mengikuti aturan main yang berlaku dan ditetapkan oleh makassarterkini.com.
                        <br>
                        makassarterkini.com tidak bertanggung-jawab atas tidak tersampaikannya data/informasi yang disampaikan oleh pembaca melalui berbagai jenis saluran komunikasi (e-mail, sms, online form) karena faktor kesalahan teknis yang tidak diduga-duga sebelumnya
                    </p>
                    <p>
                        makassarterkini.com berhak untuk memuat , tidak memuat, mengedit, dan/atau menghapus data/informasi yang disampaikan oleh pembaca.
                    </p>
                    <p>
                        Data dan/atau informasi yang tersedia di makassarterkini.com hanya sebagai rujukan/referensi belaka, dan tidak diharapkan untuk tujuan perdagangan saham, transaksi keuangan/bisnis maupun transaksi lainnya. Walau berbagai upaya telah dilakukan untuk menampilkan data dan/atau informasi seakurat mungkin, makassarterkini.com dan semua mitra yang menyediakan data dan informasi, termasuk para pengelola halaman konsultasi, tidak bertanggung jawab atas segala kesalahan dan keterlambatan memperbarui data atau informasi, atau segala kerugian yang timbul karena tindakan yang berkaitan dengan penggunaan data/informasi yang disajikan makassarterkini.com.
                    </p>
                </div>
            </div>

            <!-- Adv Middle Top -->
            <!--==================================================-->
            <?php
            echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1]);
            ?>
        </section>
        <style type="text/css">
            #chartdiv {
                width       : 100%;
                height      : 500px;
                font-size   : 11px;
            }
        </style>
        <script type="text/javascript">
            var chart = AmCharts.makeChart("chartdiv", {
                "type": "pie",
                "theme": "light",
                "dataProvider": [{
                        "country": "Lithuania",
                        "litres": 501.9
                    }, {
                        "country": "Czech Republic",
                        "litres": 301.9
                    }, {
                        "country": "Ireland",
                        "litres": 201.1
                    }, {
                        "country": "Germany",
                        "litres": 165.8
                    }, {
                        "country": "Australia",
                        "litres": 139.9
                    }, {
                        "country": "Austria",
                        "litres": 128.3
                    }, {
                        "country": "UK",
                        "litres": 99
                    }, {
                        "country": "Belgium",
                        "litres": 60
                    }, {
                        "country": "The Netherlands",
                        "litres": 50
                    }],
                "valueField": "litres",
                "titleField": "country",
                "balloon": {
                    "fixedPosition": true
                },
                "export": {
                    "enabled": true
                }
            });
        </script>

    </body>
</html>
