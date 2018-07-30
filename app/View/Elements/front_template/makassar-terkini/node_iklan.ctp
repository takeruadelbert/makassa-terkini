<?php
if (isset($bottom) && ($bottom === true)) {
    $bottom = "-bottom";
} else {
    $bottom = "";
}
if (!isset($class)) {
    $class = "";
}
if (isset($upperFence)) {
    $advs = ClassRegistry::init("Advert")->find('all', [
        "conditions" => [
            "Advert.advert_type_id" => $type,
            "Advert.advert_position_id" => $position,
        ],
    ]);
    foreach ($advs as $i => $adv) {
        if ($i <= $upperFence) {
            continue;
        }
        $cssClass = "adv-" . str_replace("x", "-", $adv["AdvertType"]["name"]);
        if ($adv['Advert']['advert_status_id'] == 2 || new DateTime() > new DateTime($adv['Advert']['expired_date'])) {
            
        } else if (!empty($adv["Advert"]["banner_html"])) {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?>">
                <?= $adv["Advert"]["banner_html"] ?>
            </div>
            <?php
        } else if (!empty($adv["Advert"]["google_adsense"])) {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?> adv-adsense">
                <?= $adv["Advert"]["google_adsense"] ?>
            </div>
            <?php
        } else {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?>">
                <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv['Advert']['id'] ?>" href="<?= $adv['Advert']['url'] ?>"> 
                    <img src="<?= str_replace('\\', '/', Router::url("{$adv['Advert']['path']}", true)) ?>">
                </a>
            </div>
            <?php
        }
    }
} else if (isset($idx)) {
    $adv = ClassRegistry::init("Advert")->find('all', [
        "conditions" => [
            "Advert.advert_type_id" => $type,
            "Advert.advert_position_id" => $position,
        ],
    ]);
    if (!empty($adv[$idx])) {
        $cssClass = "adv-" . str_replace("x", "-", $adv[$idx]["AdvertType"]["name"]);
        if ($adv[$idx]['Advert']['advert_status_id'] == 2 || new DateTime() > new DateTime($adv[$idx]['Advert']['expired_date'])) {
            
        } else if (!empty($adv[$idx]["Advert"]["banner_html"])) {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?>">
                <?= $adv[$idx]["Advert"]["banner_html"] ?>
            </div>
            <?php
        } else if (!empty($adv[$idx]["Advert"]["google_adsense"])) {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?> adv-adsense">
                <?= $adv[$idx]["Advert"]["google_adsense"] ?>
            </div>
            <?php
        } else {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?>">
                <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv[$idx]['Advert']['id'] ?>" href="<?= $adv[$idx]['Advert']['url'] ?>"> 
                    <img src="<?= str_replace('\\', '/', Router::url("{$adv[$idx]['Advert']['path']}", true)) ?>">
                </a>
            </div>
            <?php
        }
    }
} else {
    $adv = ClassRegistry::init("Advert")->find('first', [
        "conditions" => [
            "Advert.advert_type_id" => $type,
            "Advert.advert_position_id" => $position,
        ],
    ]);
    if (!empty($adv)) {
        $cssClass = "adv-" . str_replace("x", "-", $adv["AdvertType"]["name"]);
        if ($adv['Advert']['advert_status_id'] == 2 || new DateTime() > new DateTime($adv['Advert']['expired_date'])) {
            
        } else if (!empty($adv["Advert"]["banner_html"])) {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?>">
                <?= $adv["Advert"]["banner_html"] ?>
            </div>
            <?php
        } else if (!empty($adv["Advert"]["google_adsense"])) {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?> adv-adsense">
                <?= $adv["Advert"]["google_adsense"] ?>
            </div>
            <?php
        } else {
            ?>
            <div class="adv <?= $cssClass ?> <?= $cssClass . $bottom ?> <?= $class ?>">
                <a target="_blank" class="advHeader advCountable" data-counted="false" data-id="<?= $adv['Advert']['id'] ?>" href="<?= $adv['Advert']['url'] ?>"> 
                    <img src="<?= str_replace('\\', '/', Router::url("{$adv['Advert']['path']}", true)) ?>">
                </a>
            </div>
            <?php
        }
    }
}
?>
<style>
    .adv-adsense{
        background-color:white !important;
        border:0px solid black !important;
    }
</style>