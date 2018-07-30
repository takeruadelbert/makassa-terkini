<?php
$linkType = [
    1 => "citizen-report",
    2 => "citizen-report-foto",
    3 => "video",
];
?>
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 index-contentBack boxOut-nodeCitizen">
                <div class="news-head-bt">
                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/citizen-report.png", true) ?>" style="width: auto; height: 35px;">

                    <div class="redspan">
                        <div class="greyspan" style="width: 545px;">
                        </div>
                    </div>

                    <span class="atau-hidden">
                        <div style="position: relative; float: right; text-align: center; margin-top: -4px;">
                            <a href="<?= Router::url("/citizen-report", true) ?>" class="pull-left">
                                <span style="font-size: 12px; color: #ec2227; margin-right: 10px;">LIHAT SEMUA</span>
                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/all-window-red.png", true) ?>" height="10px">
                            </a>
                            <span class="pull-left" style="margin-left: 5px; margin-right: 5px; color: #A1A1A1; font-style: italic;">atau</span>
                            <a class="s-tick" href="#citizen-report-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>" width="12px">
                            </a>
                            <a class="s-tick" href="#citizen-report-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                                <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>" width="12px">
                            </a>
                        </div>
                    </span>

                    <div class="slider-beritaTerkini" style="position: absolute; right:0; width: 50px; text-align: center; margin-top: -30px;">
                        <a class="s-tick" href="#citizen-report-carousel" role="button" data-slide="prev" style="top: 7px; right: 36px;">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-left.png", true) ?>">
                        </a>
                        <a class="s-tick" href="#citizen-report-carousel" role="button" data-slide="next" style="top: 7px; right: 16px;">
                            <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/news-tick-right.png", true) ?>">
                        </a>
                    </div>
                </div>

                <div id="citizen-report-carousel" class="carousel slide" data-ride="carousel" style="height: inherit; position: relative;">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active ">
                            <div class="col-md-12 col-sm-12 col-xs-12">                                
                                <?php
                                $length = 80;
                                foreach ($citizen_report as $k => $citizens) {
                                    $citizen_report_title = seoUrl($citizens['News']['title_ind']);
                                    if ($k < 2) {
                                        ?>

                                        <?php
                                        if ($k == 0) {
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-6 citizenReport-left target-citizen-report-0">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 citizen-imgPrimary">
                                                            <a href="<?= Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true) ?>">                   
                                                                <div style="height:215px; overflow:hidden;">
                                                                    <img src="<?= str_replace('\\', '/', Router::url($citizens['News']['thumbnail_path'], true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-citizenTextPrimary">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 citizen-textPrimary">
                                                                <a href="<?= Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true) ?>">                   
                                                                    <?php
                                                                    $title = strip_tags(html_entity_decode($citizens['News']['title_ind']));
                                                                    if (strlen($title) > 70) {
                                                                        echo substr($title, 0, 70) . "...";
                                                                    } else {
                                                                        echo $title;
                                                                    }
                                                                    ?> 
                                                                </a>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12 citizen-iconPrimary">
                                                                <div class="" style="float: left; max-width: 210px; overflow: hidden; margin-right: 20px;">
                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/man-lit.png", true) ?>">
                                                                    <font class="citizen-name" style="margin-right: 20px;">
                                                                    <?= $citizens['Author']['Biodata']['full_name'] ?>
                                                                    </font>
                                                                </div>
                                                                <div class="" style="float: left; overflow: hidden;">
                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock-filled.png", true) ?>">
                                                                    <font>
                                                                    <?= $this->Html->cvtWaktuInter($citizens['News']['news_date']) ?>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        if ($k == 1) {
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-6 citizenReport-right target-citizen-report-1">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 citizen-imgPrimary">
                                                            <a href="<?= Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true) ?>">  
                                                                <div style="height:215px; overflow:hidden;">
                                                                    <img src="<?= str_replace('\\', '/', Router::url($citizens['News']['thumbnail_path'], true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-citizenTextPrimary">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 citizen-textPrimary">
                                                                <a href="<?= Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true) ?>">  
                                                                    <?php
                                                                    $title = strip_tags(html_entity_decode($citizens['News']['title_ind']));
                                                                    if (strlen($title) > 70) {
                                                                        echo substr($title, 0, 70) . "...";
                                                                    } else {
                                                                        echo $title;
                                                                    }
                                                                    ?> 
                                                                </a>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12 citizen-iconPrimary">
                                                                <div class="" style="float: left; max-width: 210px; overflow: hidden; margin-right: 20px;">
                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/man-lit.png", true) ?>">
                                                                    <font class="citizen-name" style="margin-right: 20px;">
                                                                    <?= $citizens['Author']['Biodata']['full_name'] ?>
                                                                    </font>
                                                                </div>
                                                                <div class="" style="float: left; overflow: hidden;">
                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock-filled.png", true) ?>">
                                                                    <font>
                                                                    <?= $this->Html->cvtWaktuInter($citizens['News']['news_date']) ?>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-12 col-sm-12 col-xs-12">                                
                                <?php
                                foreach ($citizen_report as $k => $citizens) {
                                    $citizen_report_title = seoUrl($citizens['News']['title_ind']);
                                    if ($k < 4) {
                                        if ($k == 2) {
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-6 citizenReport-left target-citizen-report-2">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 citizen-imgPrimary">
                                                            <a href="<?= Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true) ?>">  
                                                                <div style="height:215px; overflow:hidden;">
                                                                    <img src="<?= str_replace('\\', '/', Router::url($citizens['News']['thumbnail_path'], true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-citizenTextPrimary">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 citizen-textPrimary">
                                                                <a href="<?= Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true) ?>">  
                                                                    <?php
                                                                    $title = strip_tags(html_entity_decode($citizens['News']['title_ind']));
                                                                    if (strlen($title) > 70) {
                                                                        echo substr($title, 0, $length) . "...";
                                                                    } else {
                                                                        echo $title;
                                                                    }
                                                                    ?> 
                                                                </a>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12 citizen-iconPrimary">
                                                                <div class="" style="float: left; max-width: 210px; overflow: hidden; margin-right: 20px;">
                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/man-lit.png", true) ?>">
                                                                    <font class="citizen-name" style="margin-right: 20px;">
                                                                    <?= $citizens['Author']['Biodata']['full_name'] ?>
                                                                    </font>
                                                                </div>
                                                                <div class="" style="float: left; overflow: hidden;">
                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock-filled.png", true) ?>">
                                                                    <font>
                                                                    <?= $this->Html->cvtWaktuInter($citizens['News']['news_date']) ?>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        if ($k == 3) {
                                            ?>
                                            <div class="col-md-6 col-sm-6 col-xs-6 citizenReport-right target-citizen-report-3">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 citizen-imgPrimary">
                                                            <a href="<?= Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true) ?>">  
                                                                <div style="height:215px; overflow:hidden;">
                                                                    <img src="<?= str_replace('\\', '/', Router::url($citizens['News']['thumbnail_path'], true)) ?>" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-citizenTextPrimary">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 citizen-textPrimary">
                                                                <a href="<?= Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true) ?>">  
                                                                    <?php
                                                                    $title = strip_tags(html_entity_decode($citizens['News']['title_ind']));
                                                                    if (strlen($title) > 70) {
                                                                        echo substr($title, 0, 70) . "...";
                                                                    } else {
                                                                        echo $title;
                                                                    }
                                                                    ?>  
                                                                </a>
                                                            </div>
                                                            <div class="col-md-12 col-sm-12 col-xs-12 citizen-iconPrimary">
                                                                <div class="" style="float: left; max-width: 210px; overflow: hidden; margin-right: 20px;">
                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/man-lit.png", true) ?>">
                                                                    <font class="citizen-name" style="margin-right: 20px;">
                                                                    <?= $citizens['Author']['Biodata']['full_name'] ?>
                                                                    </font>
                                                                </div>
                                                                <div class="" style="float: left; overflow: hidden;">
                                                                    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock-filled.png", true) ?>">
                                                                    <font>
                                                                    <?= $this->Html->cvtWaktuInter($citizens['News']['news_date']) ?>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<?php
$citizen_news = [
];
foreach ($citizen_report as $k => $citizens) {
    if ($k < 4) {
        continue;
    }
    if ($k > 11) {
        break;
    }
    $title = strip_tags(html_entity_decode($citizens['News']['title_ind']));
    if (strlen($title) > 70) {
        $currentTitle = substr($title, 0, $length) . "...";
    } else {
        $currentTitle = $title;
    }
    $citizen_news[$k % 4][] = [
        "href" => Router::url("/{$linkType[$citizens['News']['news_type_id']]}/{$citizens['News']['id']}/$citizen_report_title", true),
        "src" => Router::url($citizens['News']['thumbnail_path'], true),
        "title" => $currentTitle,
        "author" => $citizens['Author']['Biodata']['full_name'],
        "newstime" => $this->Html->cvtWaktuInter($citizens['News']['news_date']),
    ];
}
?>
<script>
    var citizen_reports =<?= json_encode($citizen_news) ?>;
    $(document).ready(function () {
        $.each(citizen_reports, function (k, v) {
            $.each(v, function (i, citizen_report) {
                var templateNews = Handlebars.compile($("#entity-citizen-report").html(), {noEscape: true});
                var result = templateNews(citizen_report);
                $(".target-citizen-report-" + k).append(result);
            })
        })
    })
</script>
<script type="text/x-handlebars-template" id="entity-citizen-report">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-citizenSecondary">
    <div class="col-md-4 col-sm-4 col-xs-4 citizen-imgSecondary" style="height: 96px;">
    <a href="{{href}}">  
    <img src="{{src}}" style="left: 50%; margin-left: -50%; position: relative; width: auto !important; height: 100% !important;">
    </a>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-8 boxOut-citizenText">
    <div class="col-md-12 col-sm-12 col-xs-12 citizen-textSecondary">
    <a href="{{href}}">  
    {{title}}
    </a>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 citizen-iconPrimary">
    <div class="" style="float: left; width: 70px; overflow: hidden; margin-right: 20px;">
    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/man-lit.png", true) ?>">
    <font class="citizen-name" style="margin-right: 20px;">
    {{author}}
    </font>
    </div>
    <div class="" style="float: left; overflow: hidden;">
    <img src="<?= Router::url("/front_file/makassar-terkini/img/icon/clock-filled.png", true) ?>">
    <font>
    {{newstime}}
    </font>
    </div>
    </div>
    </div>
    </div>
    </div>
</script>