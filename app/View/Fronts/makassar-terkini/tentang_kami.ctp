<style type="text/css">
    .s-fancy-header-red .s-title {
        padding: 0px 15px 0px 15px;
        font-style: normal;
        min-width: 180px;
        text-align: center;

    }

    .adv-bottom{
        margin-bottom: 0px !important;
        margin-top: 20px;
    }

    .title-chart{
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        margin-top: -40px;
    }

    .s-pp-nav-right li.active a, .s-pp-nav-right li.active a:hover,.s-pp-nav-right li.active a:focus, .s-pp-nav-right li.active a:active {
        background-color: #ed1b23;
        color: #fff;
        font-weight: bold;
    }

    .content-adv {
        //margin-top: 130px !important;
    }

</style>
<style type="text/css">
    #chartdiv1 {
        width       : 100%;
        height      : 300px;
        font-size   : 11px;
    }

    #chartdiv2 {
        width       : 100%;
        height      : 300px;
        font-size   : 11px;
    }
</style>
<script>
    
    $(document).ready(function () {
    
    $('#sideMenu-profil').find('a').on('click', function (e) {
        var href = $(this).attr('href');

        $('html,body').animate({scrollTop: $(href).offset().top}, 500);
        $(this).find('img').show().parents('.sideMenu-li').siblings().find('a').find('img').hide();

        e.preventDefault();

    });

    });

</script>
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
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                    <div class="" style="position: relative;" id="sideMenu-profil">
                        <ul class="nav nav-tabs s-pp-nav-right f-flyright-nav flyRightAbsolute" id="myTab00">
                            <?php
                            $abouts = ClassRegistry::init("About")->find("all");
                            $is_active = "";
                            foreach($abouts as $k => $contents) {
                                $data_content = "#";
                                $data_content .= str_replace(' ', '', $contents['About']['title']);
                                if($k == 0) {
                                    $is_active = "active";
                                } else {
                                    $is_active = "";
                                }
                            ?>
                            <li class="<?= $is_active ?>" style="width: inherit; display: block;"><a href="<?= $data_content ?>" data-target="<?= $data_content ?>" data-toggle="tab"><?= $contents['About']['title'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="tab-content pull-left" style="width: calc(100% - 228px); margin-right: 20px; display: block; border-right: 2px solid #bfbdbd;">
                            <?php
                            $isActive = "";
                            foreach($abouts as $k => $items) {
                                $data_content = str_replace(' ', '', $items['About']['title']);
                                if($k == 0) {
                                    $isActive = "active";
                                } else {
                                    $isActive = "";
                                }
                            ?>
                            <div class="<?= $isActive ?>" id="<?= $data_content ?>" style="padding-top: 10px; padding-right: 10px;">
                                <div class="s-fancy-header-red">
                                    <span class="s-title"><?= $items['About']['title'] ?></span>
                                </div>
                                <?= $items['About']['content'] ?>
                            </div>
                            <?php
                            }
                            ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "class" => "adv-bottom"]);
    ?>
</section>