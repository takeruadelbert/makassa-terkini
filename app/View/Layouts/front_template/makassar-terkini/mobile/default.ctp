<!DOCTYPE html>
<html>
    <head>
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
        <link rel="shorcut icon" type="image/x-icon" href="<?= Router::url("/icons/favicon.ico") ?>"/>
        <title>
            <?php
            switch ($page) {
                case "home" :
                    echo "Makassar Terkini";
                    break;
                case "detail_news" :
                    echo "Makassar Terkini - {$currentNews['News']['title_ind']}";
                    break;
                case "detail_photo_news" :
                    echo "Makassar Terkini - {$currentNews['News']['title_ind']}";
                    break;
                case "detail_video_news" :
                    echo "Makassar Terkini - {$currentNews['News']['title_ind']}";
                    break;
                case "login" :
                    echo "Makassar Terkini - Login";
                    break;
                case "register" :
                    echo "Makassar Terkini - Register";
                    break;
                case "forgot_password" :
                    echo "Makassar Terkini - Lupa Password";
                    break;
                case "reset_password" :
                    echo "Makassar Terkini - Reset Passoword";
                    break;
                case "profile" :
                    echo "Makassar Terkini - Profil Member";
                    break;
                case "event" :
                    echo "Makassar Terkini - Event";
                    break;
                case "detail_event" :
                    echo "Makassar Terkini - {$currentEvent['Event']['title_ind']}";
                    break;
                case "contact" :
                    echo "Makassar Terkini - Kontak";
                    break;
                case "category" :
                    echo "Makassar Terkini - Kategori " . ucfirst($categoryType);
                    break;
                case "search" :
                    echo "Makassar Terkini - Pencarian Berita";
                    break;
                case "citizen_report" :
                    echo "Makassar Terkini - Citizen Report";
                    break;
                case "detail_citizen_report" :
                    echo "Makassar Terkini - {$currentCitizenReport['News']['title_ind']}";
                    break;
                case "gallery_photo" :
                    echo "Makassar Terkini - Galeri Foto";
                    break;
                case "gallery_video" :
                    echo "Makassar Terkini - Galeri Video";
                    break;
            }
            ?>
        </title>
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/bootstrap.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/bootstrap.offcanvas.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/ripples.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/style.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/css/jquery.datetimepicker.css", true) ?>">
        <?php
        switch ($page) {
            case "home" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/index.css", true) ?>">
                <?php
                break;
            case "detail_news" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/berita.css", true) ?>">
                <?php
                break;
            case "detail_photo_news" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/galleryPhoto2.css", true) ?>">
                <?php
                break;
            case "detail_video_news" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/galleryVideo2.css", true) ?>">
                <?php
                break;
            case "citizen_report" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/citizenReport.css", true) ?>">
                <?php
                break;
            case "detail_citizen_report" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/citizenReport2.css", true) ?>">
                <?php
                break;
            case "login" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/font-awesome.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/build.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/login.css", true) ?>">
                <?php
                break;
            case "forgot_password" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/font-awesome.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/build.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/login.css", true) ?>">
                <?php
                break;
            case "register" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/font-awesome.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/build.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/register.css", true) ?>">
                <?php
                break;
            case "profile" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/jquery-ui.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/font-awesome.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/build.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/jquery-ui-timepicker-addon.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/profil.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/index.css", true) ?>">
                <?php
                break;
            case "reset_password" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/font-awesome.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/download/build.css", true) ?>">
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/login.css", true) ?>">
                <?php
                break;
            case "contact" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/kontak.css", true) ?>">
                <?php
                break;
            case "category" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/category.css", true) ?>">
                <?php
                break;
            case "event" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/eventTahunIni.css", true) ?>">
                <?php
                break;
            case "detail_event" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/deskripsiEvent.css", true) ?>">
                <?php
                break;
            case "search" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/pencarian.css", true) ?>">
                <?php
                break;
            case "gallery_photo" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/galleryPhoto.css", true) ?>">
                <?php
                break;
            case "gallery_video" :
                ?>
                <link rel="stylesheet" href="<?= Router::url("/front_file/makassar-terkini/mobile/css/custom/galleryVideo.css", true) ?>">
                <?php
                break;
        }
        ?>

        <?php
        if($page == "contact") {
        ?>
        <script src='https://www.google.com/recaptcha/api.js?hl=id'></script>
        <?php
        }
        ?>
        <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/jquery-2.1.4.js", true) ?>"></script>
        <script>
            var BASE_URL = "<?= rtrim(Router::url("/", true), "/") ?>";
            var FACEBOOK_API_KEY = "<?= _FACEBOOK_API_KEY ?>";                        
        </script>
    </head>
    <body class="body-background">
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "header");
        ?>
        <?php
        echo $this->fetch("content");
        ?>     
        <?php
        if ($page == "login" || $page == "register" || $page == "profile" || $page == "forgot_password" || $page == "reset_password" || $page == "contact" || $page == "event" || $page == "detail_event") {
            echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "footerLittle");
        } else {
            echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "footerBig");
        }
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "entity/news-preview");
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "entity/home-news-preview");
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "entity/gallery-news-preview");
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "entity/gallery-video-news-preview");
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "entity/comments-preview");
        echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "entity/citizen-report-news-preview");
        ?>
    </body>
    <script src="<?= Router::url("/js/plugin/handlebars.min-latest.js", true) ?>"></script>
    <script src="<?= Router::url("/template/londiniumv/js/handlebars-v4.0.5.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/js/handlebar-custom-helper.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/bootstrap.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/bootstrap.offcanvas.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/material.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/ripples.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/download/jquery.mobile.custom.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/custom/custom.js", true) ?>"></script>
    <script src="<?= Router::url("/js/plugin/moment-with-locales.min.js", true) ?>"></script>
    <script src="<?= Router::url("/js/plugin/jquery.datetimepicker.full.js", true) ?>"></script>
    <script src="<?= Router::url("/front_file/makassar-terkini/js/custom-engine.js", true) ?>"></script>
    <?php
    if ($page == "profile") {
        ?>
        <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/jquery-ui.js", true) ?>"></script>
        <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/custom/orderDatePicker.js", true) ?>"></script>
        <script src="<?= Router::url("/front_file/makassar-terkini/js/ckeditor/ckeditor.js", true) ?>"></script>
        <?php
    } else if($page == "contact" || $page == "detail_event") {
    ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNI9DqfA0Hdaycx7k7yzbXwnqju1rYut0&type=geocode&libraries=places"></script>
        <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/download/gmaps.js", true) ?>"></script>
    <?php
    } else if($page == "category" || $page == "search" || $page == "home" || $page == "gallery_photo" || $page == "gallery_video") {
    ?>
        <script>
            var BASE_URL = "<?= rtrim(Router::url("/", true), "/") ?>";
        </script>
        <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/download/jquery.waypoints.js", true) ?>"></script>
        <script src="<?= Router::url("/js/plugin/handlebars.min-latest.js", true) ?>"></script>
        <script src="<?= Router::url("/front_file/makassar-terkini/js/handlebar-custom-helper.js", true) ?>"></script>
    <?php
    } else if($page == "home" || $page == "gallery_photo" || $page == "gallery_video" || $page == "citizen_report") {
    ?>
        <script src="<?= Router::url("/front_file/makassar-terkini/mobile/js/download/jquery.waypoints.js", true) ?>"></script>
    <?php
    }
    ?>
    <script>
        $(document).ready(function () {

            $.material.init()

            /*---------- footer arrow ----------*/
            $('.footer-circle').on("click", function () {
                $('html, body').animate({scrollTop: 0}, 'slow');
            });

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