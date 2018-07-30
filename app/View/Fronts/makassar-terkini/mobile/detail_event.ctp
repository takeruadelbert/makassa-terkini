<!--Content-->
<!--==================================================-->
<section>
    <div class="container">
        <div class="row section-color">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-marginTop">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleEvent font-sourceSansProSemibold">
                            <span class="eventTitle"><?= $currentEvent['Event']['title_ind'] ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keterangan">
                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-lokasi.png", true) ?>" />
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                    <span class="google-findlocationame" data-lat="<?= !empty($currentEvent['Event']['latitude']) ? $currentEvent['Event']['latitude'] : -5.146436 ?>" data-long="<?= !empty($currentEvent['Event']['longitude']) ? $currentEvent['Event']['longitude'] : 119.425047 ?>"></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-tanggal.png", true) ?>" />
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                    <?= $this->Html->cvtTanggal($currentEvent['Event']['date']) ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 inherit flex">
                                <div class="col-md-2 col-sm-2 col-xs-2 font-zero">
                                    <img class="img-eventKeterangan" src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/event-jam.png", true) ?>" />
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10 box-textKeterangan font-sourceSansProSemibold">
                                    <?= $this->Html->cvtJam($currentEvent['Event']['time']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-eventFoto">
                            <img src="<?= Router::url("{$thumbnail_event['EventImage'][0]['path']}") ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-backgroundEvent">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoTitle font-sourceSansProSemibold">
                                    Sekilas
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoText font-sourceSansPro">
                                    <?= $currentEvent['Event']['content_ind'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoTitle font-sourceSansProSemibold">
                                    Lokasi Kegiatan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="map-canvas" class="col-md-12 col-sm-12 col-xs-12 boxOut-mapEvent"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-bagikan">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-infoTitle font-sourceSansProSemibold">
                                    Bagikan ini
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-3 col-sm-3 col-xs-3 flex">
                                        <div class="col-md-11 col-sm-11 col-xs-11 boxOut-shareCount font-openSans-bold flex">
                                            <?php
                                            $num_fb_share = $currentEvent['Event']['fb_share_counts'];
                                            $num_twitter_share = $currentEvent['Event']['twitter_share_counts'];
                                            $num_gplus_share = $currentEvent['Event']['gplus_share_counts'];
                                            $total_share = $num_fb_share + $num_twitter_share + $num_gplus_share;
                                            $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                            ?>
                                            <font class="shareCount"><?= $total_share ?></font>
                                            <font class="shareText">share</font>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                            <div class="boxOut-triangleShare"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 boxOut-socialShare">
                                        <div class="persen20">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <button type="button" class="btn boxOut-shareFacebook" onclick="shareFacebook(<?= $currentEvent['Event']['id'] ?>)">
                                                    <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-1.png", true) ?>" />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="persen20">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <a href="https://twitter.com/intent/tweet?url=<?= Router::url('', true) ?>&text=<?= $currentEvent['Event']['title_ind']?>">
                                                    <button type="button" class="btn boxOut-shareTwitter">
                                                        <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-2.png", true) ?>" />
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="persen20">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <a href="https://plus.google.com/share?url=<?= $current_link ?>&hl=en" onclick="shareGoogle(<?= $currentEvent['Event']['id'] ?>)">
                                                    <button type="button" class="btn boxOut-shareGoogle">
                                                        <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/social-3.png", true) ?>" />
                                                    </button>
                                                </a>
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

        $(".google-findlocationame").each(function () {
            var $this = $(this);
            var lat = $this.data("lat");
            var long = $this.data("long");
            var event = $("span[class='eventTitle']").html();
            $.ajax({
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                dataType: "json",
                type: "GET",
                data: {sensor: false, latlng: lat + "," + long},
                success: function (response) {
                    var adrs = response.results[0].address_components[5].short_name;
                    $this.html(adrs);
                    setMap(lat, long, event, "");
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
                    link: 'google.com',
                    picture: 'https://sribu-sg.s3.amazonaws.com/assets/media/contest_detail/2016/4/kontes-re-branding-logo-media-portal-berita-57147d72ca6bcbfc8c000007/large_6a2f2a85b4.jpg',
                    caption: title,
                    description: title,
                    message: ''
                }, function (response) {
            if (response && !response.error_message) {
                alert('Posting completed.');
                $.ajax({
                    url : BASE_URL + "/events/count_share_facebook/" + event_id,
                    dataType : "json",
                    type : "PUT",
                    data : {eventID : event_id},
                    success : function(json) {
//                        alert("Sukses!");
                    }
                });
            }
        }
        );
    }
    
    function shareGoogle(id) {
        $.ajax({
            url : BASE_URL + "/events/count_share_gplus/" + event_id,
            dataType : "json",
            type : "PUT",
            data : {eventID : event_id},
            success : function(json) {
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
                url : BASE_URL + "/events/count_share_twitter/" + event_id,
                dataType : "json",
                type : "PUT",
                data : {eventID : event_id},
                success : function(json) {
//                    alert("Sukses!");
                }
            });
        });
    });
</script>