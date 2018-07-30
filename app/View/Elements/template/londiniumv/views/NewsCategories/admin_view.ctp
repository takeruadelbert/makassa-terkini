<?php echo $this->Form->create("NewsCategory", array("class" => "form-horizontal form-separate", "action" => "view", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Lihat Subkategori Berita") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Subkategori Berita")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("NewsCategory.name", __("Subkategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("NewsCategory.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled" => true));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("NewsCategory.parent_id", __("Jenis Subkategori"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("NewsCategory.parent_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control","disabled" => true));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("NewsCategory.uniq", __("Nama Unik Subkategori"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("NewsCategory.uniq", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("NewsCategory.color", __("Warna"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    ?>
                                    <div class="col-sm-1 col-md-1">
                                        <input type="color" class="form-control" name="data[NewsCategory][color]" value="<?= empty($this->data['NewsCategory']['color']) ? "" : $this->data['NewsCategory']['color'] ?>" disabled>                                        
                                    </div>
                                    <span class="help-block">* warna digunakan untuk ditampilan di front-end.</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("NewsCategory.gambar", __("Logo"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    ?>
                                    <div class="col-md-4"> </div>
                                    <div class="col-md-8">
                                        <?php
                                        if(!empty($this->data['NewsCategory']['logo_path'])) {
                                        ?>
                                        <img id="gambar" src = "<?php echo Router::url($this->data['NewsCategory']['logo_path'], true) ?>" type="file" width="100"/>
                                        <?php
                                        } else {
                                            echo "Belum ada logo.";
                                        }
                                        ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>