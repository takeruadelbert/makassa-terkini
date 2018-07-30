<?php echo $this->Form->create("DataCustomer", array("class" => "form-horizontal form-separate", "action" => "edit", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Edit Data Pelanggan") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Pelanggan") ?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("DataCustomer.name", __("Nama Pelanggan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("DataCustomer.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                    ?>
                                </div>
                            </td>
                        </tr>       
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("DataCustomer.gender_id", __("Jenis Kelamin"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("DataCustomer.gender_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Jenis Kelamin --"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("DataCustomer.country_id", __("Negara"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("DataCustomer.country_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("DataCustomer.state_id", __("Provinsi"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("DataCustomer.state_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control city-state", "data-city-state-target" => ".city-state-target", "empty" => "-- Pilih Provinsi --"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("DataCustomer.city_id", __("Kota"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("DataCustomer.city_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control city-state-target", "empty" => "-- Pilih Kota --"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("DataCustomer.phone", __("Nomor Telepon/HP"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("DataCustomer.phone", array("onkeydown" => "return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46;", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
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
    </div>
</div>
<?php echo $this->Form->end() ?>