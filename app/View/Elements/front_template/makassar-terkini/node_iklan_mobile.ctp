<?php
if (!isset($idx)) {
    $adver = ClassRegistry::init("MobileAdvert")->find('first', [
        "conditions" => [
            "MobileAdvert.advert_position_id" => $position,
            "MobileAdvert.advert_status_id" => 1,
        ],
    ]);
    if ($adver['MobileAdvert']['advert_status_id'] == 2 || new DateTime() > new DateTime($adver['MobileAdvert']['expired_date'])) {
        
    } else if (!empty($adver["MobileAdvert"]["google_adsense"])) {
        ?>
        <div class="col-md-12 col-sm-12 col-xs-12  center flex font-sourceSansProSemibold adv-adsense-mobile">
            <?= $adver["MobileAdvert"]["google_adsense"] ?>
        </div>
        <?php
    } else {
        ?>
        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-advertise center flex font-sourceSansProSemibold">
            <a href="<?= $adver['MobileAdvert']['url'] ?>" target="_blank"><img src="<?= str_replace('\\', '/', Router::url("{$adver['MobileAdvert']['path']}", true)) ?>"></a>
        </div>
        <?php
    }
} else {
    $adver = ClassRegistry::init("MobileAdvert")->find('all', [
        "conditions" => [
            "MobileAdvert.advert_position_id" => $position,
            "MobileAdvert.advert_status_id" => 1,
        ],
    ]);
    if (isset($adver[$idx])) {
        if ($adver[$idx]['MobileAdvert']['advert_status_id'] == 2 || new DateTime() > new DateTime($adver[$idx]['MobileAdvert']['expired_date'])) {
            
        } else if (!empty($adver[$idx]["MobileAdvert"]["google_adsense"])) {
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 center flex font-sourceSansProSemibold adv-adsense-mobile">
                <?= $adver[$idx]["MobileAdvert"]["google_adsense"] ?>
            </div>
            <?php
        } else {
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-advertise center flex font-sourceSansProSemibold">
                <a href="<?= $adver[$idx]['MobileAdvert']['url'] ?>" target="_blank"><img src="<?= str_replace('\\', '/', Router::url("{$adver[$idx]['MobileAdvert']['path']}", true)) ?>"></a>
            </div>
            <?php
        }
    }
}
?>
<style>
    .adv-adsense-mobile{
        width:920px;
        display:block;
    }
</style>