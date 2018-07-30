<?php
$now = new DateTime();
?>
<!--Content-->
<!--==================================================-->
<section class="s-main-content">

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 1, "position" => 1, "idx" => 1]);
    ?>
    <!-- Adv Left -->
    <!--==================================================-->
    <div class="adv adv-160-600 adv-top-left">

    </div>

    <!-- Adv Right -->
    <!--==================================================-->
    <div class="adv adv-160-600 adv-top-right">

    </div>

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-2-per-3 pull-left f-content-area" style="/*background: #123;*/">
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_pencarian_event"); ?>        
        <?= $this->MakassarTerkini->pagination($paginationInfo, $this->request->query, Router::url("", true)) ?>
    </div>

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-1-per-3 pull-right f-extra-area" style="">
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 1, "idx" => 0]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_pop"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 1, "idx" => 1]);
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_event_terkini"); ?>
        <?php
        echo $this->element(_FRONT_TEMPLATE_DIR . "/" . $frontTemplate . "/node_iklan", ["type" => 4, "position" => 1, "upperFence" => 1]);
        ?>
    </div>
    <span class="clearfix"></span>
    <!-- <div class="adv adv-1100-90">
        ADVERTISE 1100 x 90
    </div> -->
</section>