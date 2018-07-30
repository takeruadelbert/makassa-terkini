<?php echo $this->Form->create("NewsletterRecentEventSlideshow", array("class" => "form-horizontal form-separate", "action" => "index", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Slideshow Newsletter Acara Terkini") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Slideshow Newsletter Acara Terkini")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="panel panel-default">                                    
                                    <div class="panel-body">
				        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="has-feedback">
                                                        <?php
                                                        echo $this->Form->label("Dummy.title_ind", __("Acara"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                        echo $this->Form->input("Dummy.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control typeahead-ajax", "placeholder" => "Cari Acara", "value" => empty($this->data) ? "" : $this->data[0]['Event']['title_ind']));
                                                        echo $this->Form->input("NewsletterRecentEventSlideshow.0.event_id", array("type" => "hidden", "id" => "acara1"));
                                                        ?>
                                                        <i class="icon-search3 form-control-feedback"></i>
                                                    </div>
                                                </div>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="has-feedback">
                                                        <?php
                                                        echo $this->Form->label("Dummy.title_ind", __("Acara"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                        echo $this->Form->input("Dummy.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control typeahead2-ajax", "placeholder" => "Cari Acara", "value" => empty($this->data) ? "" : $this->data[1]['Event']['title_ind']));
                                                        echo $this->Form->input("NewsletterRecentEventSlideshow.1.event_id", array("type" => "hidden", "id" => "acara2"));
                                                        ?>
                                                        <i class="icon-search3 form-control-feedback"></i>
                                                    </div>
                                                </div>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="has-feedback">
                                                        <?php
                                                        echo $this->Form->label("Dummy.title_ind", __("Acara"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                        echo $this->Form->input("Dummy.title_ind", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control typeahead3-ajax", "placeholder" => "Cari Acara", "value" => empty($this->data) ? "" : $this->data[2]['Event']['title_ind']));
                                                        echo $this->Form->input("NewsletterRecentEventSlideshow.2.event_id", array("type" => "hidden", "id" => "acara3"));
                                                        ?>
                                                        <i class="icon-search3 form-control-feedback"></i>
                                                    </div>
                                                </div>
                                            </div>
				        </div>
				    </div>
				</div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <div class="form-actions text-center">
                        <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali")?>">
                        <input type="reset" value="Reset" class="btn btn-info">
                        <input type="submit" value="<?= __("Simpan")?>" class="btn btn-danger">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>

<script>
    $(document).ready(function () {
        var event = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('title_ind'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?= Router::url("/admin/events/list", true) ?>',
            remote: {
                url: '<?= Router::url("/admin/events/list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
            }
        });
        event.initialize();
        $('input.typeahead-ajax').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'event',
            display: 'title_ind',
            source: event.ttAdapter(),
            templates: {
                header: '<center><h5>Judul Acara</h5></center><hr>',
                suggestion: function (context) {
                    return '<p>Judul : ' + context.title_ind + '</p>';
                },
            }
        });
        $('input.typeahead-ajax').bind('typeahead:select', function (ev, suggestion) {
            console.log(suggestion);
            $('#acara1').val(suggestion.id);
        });
    })
</script>

<script>
    $(document).ready(function () {
        var event2 = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('title_ind'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?= Router::url("/admin/events/list", true) ?>',
            remote: {
                url: '<?= Router::url("/admin/events/list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
            }
        });
        event2.initialize();
        $('input.typeahead2-ajax').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'event2',
            display: 'title_ind',
            source: event2.ttAdapter(),
            templates: {
                header: '<center><h5>Judul Acara</h5></center><hr>',
                suggestion: function (context) {
                    return '<p>Judul : ' + context.title_ind + '</p>';
                },
            }
        });
        $('input.typeahead2-ajax').bind('typeahead:select', function (ev, suggestion) {
            console.log(suggestion);
            $('#acara2').val(suggestion.id);
        });
    })
</script>

<script>
    $(document).ready(function () {
        var event3 = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('title_ind'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?= Router::url("/admin/events/list", true) ?>',
            remote: {
                url: '<?= Router::url("/admin/events/list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
            }
        });
        event3.initialize();
        $('input.typeahead3-ajax').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'event3',
            display: 'title_ind',
            source: event3.ttAdapter(),
            templates: {
                header: '<center><h5>Judul Acara</h5></center><hr>',
                suggestion: function (context) {
                    return '<p>Judul : ' + context.title_ind + '</p>';
                },
            }
        });
        $('input.typeahead3-ajax').bind('typeahead:select', function (ev, suggestion) {
            console.log(suggestion);
            $('#acara3').val(suggestion.id);
        });
    })
</script>