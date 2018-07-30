<?php echo $this->Form->create("NewsCategoryPreview", array("class" => "form-horizontal form-separate", "action" => "edit", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Ubah Preview Kategori Berita") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Preview Kategori Berita")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("NewsCategoryPreview.name", __("Nama Preview Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("NewsCategoryPreview.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("Dummy.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("Dummy.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title", "empty" => "-- Pilih Kategori Berita --", "data-news-title-target" => ".news-title-target", "value" => $this->data['NewsCategoryPreviewDetail'][0]['News']['NewsCategory']['id']));
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#2179cc">
                                        <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Preview Berita")?></h6>
                                    </div>
                                    <div class="panel-body">
				        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][0][news_id]">
                                                        <option value="<?= $this->data['NewsCategoryPreviewDetail'][0]['News']['id'] ?>"><?= $this->data['NewsCategoryPreviewDetail'][0]['News']['title_ind'] ?></option>
                                                        <?php
                                                            echo $this->Form->input("NewsCategoryPreviewDetail.0.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                $checked = "";
                                                $class="";
                                                if($this->data['NewsCategoryPreviewDetail']['0']['is_primary'] == 1) {
                                                    $checked = "checked";
                                                    $class="class='marked'";
                                                }
                                                ?>
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][0][is_primary]" value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox1-hidden" name="data[NewsCategoryPreviewDetail][0][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox1-hidden1" name="data[NewsCategoryPreviewDetail][0][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][1][news_id]">
                                                        <option value="<?= $this->data['NewsCategoryPreviewDetail'][1]['News']['id'] ?>"><?= $this->data['NewsCategoryPreviewDetail'][1]['News']['title_ind'] ?></option>
                                                        <?php
                                                            echo $this->Form->input("NewsCategoryPreviewDetail.1.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                $checked = "";
                                                $class="";
                                                if($this->data['NewsCategoryPreviewDetail']['1']['is_primary'] == 1) {
                                                    $checked = "checked";
                                                    $class="class='marked'";
                                                }
                                                ?>
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][1][is_primary]" value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox2-hidden" name="data[NewsCategoryPreviewDetail][1][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox2-hidden2" name="data[NewsCategoryPreviewDetail][1][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][2][news_id]">
                                                        <option value="<?= $this->data['NewsCategoryPreviewDetail'][2]['News']['id'] ?>"><?= $this->data['NewsCategoryPreviewDetail'][2]['News']['title_ind'] ?></option>
                                                        <?php
                                                            echo $this->Form->input("NewsCategoryPreviewDetail.2.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                $checked = "";
                                                $class="";
                                                if($this->data['NewsCategoryPreviewDetail']['2']['is_primary'] == 1) {
                                                    $checked = "checked";
                                                    $class="class='marked'";
                                                }
                                                ?>
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][2][is_primary]" value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox3-hidden" name="data[NewsCategoryPreviewDetail][2][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox3-hidden3" name="data[NewsCategoryPreviewDetail][2][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][3][news_id]">
                                                        <option value="<?= $this->data['NewsCategoryPreviewDetail'][3]['News']['id'] ?>"><?= $this->data['NewsCategoryPreviewDetail'][3]['News']['title_ind'] ?></option>
                                                        <?php
                                                            echo $this->Form->input("NewsCategoryPreviewDetail.3.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                $checked = "";
                                                $class="";
                                                if($this->data['NewsCategoryPreviewDetail']['3']['is_primary'] == 1) {
                                                    $checked = "checked";
                                                    $class="class='marked'";
                                                }
                                                ?>
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][3][is_primary]" value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox4-hidden" name="data[NewsCategoryPreviewDetail][3][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox4-hidden4" name="data[NewsCategoryPreviewDetail][3][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][4][news_id]">
                                                        <option value="<?= $this->data['NewsCategoryPreviewDetail'][4]['News']['id'] ?>"><?= $this->data['NewsCategoryPreviewDetail'][4]['News']['title_ind'] ?></option>
                                                        <?php
                                                            echo $this->Form->input("NewsCategoryPreviewDetail.4.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                $checked = "";
                                                $class="";
                                                if($this->data['NewsCategoryPreviewDetail']['4']['is_primary'] == 1) {
                                                    $checked = "checked";
                                                    $class="class='marked'";
                                                }
                                                ?>
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][4][is_primary]" value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox5-hidden" name="data[NewsCategoryPreviewDetail][4][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox5-hidden5" name="data[NewsCategoryPreviewDetail][4][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
				    </div>
				</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("NewsCategoryPreview.showing_status_id", __("Status Preview Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("NewsCategoryPreview.showing_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control  news-title", "empty" => "-- Pilih Status Preview --"));
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
    function addClassCheck(element){

        if(element.checked){
            element.classList.add("marked");
        }else{
            element.classList.remove("marked");
        }

        if(document.getElementsByClassName("marked").length>1){
          alert("Silahkan pilih salah satu saja.");
            element.checked=false;
            element.classList.remove("marked");
        }

    }    
</script>
<script>
    $(document).ready(function() {
        $("#checkbox1").change(function() {
            if($('#checkbox1').is(':checked')) {
                $('#checkbox1-hidden').attr("disabled", "true");
                $('#checkbox1-hidden1').removeAttr("disabled");
            } else {
                $('#checkbox1-hidden').removeAttr("disabled");
                $('#checkbox1-hidden1').attr("disabled","true");
            }
        });

        $("#checkbox2").change(function() {
            if($('#checkbox2').is(':checked')) {
                $('#checkbox2-hidden').attr("disabled", "true");
                $('#checkbox2-hidden2').removeAttr("disabled");
            } else {
                $('#checkbox2-hidden').removeAttr("disabled");
                $('#checkbox2-hidden2').attr("disabled","true");
            }
        });

        $("#checkbox3").change(function() {
            if($('#checkbox3').is(':checked')) {
                $('#checkbox3-hidden').attr("disabled", "true");
                $('#checkbox3-hidden3').removeAttr("disabled");
            } else {
                $('#checkbox3-hidden').removeAttr("disabled");
                $('#checkbox3-hidden3').attr("disabled","true");
            }
        });
    });
</script>