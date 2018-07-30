<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header"><a class="navbar-brand" href="<?= Router::url("/admin/dashboard", true) ?>"><img src="<?= Router::url("/img/logo.png", true) ?>" alt="Dinas Pemuda, Olahraga dan Pariwisata"></a></div>
    <div class="navbar-header">
        <a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons"><span class="sr-only">Toggle navbar</span><i class="icon-grid3"></i></button>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar"><span class="sr-only">Toggle navigation</span><i class="icon-paragraph-justify2"></i></button>
    </div>
    <?php
    $newsEdit = ClassRegistry::init("News")->find("all", [
        "conditions" => [
            "News.news_status_id" => 1,
        ]
    ]);
    $countNotifEdit = count($newsEdit);
    $newsPublish = ClassRegistry::init("News")->find("all", [
        "conditions" => [
            "News.news_status_id" => 2,
        ]
    ]);
    $countNotifPublish = count($newsPublish);
    $newsAdmin = ClassRegistry::init("News")->find("all", [
        "conditions" => [
            "News.news_status_id" => [
                1,
                2
            ]
        ]
    ]);
    $countNotifAdmin = count($newsAdmin);
    ?>
    <?php
    if ($this->Session->read('credential.admin.User.UserGroup.name') == 'admin') {
        ?>
        <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-notification"></i>
                    <?php
                    if ($countNotifAdmin > 0) {
                        ?>
                        <span class="label label-default"><?= $countNotifAdmin ?></span>
                        <?php
                    }
                    ?>
                </a>
                <div class="popup dropdown-menu dropdown-menu-right">
                    <div class="popup-header">
                        <span><?= __("Notifikasi") ?></span>
                    </div>
                    <ul class="activity">
                        <?php
                        if (!empty($newsAdmin)) {                            
                            foreach ($newsAdmin as $notification) {
                                ?>
                                <li>
                                    <div>
                                        <?php
                                        if ($notification['News']['news_status_id'] == 1) {
                                            ?>
                                            <p>Judul berita "<?= $notification['News']['title_ind'] ?>" belum di-<b>EDIT</b> </p>
                                            <span><?= $this->Html->getTimeago(strtotime($notification['News']['news_date'])); ?></span>
                                            <?php
                                        } else if ($notification['News']['news_status_id'] == 2) {
                                            ?> 
                                            <p>Judul berita "<?= $notification['News']['title_ind'] ?>" belum di-<b>PUBLISH</b> </p>
                                            <span><?= $this->Html->getTimeago(strtotime($notification['News']['news_date'])); ?></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </li> 
                                <?php
                            }
                        } else {
                            ?>
                            <li class="text-center">Tidak ada notifikasi.</li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
            </li>
            <?php
        }
        ?>
        <?php
        if ($this->Session->read('credential.admin.User.UserGroup.name') == 'editor') {
            ?>
            <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-notification"></i>
                        <?php
                        if ($countNotifEdit > 0) {
                            ?>
                            <span class="label label-default"><?= $countNotifEdit ?></span>
                            <?php
                        }
                        ?>
                    </a>
                    <div class="popup dropdown-menu dropdown-menu-right">
                        <div class="popup-header">
                            <span><?= __("Notifikasi") ?></span>
                        </div>
                        <ul class="activity">
                            <?php
                            if (!empty($newsEdit)) {
                                foreach ($newsEdit as $notification) {
                                    ?>
                                    <li>
                                        <div>
                                            <p>Judul berita "<?= $notification['News']['title_ind'] ?>" belum di-<b>EDIT</b> </p>
                                            <span><?= $this->Html->getTimeago($notification['News']['publish_date']); ?></span>
                                        </div>
                                    </li> 
                                    <?php
                                }
                            } else {
                                ?>
                                <li class="text-center">Tidak ada notifikasi.</li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </li>
                <?php
            }
            ?>

            <?php
            if ($this->Session->read('credential.admin.User.UserGroup.name') == 'publisher') {
                ?>
                <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-notification"></i>
                            <?php
                            if ($countNotifPublish > 0) {
                                ?>
                                <span class="label label-default"><?= $countNotifPublish ?></span>
                                <?php
                            }
                            ?>
                        </a>
                        <div class="popup dropdown-menu dropdown-menu-right">
                            <div class="popup-header">
                                <span><?= __("Notifikasi") ?></span>
                            </div>
                            <ul class="activity">
                                <?php
                                if (!empty($newsPublish)) {
                                    foreach ($newsPublish as $notification1) {
                                        ?>
                                        <li>
                                            <div>
                                                <p>Judul berita "<?= $notification1['News']['title_ind'] ?>" belum di-<b>PUBLISH</b> </p>
                                                <span><?= $this->Html->getTimeago($notification1['News']['publish_date']); ?></span>
                                            </div>
                                        </li> 
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <li class="text-center">Tidak ada notifikasi.</li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </li>
                    <?php
                }
                ?>

                <?php
                if ($this->Session->read('credential.admin.User.UserGroup.name') == 'editor dan publisher') {
                    ?>
                    <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-notification"></i>
                                <?php
                                if ($countNotifAdmin > 0) {
                                    ?>
                                    <span class="label label-default"><?= $countNotifAdmin ?></span>
                                    <?php
                                }
                                ?>
                            </a>
                            <div class="popup dropdown-menu dropdown-menu-right">
                                <div class="popup-header">
                                    <span><?= __("Notifikasi") ?></span>
                                </div>
                                <ul class="activity">
                                    <?php
                                    if (!empty($newsAdmin)) {
                                        foreach ($newsAdmin as $notification) {
                                            ?>
                                            <li>
                                                <div>
                                                    <?php
                                                    if ($notification['News']['news_status_id'] == 1) {
                                                        ?>
                                                        <p>Judul berita "<?= $notification['News']['title_ind'] ?>" belum di-<b>EDIT</b> </p>
                                                        <span><?= $this->Html->getTimeago($notification['News']['publish_date']); ?></span>
                                                        <?php
                                                    } else if ($notification['News']['news_status_id'] == 2) {
                                                        ?> 
                                                        <p>Judul berita "<?= $notification['News']['title_ind'] ?>" belum di-<b>PUBLISH</b> </p>
                                                        <span><?= $this->Html->getTimeago($notification['News']['publish_date']); ?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </li> 
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <li class="text-center">Tidak ada notifikasi.</li>
                                        <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                    <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
                        <li class="user dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><img src="<?= Router::url('/', true) . $this->Session->read("credential.admin.User.profile_picture") ?>"/><span><?= $this->Echo->fullName($this->Session->read("credential.admin.Biodata")) ?></span><i class="caret"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right icons-right">
                                <li><a href="<?php echo Router::url("/admin/accounts/edit_profile", true) ?>"><i class="icon-user"></i> <?= __("Profil") ?></a></li>
                                <li><a href="<?php echo Router::url("/admin/logout", true) ?>"><i class="icon-exit"></i> <?= __("Keluar") ?></a></li>
                            </ul>
                        </li>
                    </ul>
                    </div>