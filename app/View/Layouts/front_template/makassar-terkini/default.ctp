<!doctype html>
<html>
    <head>
        <link rel="shorcut icon" type="image/x-icon" href="<?= Router::url("/icons/favicon.ico") ?>"/>        
        <title>
            <?php
            switch ($page) {
                case "homex" :
                    echo "Makassar Terkini";
                    break;
                case "indeks" :
                    echo "Makassar Terkini - Indeks";
                    break;
                case "citizen_report" :
                    echo "Makassar Terkini - Citizen Report";
                    break;
                case "detail_citizen_report":
                    echo "Makassar Terkini - {$currentCitizenReport['News']['title_ind']}";
                    break;
                case "detail_citizen_report_photo_news" :
                    echo "Makassar Terkini - {$currentCitizenReport['News']['title_ind']}";
                    break;
                case "login_register" :
                    echo "Makassar Terkini - Login & Register";
                    break;
                case "profile_member" :
                    echo "Makassar Terkini - Profile";
                    break;
                case "event" :
                    echo "Makassar Terkini - Event";
                    break;
                case "detail_event" :
                    echo "Makassar Terkini - {$currentEvent['Event']['title_ind']}";
                    break;
                case "kontak" :
                    echo "Makassar Terkini - Kontak";
                    break;
                case "disclaimer" :
                    echo "Makassar Terkini - Disklaimer";
                    break;
                case "detail_news" :
                    echo "Makassar Terkini - {$currentNews['News']['title_ind']}";
                    break;
                case "detail_photo_news" :
                    echo "Makassar Terkini - {$currentNews['News']['title_ind']}";
                    break;
                case "newsletter" :
                    echo "Makassar Terkini - Newsletter";
                    break;
                case "recent_news" :
                    echo "Makassar Terkini - Berita Terkini";
                    break;
                case "popular_news" :
                    echo "Makassar Terkini - Berita Populer";
                    break;
                case "recommended_news" :
                    echo "Makassar Terkini - Berita Rekomendasi";
                    break;
                case "popular_video" :
                    echo "Makassar Terkini - Video Populer";
                    break;
                case "popular_photo" :
                    echo "Makassar Terkini - Foto Populer";
                    break;
                case "recent_event" :
                    echo "Makassar Terkini - Event Terkini";
                    break;
                case "all_citizen_report" :
                    echo "Makassar Terkini - Citizen Report";
                    break;
                case "all_news_category" :
                    echo "Makassar Terkini - Kategori Berita";
                    break;
                case "semua_kategori" :
                    echo "Makassar Terkini - Lihat Semua Berita";
                    break;
                case "kategori" :
                    echo "Makassar Terkini - Kategori " . ucfirst($categoryType);
                    break;
                case "stop_subscribe_newsletter" :
                    echo "Makassar Terkini - Berhenti Berlangganan Newsletter";
                    break;
                case "gallery_photo" :
                    echo "Makassar Terkini - Galeri Foto";
                    break;
                case "gallery_video" :
                    echo "Makassar Terkini - Galeri Video";
                    break;
                case "semua_galeri_foto" :
                    echo "Makassar Terkini - Lihat Semua Galeri Foto";
                    break;
                case "semua_galeri_video" :
                    echo "Makassar Terkini - Lihat Semua Galeri Video";
                    break;
                case "tentang_kami" :
                    echo "Makassar Terkini - Tentang Kami";
                    break;
                case "privacy_policy";
                    echo "Makassar Terkini - Privacy Policy";
                    break;
                case "pedoman" :
                    echo "Makassar Terkini - Pedoman Media Siber";
                    break;
                case "event_search" :
                    echo "Makassar Terkini - Pencarian Event";
                    break;
                case "search" :
                    echo "Makassar Terkini - Pencarian Berita";
                    break;
                case "lupa_password" :
                    echo "Makassar Terkini - Lupa Password";
                    break;
            }
            ?>
        </title>
        
        <?php
            switch ($page) {
                case "detail_news";
        ?>
                    <meta charset="UTF-8">
                    <meta property="og:image" content="<?= Router::url($currentNews['News']['thumbnail_path'], true) ?>"/>
                    <meta property="og:title" content="<?= $currentNews['News']['title_ind'] ?>"/>
                    <meta property="og:description" content="<?= $currentNews['News']['sinopsys_ind'] ?>">
                    <meta property="og:site_name" content="Makassar Terkini"/>
                    <meta property="og:type" content="<?= $currentNews['NewsCategory']['name'] ?>"/>
                    <meta name="description" content="<?= $currentNews['News']['sinopsys_ind'] ?>">
                    <meta name="keywords" content="<?= $currentNews['News']['meta_key'] ?>">
                    <meta name="author" content="<?= $currentNews['Author']['Biodata']['full_name'] ?>">
        <?php
                    break;
                case "detail_photo_news" :
        ?>
                    <meta charset="UTF-8">
                    <meta name="description" content="<?= $currentNews['News']['title_ind'] ?>">
                    <meta name="keywords" content="<?= $currentNews['News']['meta_key'] ?>">
                    <meta name="author" content="<?= $currentNews['Author']['Biodata']['full_name'] ?>">
        <?php
                    break;
            }
        ?>
        
        <meta name="viewport" content="width=1460px, user-scalable=yes">    
                    
        <!-- STYLES -->
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/bootstrap.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/bootstrap.offcanvas.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/style.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/home.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/header.css", true) ?>">

        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/news-module-hor.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/news-module-ver.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/news-module-pop.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/event-module-terkini.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/node-privacy-pol.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/node-login-register.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/node-tentang-kami.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/node-kontak.css", true) ?>">

        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/advertisement.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/custom/main-content.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/css/download/flexslider.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/js/magnific_popup/dist/magnific-popup.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/css/jquery.datetimepicker.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/css/font-awesome.min.css", true) ?>">
        
        <!-- SCRIPTS -->
        <script>
            var BASE_URL = "<?= rtrim(Router::url("/", true), "/") ?>";
            var FACEBOOK_API_KEY = "<?= _FACEBOOK_API_KEY ?>";                        
        </script>
        <script src="<?= Router::url("/front_file/makassar-terkini/js/jquery-2.1.4.js", true) ?>"></script>
        <script src="<?= Router::url("/js/plugin/handlebars.min-latest.js", true) ?>"></script>
        <script src="<?= Router::url("/template/londiniumv/js/handlebars-v4.0.5.js", true) ?>"></script>
        <script src="<?= Router::url("/front_file/makassar-terkini/js/handlebar-custom-helper.js", true) ?>"></script>
        <!--<script src="<?Router::url("/front_file/makassar-terkini/js/magnific_popup/dist/jquery.magnific-popup.min.js", true) ?>"></script>-->        
        <script src="<?= Router::url("/js/plugin/moment-with-locales.min.js", true) ?>"></script>
        <script src="<?= Router::url("/js/plugin/jquery.datetimepicker.full.js", true) ?>"></script>
        <script src="<?= Router::url("/front_file/makassar-terkini/js/custom-engine.js", true) ?>"></script>
        <script src="<?= Router::url("/front_file/makassar-terkini/js/download/jquery.flexslider.js", true)?>"></script>
    </head>
    <body>
        <?php
        if($page != "newsletter") {
            echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "header");
        }
        ?>
        <?php
        echo $this->fetch("content");
        ?>     
        <?php
        if($page != "newsletter") {
            echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "footer");
        } else {
            echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "newsletter_footer");
        }
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "entity/news-preview");
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "entity/comments-preview");
        ?>
    </body>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="<?= Router::url("/front_file/makassar-terkini/js/ckeditor/ckeditor.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/js/amcharts/amcharts.js", true) ?>" type="text/javascript"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/js/amcharts/serial.js", true) ?>" type="text/javascript"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/js/amcharts/pie.js", true) ?>" type="text/javascript"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/js/amcharts/themes/light.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/js/magnific_popup/dist/jquery.magnific-popup.min.js", true)?>"></script>    
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        $(document).ready(function() {
            $(".advCountable").click(function() {
                var $this=$(this);
                var id=$this.data("id");
                var isCount=$this.data("counted");
                if (!isCount){
                    $.ajax({
                        url : BASE_URL + "/adverts/count_clicked_adv/" + id,
                        dataTyppe : "json",
                        type : "PUT",
                        data : {adver_id : id},
                        success : function(json) {
                            $this.data("counted",true);
//                            alert("Sukses!");
                        }
                    });
                }
            });
        });
    </script>
    <script type="text/javascript">
        var chart = AmCharts.makeChart("chartdiv1", {
            "type": "pie",
            "theme": "light",
            "dataProvider": [{
                    "keterangan": "Pria",
                    "percent": 56
                }, {
                    "keterangan": "Wanita",
                    "percent": 44
                }],
            "valueField": "percent",
            "titleField": "keterangan",
            "balloon": {
                "fixedPosition": true
            },
            "export": {
                "enabled": true
            }
        });

        var chart = AmCharts.makeChart("chartdiv2", {
            "type": "pie",
            "theme": "light",
            "dataProvider": [{
                    "keterangan": "< 40 Tahun",
                    "percent": 17
                }, {
                    "keterangan": "33 - 34 Tahun",
                    "percent": 33
                }, {
                    "keterangan": "25 - 29 Tahun",
                    "percent": 35
                }, {
                    "keterangan": "< 25 Tahun",
                    "percent": 15
                }],
            "valueField": "percent",
            "titleField": "keterangan",
            "balloon": {
                "fixedPosition": true
            },
            "export": {
                "enabled": true
            }
        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-66360444-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- Start Alexa Certify Javascript -->
    <script type="text/javascript">
    _atrk_opts = { atrk_acct:"or53n1a4KM10L7", domain:"makassarterkini.com",dynamic: true};
    (function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
    </script>
    <noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=or53n1a4KM10L7" style="display:none" height="1" width="1" alt="" /></noscript>
    <!-- End Alexa Certify Javascript -->  
</html>