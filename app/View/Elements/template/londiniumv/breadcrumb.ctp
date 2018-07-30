<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="<?php echo Router::url("/admin/dashboard") ?>">Dashboard</a></li>
        <?php
        $bcSuggestion = array_reverse($bcSuggestion);
        foreach ($bcSuggestion as $bc) {
            if (empty($bc['alias'])) {
                echo "<li>{$bc['label']}</li>";
            } else {
                echo "<li><a href='" . Router::url("/" . $bc['alias'], true) . "' class=''>{$bc['label']}</a></li>";
            }
        }
        ?>
    </ul>
    <ul class="breadcrumb-buttons collapse">
        <li class="language dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="<?php echo $langs[Configure::read('Config.language')]['icon'] ?>"></span> <span><?php echo $langs[Configure::read('Config.language')]['name'] ?></span> <b class="caret"></b></a>
            <ul class="dropdown-menu dropdown-menu-right icons-right">
                <?php foreach ($langs as $k => $lang) {
                    ?>
                    <li><a href="<?php echo Router::url("/admin/languages/change/{$k}") ?>"><span class="<?php echo $lang['icon'] ?>"></span> <?php echo $lang['name'] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </li>
    </ul>
</div>