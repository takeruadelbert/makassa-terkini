<?php echo $this->Form->create("NewsCategoryPreview", array("class" => "form-horizontal form-separate", "action" => "view", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
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
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Lihat Preview Kategori Berita")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("NewsCategoryPreview.name", __("Nama Preview Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("NewsCategoryPreview.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("Dummy.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("Dummy.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title", "empty" => "-- Pilih Kategori Berita --", "data-news-title-target" => ".news-title-target", "value" => $this->data['NewsCategoryPreviewDetail'][0]['News']['NewsCategory']['id'], "disabled"));
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
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][0][news_id]" disabled>
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
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][0][is_primary]" disabled value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox1-hidden" name="data[NewsCategoryPreviewDetail][0][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox1-hidden1" name="data[NewsCategoryPreviewDetail][0][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][1][news_id]" disabled>
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
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][1][is_primary]" disabled value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox2-hidden" name="data[NewsCategoryPreviewDetail][1][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox2-hidden2" name="data[NewsCategoryPreviewDetail][1][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][2][news_id]" disabled>
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
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][2][is_primary]" disabled value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox3-hidden" name="data[NewsCategoryPreviewDetail][2][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox3-hidden3" name="data[NewsCategoryPreviewDetail][2][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][3][news_id]" disabled>
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
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][3][is_primary]" disabled value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
                                                    <input type="hidden" id="checkbox4-hidden" name="data[NewsCategoryPreviewDetail][3][is_primary]" value="0" disabled>
                                                    <input type="hidden" id="checkbox4-hidden4" name="data[NewsCategoryPreviewDetail][3][is_primary]" value="1" disabled>
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[NewsCategoryPreviewDetail][4][news_id]" disabled>
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
                                                    <input type="checkbox" <?=$class?> id="checkbox1" name="data[NewsCategoryPreviewDetail][4][is_primary]" disabled value="<?= $checked == "" ? "0" : "1" ?>" onclick="addClassCheck(this)" <?= $checked ?>> <b>Default Primary</b> &nbsp;
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
                                        echo $this->Form->input("NewsCategoryPreview.showing_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Status Preview --", "disabled"));
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

<style>
    select{
        padding: 11px 50px 11px 10px;
        background: rgba(255,255,255,1);
        border-radius: 7px;
        -webkit-border-radius: 7px;
        -moz-border-radius: 7px;
        border: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        color: #8ba2d4;
    }
</style>