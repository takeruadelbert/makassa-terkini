<?php echo $this->Form->create("Slideshow", array("class" => "form-horizontal form-separate", "action" => "add", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Tambah Slideshow Berita") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Slideshow Berita")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("Slideshow.name", __("Nama Slideshow"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("Slideshow.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#2179cc">
                                        <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Slideshow Berita")?></h6>
                                    </div>
                                    <div class="panel-body">
				        <div class="form-group">
                                            <div class="col-md-5">
                                                <?php
                                                echo $this->Form->label("Dummy.0.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.0.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title", "empty" => "-- Pilih Kategori Berita --", "data-news-title-target" => ".news-title-target"));
                                                ?>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[SlideshowDetail][0][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" name="data[SlideshowDetail][0][is_primary]" value='1' onclick="addClassCheck(this)"> <b>Default Primary</b> &nbsp;
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <?php
                                                echo $this->Form->label("Dummy.1.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.1.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title2", "empty" => "-- Pilih Kategori Berita --", "data-news-title2-target" => ".news-title2-target"));
                                                ?>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title2-target" name="data[SlideshowDetail][1][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" name="data[SlideshowDetail][1][is_primary]" value='1' onclick="addClassCheck(this)"> <b>Default Primary</b> &nbsp;
                                                </label>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <?php
                                                echo $this->Form->label("Dummy.2.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.2.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title3", "empty" => "-- Pilih Kategori Berita --", "data-news-title3-target" => ".news-title3-target"));
                                                ?>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title3-target" name="data[SlideshowDetail][2][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="checkbox-inline checkbox-success">
                                                    <input type="checkbox" name="data[SlideshowDetail][2][is_primary]" value='1' onclick="addClassCheck(this)"> <b>Default Primary</b> &nbsp;
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
                                        echo $this->Form->label("Slideshow.slideshow_type_id", __("Tipe Slideshow"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("Slideshow.slideshow_type_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control", "empty" => "-- Pilih Tipe Slideshow --"));
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("Slideshow.showing_status_id", __("Status Slideshow"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("Slideshow.showing_status_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control  news-title", "empty" => "-- Pilih Status Slideshow --"));
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