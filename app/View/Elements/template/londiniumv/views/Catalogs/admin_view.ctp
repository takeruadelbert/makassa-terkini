<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("Lihat Pedoman") ?>
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
                                    echo $this->Form->input("Catalog.header", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled"));
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Catalog.footer", __("Footer"), array("class" => "col-sm-8 control-label"));
                                    echo $this->Form->input("Catalog.footer", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled"));
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
                                        echo $this->Form->input("CatalogDetail.$k.title", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                        echo $this->Form->input("CatalogDetail.$k.id", array("type" => "hidden", "value" => $details['id']));
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-sm-3 col-md-4 control-label">
                                            <label>Judul Singkat</label>
                                        </div>
                                        <div class="col-sm-9 col-md-8">
                                            <input type="text" class="form-control" name="data[CatalogDetail][<?= $k ?>][uniq_title]" value="<?= !empty($details['uniq_title']) ? $details['uniq_title'] : "" ?>" disabled>
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
                                echo $this->Form->input("CatalogDetail.$k.content", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled"));
                                ?>
                            </div>                  
                        </td>
                    </tr>
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
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>