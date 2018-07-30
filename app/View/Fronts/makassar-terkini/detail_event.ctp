<?php
$now = new DateTime();
?>
<style type="text/css">
    .item-edit img{
        margin-right: 5px !important;
        width: 148.2px !important;
        height: 92px !important;
    }

    .item-edit img:last-child{
        margin-right: 0px !important;
    }

    .adv-bottom{
        margin-top: 50px;
        margin-bottom: 0px !important;
    }
</style>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        var lat = <?= !empty($currentEvent['Event']['latitude']) ? $currentEvent['Event']['latitude'] : -5.146436 ?>;
        var long = <?= !empty($currentEvent['Event']['longitude']) ? $currentEvent['Event']['longitude'] : 119.425047 ?>;
        var marker = new google.maps.Marker({
        });
        var mapProp = {
            center: new google.maps.LatLng(lat, long),
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        marker.setPosition(new google.maps.LatLng(lat, long));
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!--Content-->
<!--==================================================-->
<section class="s-main-content">

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="pull-left" style="width: 762px; margin-bottom: 20px;">
                <div style="width: 100%; background: #f2f4f6; height: 34px; display: block; overflow: hidden; margin-bottom: 15px;">
                    <div class="pull-left">
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/detail-event-red-date.png", true) ?>" class="pull-left" >
                        <span style="margin-left: 10px; line-height: 34px;"><?= $currentEvent['Event']['title_ind'] ?></span>
                    </div>
                    <div class="pull-right">
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/red-pin.png", true) ?>" class="pull-left" style="margin-top: 9px;">
                        <span style="margin-left: 10px; line-height: 34px; margin-right: 15px;" class="google-findlocationame" data-lat="<?= $currentEvent['Event']['latitude'] ?>" data-long="<?= $currentEvent['Event']['longitude'] ?>"></span>
                    </div>
                </div>

                <div style="margin-bottom: 10px; overflow: hidden;">
                    <img class="the-choosen-one" src="<?= Router::url("{$thumbnail_event['EventImage'][0]['path']}") ?>" width="100%" height="479px">
                </div>
                <div id="foto-populer-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                    <a class="s-tick" href="#foto-populer-carousel" role="button" data-slide="prev" style="top: 29px; position: absolute; left: 0px; z-index: 1;">
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/big-car-left.png", true) ?>" width="33px">
                    </a>
                    <a class="s-tick" href="#foto-populer-carousel" role="button" data-slide="next" style="top: 29px; position: absolute; right: 0px; z-index: 1;">
                        <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/big-car-right.png", true) ?>" width="33px">
                    </a>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active " style="text-align: justify;">
                            <?php
                            foreach ($currentEvent['EventImage'] as $k => $event_image) {
                                if ($k < 5) {
                                    ?>
                                    <img class="image-chooser" src="<?= Router::url("{$event_image['path']}") ?>" style="width: 146px; height: 92px; margin-left: 5px; float: left; border-radius: 0px;">                           
                                    <?php
                                } else {
                                    if ($k % 5 == 0) {
                                        ?>
                                    </div>
                                    <div class="item " style="text-align: justify;">
                                        <img class="image-chooser" src="<?= Router::url("{$event_image['path']}") ?>" style="width: 146px; height: 92px; margin-left: 5px; float: left; border-radius: 0px;">  
                                        <?php
                                    } else {
                                        ?>
                                        <img class="image-chooser" src="<?= Router::url("{$event_image['path']}") ?>" style="width: 146px; height: 92px; margin-left: 5px; float: left; border-radius: 0px;">
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>                      
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).on('click', '.image-chooser', function () {
                        $('.the-choosen-one').attr('src', $(this).attr('src'));
                    })
                </script>
            </div>
            <div class="pull-right" style="width: 320px;">
                <div style="width: 100%; background: #2e3092; height: 34px; display: block; overflow: hidden; margin-bottom: 15px;">
                    <span style="margin-left: 10px; line-height: 34px; color: #fff;">Lokasi Kegiatan</span>
                </div>
                <div id="googleMap" style="width:320px; height:338px; margin-bottom: 15px;"></div>
                <div style="background: #f4f5f6; margin-bottom: 15px; border-top: 1px solid #1cc4be; padding: 13px;">
                    <strong>Bagikan Ke:</strong>
                    <div class="pull-right">
                        <?php
                        $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        ?>
                        <a href="#" onclick="shareFacebook(<?= $currentEvent['Event']['id'] ?>)">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-fb.png", true) ?>" class="pull-left" style="margin-left: 5px;">
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?= Router::url('', true) ?>&text=<?= $currentEvent['Event']['title_ind'] ?>">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-twitter.png", true) ?>" class="pull-left" style="margin-left: 5px;">
                        </a>
                        <a href="https://plus.google.com/share?url=<?= $current_link ?>&hl=en" onclick="shareGoogle(<?= $currentEvent['Event']['id'] ?>)">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/event-gplus.png", true) ?>" class="pull-left" style="margin-left: 5px;">
                        </a>
                    </div>
                </div>
                <!--                <div style="background: #f4f5f6; margin-bottom: 15px; border-top: 1px solid #1cc4be; overflow: hidden;">
                                    <strong class="pull-left" style=" padding: 13px;">Penilaian<br/>Pengunjung</strong>
                                    <div class="pull-right" style="margin-right: 13px;">
                                        <span style="color: #303986; font-weight: 700; font-size: 32px;">6.0</span><span style="color: #303986; font-weight: 700; font-size: 18px;">/10</span>
                                        <span class="clearfix"></span>
                                        <span style="color: #303986;">Lumayan</span>
                                    </div>
                                </div>-->
            </div>
            <span class="clearfix"></span>


            <div class="s-fancy-header-red">
                <span class="s-title">Deskripsi Kegiatan</span>
            </div>
            <span class="sub-title-event"><?= $currentEvent['Event']['title_ind'] ?></span>
            <span class="clearfix"></span>
            <?= $currentEvent['Event']['content_ind'] ?>
        </div>
    </div>


    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 3,"bottom"=>true]);
    ?>
</section>
<script>
    $(document).ready(function () {
        $(".google-findlocationame").each(function () {
            var $this = $(this);
            var lat = $this.data("lat");
            var long = $this.data("long");
            $.ajax({
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                dataType: "json",
                type: "GET",
                data: {sensor: false, latlng: lat + "," + long},
                success: function (response) {
                    var adrs = response.results[0].address_components[5].short_name + ", " + response.results[0].address_components[6].short_name + ", " + response.results[0].address_components[7].long_name;
                    $this.html(adrs);
                }
            })
        })
    })
</script>

<script>
    var title = '<?= $currentEvent['Event']['title_ind'] ?>';
    var event_id = <?= $currentEvent['Event']['id'] ?>;
    window.fbAsyncInit = function () {
        FB.init({
            appId: '139331869805917',
            xfbml: true,
            version: 'v2.5'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    function shareFacebook(id) {
        FB.ui(
                {
                    method: 'feed',
                    name: 'Event Makassar Terkini',
                    link: '<?= $current_link ?>',
                    picture: 'https://sribu-sg.s3.amazonaws.com/assets/media/contest_detail/2016/4/kontes-re-branding-logo-media-portal-berita-57147d72ca6bcbfc8c000007/large_6a2f2a85b4.jpg',
                    caption: title,
                    description: title,
                    message: ''
                }, function (response) {
            if (response && !response.error_message) {
                alert('Posting completed.');
                $.ajax({
                    url: BASE_URL + "/events/count_share_facebook/" + event_id,
                    dataType: "json",
                    type: "PUT",
                    data: {eventID: event_id},
                    success: function (json) {
//                        alert("Sukses!");
                    }
                });
            }
        }
        );
    }

    function shareGoogle(id) {
        $.ajax({
            url: BASE_URL + "/events/count_share_gplus/" + event_id,
            dataType: "json",
            type: "PUT",
            data: {eventID: event_id},
            success: function (json) {
//                        alert("Sukses!");
            }
        });
    }
</script>
<script>
//Twitter Widgets JS
    window.twttr = (function (d, s, id) {
        var t, js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
        return window.twttr || (t = {_e: [], ready: function (f) {
                t._e.push(f)
            }});
    }(document, "script", "twitter-wjs"));

//Once twttr is ready, bind a callback function to the tweet event
    twttr.ready(function (twttr) {
        twttr.events.bind('tweet', function (event) {
            console.log('tweet, tweet');
            $.ajax({
                url: BASE_URL + "/events/count_share_twitter/" + event_id,
                dataType: "json",
                type: "PUT",
                data: {eventID: event_id},
                success: function (json) {
//                    alert("Sukses!");
                }
            });
        });
    });
</script>