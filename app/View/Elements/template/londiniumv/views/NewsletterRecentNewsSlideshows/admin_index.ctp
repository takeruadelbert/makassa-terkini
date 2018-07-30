<?php echo $this->Form->create("NewsletterRecentNewsSlideshow", array("class" => "form-horizontal form-separate", "action" => "index", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Slideshow Newsletter Berita Terkini") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Slideshow Newsletter Berita Terkini")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="panel panel-default">                                    
                                    <div class="panel-body">
				        <div class="form-group">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("Dummy.0.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.0.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title", "empty" => "-- Pilih Kategori Berita --", "data-news-title-target" => ".news-title-target", "value" => $this->data[0]['News']['NewsCategory']['id']));
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <?php
                                                    if(!isset($this->data) || empty($this->data)) {
                                                    ?>
                                                    <select class="form-control news-title-target" name="data[NewsletterRecentNewsSlideshow][0][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                    </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <select class="form-control news-title-target" name="data[NewsletterRecentNewsSlideshow][0][news_id]">
                                                        <option value="<?= $this->data[0]['News']['id'] ?>"><?= $this->data[0]['News']['title_ind'] ?></option>
                                                        <?php
                                                            echo $this->Form->input("NewsletterRecentNewsSlideshow.0.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("Dummy.1.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.1.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title2", "empty" => "-- Pilih Kategori Berita --", "data-news-title2-target" => ".news-title2-target", "value" => $this->data[1]['News']['NewsCategory']['id']));
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <?php
                                                    if(!isset($this->data) || empty($this->data)) {
                                                    ?>
                                                    <select class="form-control news-title2-target" name="data[NewsletterRecentNewsSlideshow][1][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                    </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <select class="form-control news-title2-target" name="data[NewsletterRecentNewsSlideshow][1][news_id]">
                                                        <option value="<?= $this->data[1]['News']['id'] ?>"><?= $this->data[1]['News']['title_ind'] ?></option>
                                                        <?php
                                                            echo $this->Form->input("NewsletterRecentNewsSlideshow.1.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("Dummy.2.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                echo $this->Form->input("Dummy.2.news_category_id", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control news-title3", "empty" => "-- Pilih Kategori Berita --", "data-news-title3-target" => ".news-title3-target", "value" => $this->data[2]['News']['NewsCategory']['id']));
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <?php
                                                    if(!isset($this->data) || empty($this->data)) {
                                                    ?>
                                                    <select class="form-control news-title3-target" name="data[NewsletterRecentNewsSlideshow][2][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                    </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                    <select class="form-control news-title3-target" name="data[NewsletterRecentNewsSlideshow][2][news_id]">
                                                        <option value="<?= $this->data[2]['News']['id'] ?>"><?= $this->data[2]['News']['title_ind'] ?></option>
                                                        <?php
                                                            echo $this->Form->input("NewsletterRecentNewsSlideshow.2.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
				        </div>
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