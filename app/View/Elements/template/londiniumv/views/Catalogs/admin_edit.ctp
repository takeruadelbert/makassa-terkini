<?php echo $this->Form->create("Catalog", array("class" => "form-horizontal form-separate", "action" => "edit", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("Ubah Pedoman") ?>
            </h6>
        </div>
        <div class="table-responsive">
            <table width="100%" class="table">
                <div class="panel-heading" style="background:#2179cc">
                    <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Header & Footer Pedoman") ?></h6>
                </div>
                <tr>
                    <td colspan="3" style="width:200px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Catalog.header", __("Header"), array("class" => "col-sm-8 control-label"));
                                    echo $this->Form->input("Catalog.header", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Catalog.footer", __("Footer"), array("class" => "col-sm-8 control-label"));
                                    echo $this->Form->input("Catalog.footer", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                    ?>
                                </div>
                            </div>
                        </div>                        
                    </td>
                </tr>
            </table>
            <?php
            $i = 1;
            foreach($this->data['CatalogDetail'] as $k => $details) {
            ?>
            <table width="100%" class="table" id="table-<?= $i ?>">
                <tbody id="target-data-pedoman">
                    <div class="panel-heading" style="background:#2179cc" id="header-<?= $i ?>">
                        <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Pedoman $i") ?></h6>
                    </div>                
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("CatalogDetail.$k.title", __("Judul"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("CatalogDetail.$k.title", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                        echo $this->Form->input("CatalogDetail.$k.id", array("type" => "hidden", "value" => $details['id']));
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-sm-3 col-md-4 control-label">
                                            <label>Judul Singkat</label>
                                        </div>
                                        <div class="col-sm-9 col-md-8">
                                            <input type="text" class="form-control" name="data[CatalogDetail][<?= $k ?>][uniq_title]" value="<?= !empty($details['uniq_title']) ? $details['uniq_title'] : "" ?>">
                                            <span class="help-block">Judul singkat ini ditampilkan pada judul tab (sebelah kanan) pada page pedoman.</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <?php
                                echo $this->Form->label("CatalogDetail.$k.content", __("Konten"), array("class" => "col-sm-8 control-label"));
                                echo $this->Form->input("CatalogDetail.$k.content", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                ?>
                            </div>                  
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="javascript:void(false)" onclick="deleteRow($('.table'), <?= $i ?>)"><i class="icon-remove3"></i></a>
                        </td>
                    </tr>
                    <?php
                    if($i == count($this->data['CatalogDetail'])) {
                    ?>
                    <tr>
                        <td>
                            <div class="form-actions text-right">
                                <a class="text-success" href="javascript:void(false)" onclick="addThisRow($(this), 'data-pedoman')" data-n="<?= $k ?>" data-i="<?= $i ?>"><i class="icon-plus-circle"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            $i++;
            }
            ?>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <div class="form-actions text-center">
                <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                <input type="reset" value="Reset" class="btn btn-info">
                <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>

<script>
    function deleteRow(e, id) {
        $("#table-" + id).remove();
        $("#header-" + id).remove();
        fixNumber("table");
    }
    function deleteThisRow(e, id) {
        e.find("#table-" + id).remove();
        e.find("#header-" + id).remove();
        fixNumber("table");
    }
    function addThisRow(e, t, optFunc) {
        var n = $(e).data("n") + 1;
        var i = $(e).data("i");
        var template = $('#tmpl-' + t).html();
        Mustache.parse(template);        
        var options = {i: i, n: n};
        if (typeof (optFunc) !== 'undefined') {
            $.extend(options, window[optFunc]());
        }
        var rendered = Mustache.render(template, options);
        
        $(".table:last-child #target-" + t + " tr:last").before(rendered);
        
        $(e).data("n", n + 1);
        $(e).data("i", i + 1);
        CKEDITOR.replace("konten" + n, {
            filebrowserBrowseUrl: BASE_URL + 'js/ckfinder/ckfinder.html',
            filebrowserUploadUrl: BASE_URL + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
        
        fixNumber($(e).parents("table"));
    }
    function fixNumber(e) {
        var i = <?= $i ?>;
        $.each($(".table").find(".test"), function () {
            $(this).find(".nomorIdx").html("Data Pedoman " + i);
            i++;
        })
    }
</script>
<script type="x-tmpl-mustache" id="tmpl-data-pedoman">
    <table width="100%" class="table" id="table-{{i}}">
        <div class="panel-heading test" id="header-{{i}}" style="background:#2179cc">
            <h6 class="panel-title nomorIdx" style=" color:#fff"><i class="icon-menu2"></i>Data Pedoman {{i}}</h6>
        </div>
        <tr>
            <td colspan="3" style="width:200px">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-sm-3 col-md-4 control-label">
                                <label>Judul</label>
                            </div>
                            <div class="col-sm-9 col-md-8">
                                <input type="text" class="form-control" name="data[CatalogDetail][{{n}}][title]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-sm-3 col-md-4 control-label">
                                <label>Judul Singkat</label>
                            </div>
                            <div class="col-sm-9 col-md-8">
                                <input type="text" class="form-control" name="data[CatalogDetail][{{n}}][uniq_title]">
                                <span class="help-block">Judul singkat ini ditampilkan pada judul tab (sebelah kanan) pada page pedoman.</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <div class="col-sm-8 control-label">
                        <label>Konten</label>
                    </div>
                    <div class="col-sm-12">
                        <textarea id="konten{{n}}" name="data[CatalogDetail][{{n}}][content]"></textarea>
                    </div>
                </div>           
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <a href="javascript:void(false)" onclick="deleteThisRow($('.table'), {{i}})"><i class="icon-remove3"></i></a>
            </td>
        </tr>
    </table>
</script>