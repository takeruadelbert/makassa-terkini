<?php
$now = new DateTime();
?>
<!--Content-->
<!--==================================================-->
<section class="s-main-content">

    <!-- Adv Middle Top -->
    <!--==================================================-->
    <?php
    if(!empty(ClassRegistry::init("Advert")->find('first', array("conditions" => array("Advert.advert_position_id" => 1, "Advert.advert_type_id" => 1))))) {
        $adv_header_atas = ClassRegistry::init("Advert")->find('all',[
            "conditions" => [
                "Advert.advert_type_id" => 1,
                "Advert.advert_position_id" => 1,
            ],
        ]);
        if($adv_header_atas[1]['Advert']['advert_status_id'] == 2 || $now > new DateTime($adv_header_atas[1]['Advert']['expired_date'])) {

        } else {
    ?>
    <div class="adv adv-1100-90">
        <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv_header_atas[1]['Advert']['id'] ?>" href="<?= $adv_header_atas[1]['Advert']['url'] ?>"> 
            <img src="<?= str_replace('\\', '/', Router::url("{$adv_header_atas[1]['Advert']['path']}", true)) ?>">
        </a>
    </div>
    <?php
        } 
    }
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
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_semua_berita_kategori"); ?>
       <?= $this->MakassarTerkini->pagination($paginationInfo,$this->request->query,Router::url("",true)) ?>
    </div>

    <!-- Middel Content -->
    <!--==================================================-->
    <div class="s-col-1-per-3 pull-right f-extra-area" style="">
        <?php
        if(!empty(ClassRegistry::init("Advert")->find('first', array("conditions" => array("Advert.advert_position_id" => 4, "Advert.advert_type_id" => 1))))) {
            $adv_header_atas = ClassRegistry::init("Advert")->find('all',[
                "conditions" => [
                    "Advert.advert_type_id" => 4,
                    "Advert.advert_position_id" => 1,
                ],
            ]);
            if($adv_header_atas[0]['Advert']['advert_status_id'] == 2 || $now > new DateTime($adv_header_atas[0]['Advert']['expired_date'])) {

            } else {
        ?>
        <div class="adv adv-300-250">
            <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv_header_atas[0]['Advert']['id'] ?>" href="<?= $adv_header_atas[0]['Advert']['url'] ?>"> 
                <img src="<?= str_replace('\\', '/', Router::url("{$adv_header_atas[0]['Advert']['path']}", true)) ?>">
            </a>
        </div>
        <?php
            } 
        }
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_berita_pop"); ?>
        <?php
        if(!empty(ClassRegistry::init("Advert")->find('first', array("conditions" => array("Advert.advert_position_id" => 4, "Advert.advert_type_id" => 1))))) {
            $adv_header_atas = ClassRegistry::init("Advert")->find('all',[
                "conditions" => [
                    "Advert.advert_type_id" => 4,
                    "Advert.advert_position_id" => 1,
                ],
            ]);
            if($adv_header_atas[1]['Advert']['advert_status_id'] == 2 || $now > new DateTime($adv_header_atas[1]['Advert']['expired_date'])) {

            } else {
        ?>
        <div class="adv adv-300-250">
            <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv_header_atas[1]['Advert']['id'] ?>" href="<?= $adv_header_atas[1]['Advert']['url'] ?>"> 
                <img src="<?= str_replace('\\', '/', Router::url("{$adv_header_atas[1]['Advert']['path']}", true)) ?>">
            </a>
        </div>
        <?php
            }
        }
        ?>
        <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "node_event_terkini"); ?>
        <?php
        if(!empty(ClassRegistry::init("Advert")->find('first', array("conditions" => array("Advert.advert_position_id" => 1, "Advert.advert_type_id" => 4))))) {
            $adv_header_atas = ClassRegistry::init("Advert")->find('all',[
                "conditions" => [
                    "Advert.advert_type_id" => 4,
                    "Advert.advert_position_id" => 1,
                ],
            ]);
        ?>
        <?php for($i=2; $i < 3; $i++){ 
            if($adv_header_atas[$i]['Advert']['advert_status_id'] == 2 || $now > new DateTime($adv_header_atas[$i]['Advert']['expired_date'])) {

            } else {
        ?>
        <div class="adv adv-300-250">
            <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv_header_atas[$i]['Advert']['id'] ?>" href="<?= $adv_header_atas[$i]['Advert']['url'] ?>"> 
                <img src="<?= str_replace('\\', '/', Router::url("{$adv_header_atas[$i]['Advert']['path']}", true)) ?>">
            </a>
        </div>
        <?php
            }
             }
        }
        ?>
    </div>
    <span class="clearfix"></span>
    <!-- <div class="adv adv-1100-90">
        ADVERTISE 1100 x 90
    </div> -->



</section>