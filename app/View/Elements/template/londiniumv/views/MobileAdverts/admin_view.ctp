<?php echo $this->Form->create("MobileAdvert", array("class" => "form-horizontal form-separate", "type" => "file", "action" => "view", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Lihat Iklan Berita") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Iklan Berita")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("DataCustomer.name", __("Nama Pelanggan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("DataCustomer.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.0.gambar", __("Gambar Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.0.gambar", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "accept" => "image/*", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.banner_html", __("Banner HTML"), array("class" => "col-sm-8 control-label"));
                                    echo $this->Form->input("MobileAdvert.banner_html", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.google_adsense", __("Google AdSense"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.google_adsense", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "type" => "textarea", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.advert_type_id", __("Ukuran Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.advert_type_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Ukuran -- ", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.advert_status_id", __("Status Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.advert_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "- Pilih Status -", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.advert_position_id", __("Posisi Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.advert_position_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "- Pilih Status -", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.url", __("URL Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.start_date", __("Start Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.start_date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control daterangestart", "disabled"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.expired_date", __("Expired Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.expired_date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control daterangeend", "disabled"));
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