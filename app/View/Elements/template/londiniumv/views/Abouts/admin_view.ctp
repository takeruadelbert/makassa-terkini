<?php echo $this->Form->create("About", array("class" => "form-horizontal form-separate", "action" => "view", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("Lihat Tentang Kami") ?>
            </h6>
        </div>
        <div class="table-responsive">
            <table width="100%" class="table">
                <div class="panel-heading" style="background:#2179cc">
                    <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Tentang Kami") ?></h6>
                </div>
                <tr>
                    <td colspan="3" style="width:200px">
                        <div class="form-group">
                            <?php
                            echo $this->Form->label("About.title", __("Judul Header"), array("class" => "col-sm-3 col-md-4 control-label"));
                            echo $this->Form->input("About.title", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width:200px">
                        <div class="form-group">
                            <?php
                            echo $this->Form->label("About.content", __("Konten"), array("class" => "col-sm-8 control-label"));
                            echo $this->Form->input("About.content", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled"));
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
                <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                <input type="reset" value="Reset" class="btn btn-info">
                <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>