<?php echo $this->Form->create("ModuleLink", array("class" => "form-horizontal form-separate", "action" => "edit", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Ubah Link Menu") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Link Menu")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                    echo $this->Form->label("name", __("Nama"), array("class" => "col-sm-3 col-md-4 control-label"));
                    echo $this->Form->input("name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                    echo $this->Form->label("alias", __("Alias"), array("class" => "col-sm-3 col-md-4 control-label"));
                    echo $this->Form->input("alias", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                    echo $this->Form->label("module_id", __("Modul"), array("class" => "col-sm-3 col-md-4 control-label"));
                    echo $this->Form->input("module_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "- Pilih Modul -"));
                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                    echo $this->Form->label("module_content_id", __("Konten Modul"), array("class" => "col-sm-3 col-md-4 control-label"));
                    echo $this->Form->input("module_content_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "- Pilih Konten Modul -"));
                    ?>
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
    $("#ModuleContentModuleId").bind("change", function () {
        getOptions("#ModuleContentParentId", BASE_URL + CONTROLLER + "/parents", "- Pilih Parent -", "#ModuleContentModuleId");
    })
</script>