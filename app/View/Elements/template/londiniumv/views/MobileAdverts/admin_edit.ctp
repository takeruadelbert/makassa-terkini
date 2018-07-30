<?php echo $this->Form->create("MobileAdvert", array("class" => "form-horizontal form-separate", "type" => "file", "action" => "edit", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Ubah Iklan Berita Mobile") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Iklan Berita Mobile") ?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">    
                                    <div class="has-feedback">
                                        <?php
                                        echo $this->Form->label("Dummy.nama_pelanggan", __("Nama Pelanggan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("Dummy.nama_pelanggan", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control typeahead2-ajax", "value" => !empty($this->data['DataCustomer']['name']) ? $this->data['DataCustomer']['name'] : ""));
                                        echo $this->Form->input("MobileAdvert.data_customer_id", array("type" => "hidden"));
                                        ?>
                                        <i class="icon-search3 form-control-feedback"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.0.gambar", __("Gambar Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.0.gambar", array("type" => "file", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "accept" => "image/*"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.banner_html", __("Banner HTML"), array("class" => "col-sm-8 control-label"));
                                    echo $this->Form->input("MobileAdvert.banner_html", array("div" => array("class" => "col-sm-12"), "label" => false, "class" => "form-control ckeditor-fix"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.google_adsense", __("Google AdSense"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.google_adsense", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "type" => "textarea"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.advert_type_id", __("Ukuran Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.advert_type_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "value" => "980x280", "type" => "text", "readonly"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.advert_status_id", __("Status Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.advert_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "- Pilih Status -"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.advert_position_id", __("Posisi Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.advert_position_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "- Pilih Status -"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.url", __("URL Iklan"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.url", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.start_date", __("Start Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.start_date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control daterangestart"));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("MobileAdvert.expired_date", __("Expired Date"), array("class" => "col-sm-3 col-md-4 control-label"));
                                    echo $this->Form->input("MobileAdvert.expired_date", array("type" => "text", "div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control daterangeend"));
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
<script>
    $(document).ready(function () {
        var data_customers = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?= Router::url("/admin/dataCustomers/list", true) ?>',
            remote: {
                url: '<?= Router::url("/admin/dataCustomers/list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
            }
        });
        data_customers.initialize();
        $('input.typeahead2-ajax').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'data_customers',
            display: 'nama',
            source: data_customers.ttAdapter(),
            templates: {
                header: '<center><h5>Data Pelanggan</h5></center><hr>',
                suggestion: function (context) {
                    return '<p> Nama : ' + context.nama + '</p>';
                },
            }
        });
        $('input.typeahead2-ajax').bind('typeahead:select', function (ev, suggestion) {
            console.log(suggestion);
            $('#MobileAdvertDataCustomerId').val(suggestion.id);
        });
    })
</script>