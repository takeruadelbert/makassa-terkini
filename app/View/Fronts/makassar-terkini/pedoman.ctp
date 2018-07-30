<style type="text/css">
    .adv-bottom{
        margin-top: 20px;
        margin-bottom: 0px !important;
    }

    .s-pp-nav-right li.active a, .s-pp-nav-right li.active a:hover,.s-pp-nav-right li.active a:focus, .s-pp-nav-right li.active a:active {
        background-color: #ed1b23;
        color: #fff;
        font-weight: bold;
    }

    .flyRightFixed {
        transform: translateY(0px);
    }
</style>

<!--Content-->
<!--==================================================-->
<section class="s-main-content">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack">
                    <div class="" style="position: relative;">
                        <ul class="nav nav-tabs s-pp-nav-right f-flyright-nav flyRightAbsolute" id="myTab00">
                            <?php
                            $catalogs = ClassRegistry::init("Catalog")->find("first");
                            $is_active = "";
                            foreach($catalogs['CatalogDetail'] as $k => $titles) {
                                if($k == 0) {
                                    $is_active = "active";
                                } else {
                                    $is_active = "";
                                }
                            ?>
                            <li class="<?= $is_active ?>" style="width: inherit; display: block;"><a href="#<?= $k ?>" data-target="#<?= $k ?>" data-toggle="tab"><?= $titles['uniq_title'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>

                        <div class="tab-content pull-left" style="width: calc(100% - 228px); margin-right: 20px; display: block; border-right: 2px solid #bfbdbd;">
                            <div class="active" id="m-kbv" style="padding-top: 10px; padding-right: 10px;">
                                <div class="s-fancy-header-red">
                                    <span class="s-title">Pedoman Media</span>
                                </div>
                                <?= $catalogs['Catalog']['header'] ?>
                                <?php
                                $i = 1;
                                foreach($catalogs['CatalogDetail'] as $k => $details) {
                                ?>
                                <span id="<?= $k ?>" class="tk-demografi-head">
                                    <?= $i . " " . $details['title'] ?>
                                </span>
                                <p><?= $details['content'] ?></p> <br>
                                <?php
                                $i++;
                                }
                                ?>
                                <?= $catalogs['Catalog']['footer'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

            </div>
        </div>
    </div>


    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1]);
    ?>

</section>