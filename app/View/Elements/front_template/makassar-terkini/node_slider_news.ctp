<div class="flexslider" id="flexslider">
    <ul class="slides">
        <?php
        $slideshowBanners = ClassRegistry::init("BannerSlideshow")->find("all", [
            "conditions" => [
                "and" => [
                    "BannerSlideshow.banner_slideshow_status_id" => 1,
                    "DATE(now()) between date(BannerSlideshow.start_date) and date(BannerSlideshow.expired_date)",
                ]
            ]
        ]);
        foreach ($slideshowBanners as $banners) {
            ?>
            <li>
                <a href="<?= $banners['BannerSlideshow']['url'] ?>">				
                    <img src="<?= Router::url("{$banners['BannerSlideshow']['path']}", true) ?>" alt="" />
                </a>							
            </li>
            <?php
        }
        ?>        
    </ul>
</div>