<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class MakassarTerkiniHelper extends HtmlHelper {

    function pagination($paginationInfo = false, $query = [], $url = "#", $totalButton = 5) {
        if ($paginationInfo !== false) {
            $symmetryCount = floor($totalButton / 2);
            $totalButtonBefore = $paginationInfo["currentPage"] - 1;
            $totalButtonAfter = $paginationInfo["totalPage"] - $paginationInfo["currentPage"];
            $countButtonBefore = $totalButtonBefore > $symmetryCount ? $symmetryCount : $totalButtonBefore;
            $countButtonAfter = $totalButtonAfter > $symmetryCount ? $symmetryCount : $totalButtonAfter;
            if ($countButtonBefore <= 0 && $countButtonAfter <= 0) {
                $buttonBefore = 0;
                $buttonAfter = 0;
            } else {
                $buttonBefore = $countButtonBefore + ($symmetryCount - $countButtonAfter);
                $buttonAfter = $countButtonAfter + ($symmetryCount - $countButtonBefore);
            }
            ?>
            <ul class="ui-pagination">
                <?php
                if ($paginationInfo["currentPage"] != 1) {
                    $query["page"] = $paginationInfo["currentPage"] - 1;
                    ?>
                    <li class="prev">
                        <a href="<?= $url . "?" . http_build_query($query) ?>">
                            <span class="fa fa-chevron-left" style=""></span>
                        </a>
                    </li>
                    <?php
                }
                for ($n = $buttonBefore; $n >= 1; $n--) {
                    $m = $paginationInfo["currentPage"] - $n;
                    if ($m < 1) {
                        continue;
                    }
                    $query["page"] = $m;
                    ?>
                    <li>
                        <a href="<?= $url . "?" . http_build_query($query) ?>">
                            <?= $m ?>
                        </a>
                    </li>        
                    <?php
                }
                ?>
                <li class="active">
                    <a href="#">
                        <?= $m = $paginationInfo["currentPage"] ?>
                    </a>
                </li>
                <?php
                for ($n = 1; $n <= $buttonAfter; $n++) {
                    $m = $paginationInfo["currentPage"] + $n;
                    if ($m > $paginationInfo["totalPage"]) {
                        continue;
                    }
                    $query["page"] = $m;
                    ?>
                    <li>
                        <a href="<?= $url . "?" . http_build_query($query) ?>">
                            <?= $m ?>
                        </a>
                    </li>        
                    <?php
                }
                if ($paginationInfo["currentPage"] != $paginationInfo["totalPage"]) {
                    $query["page"] = $paginationInfo["currentPage"] + 1;
                    ?>
                    <li class="next">
                        <a href="<?= $url . "?" . http_build_query($query) ?>">
                            <span class="fa fa-chevron-right" style=""></span>
                        </a>
                    </li>
                    <?php
                }
                ?>

            </ul>
            <?php
        }
    }
    
    function paginationEvent($paginationInfo = false, $query = [], $url = "#", $totalButton = 5, $bulan) {
        if ($paginationInfo !== false) {
            $symmetryCount = floor($totalButton / 2);
            $totalButtonBefore = $paginationInfo["currentPage"] - 1;
            $totalButtonAfter = $paginationInfo["totalPage"] - $paginationInfo["currentPage"];
            $countButtonBefore = $totalButtonBefore > $symmetryCount ? $symmetryCount : $totalButtonBefore;
            $countButtonAfter = $totalButtonAfter > $symmetryCount ? $symmetryCount : $totalButtonAfter;
            if ($countButtonBefore <= 0 && $countButtonAfter <= 0) {
                $buttonBefore = 0;
                $buttonAfter = 0;
            } else {
                $buttonBefore = $countButtonBefore + ($symmetryCount - $countButtonAfter);
                $buttonAfter = $countButtonAfter + ($symmetryCount - $countButtonBefore);
            }
            ?>
                <?php
                if ($paginationInfo["currentPage"] != 1) {
                    $query["page"] = $paginationInfo["currentPage"] - 1;
                    ?>
                        <a href="<?= $url . "?bulan=$bulan&" . http_build_query($query) ?>" class="pagenum">
                            <span class="fa fa-chevron-left" style=""></span>
                        </a>
                    <?php
                }
                for ($n = $buttonBefore; $n >= 1; $n--) {
                    $m = $paginationInfo["currentPage"] - $n;
                    if ($m < 1) {
                        continue;
                    }
                    $query["page"] = $m;
                    ?>
                        <a href="<?= $url . "?bulan=$bulan&" . http_build_query($query) ?>" class="pagenum">
                            <?= $m ?>
                        </a>    
                    <?php
                }
                ?>
                <!--<li class="active">-->
                    <a href="#" class="pagenum active">
                        <?= $m = $paginationInfo["currentPage"] ?>
                    </a>
                <!--</li>-->
                <?php
                for ($n = 1; $n <= $buttonAfter; $n++) {
                    $m = $paginationInfo["currentPage"] + $n;
                    if ($m > $paginationInfo["totalPage"]) {
                        continue;
                    }
                    $query["page"] = $m;
                    ?>
                        <a href="<?= $url . "?bulan=$bulan&" . http_build_query($query) ?>" class="pagenum">
                            <?= $m ?>
                        </a>   
                    <?php
                }
                if ($paginationInfo["currentPage"] != $paginationInfo["totalPage"]) {
                    $query["page"] = $paginationInfo["currentPage"] + 1;
                    ?>
                        <a href="<?= $url . "?bulan=$bulan&" . http_build_query($query) ?>" class="pagenum">
                            <span class="fa fa-chevron-right" style=""></span>
                        </a>
                    <?php
                }
                ?>
            <?php
        }
    }
}
