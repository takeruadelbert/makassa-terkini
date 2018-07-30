<?php echo $this->Form->create("SeeAlsoFeature", array("class" => "form-horizontal form-separate", "action" => "edit", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Ubah Fitur Baca Juga") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Fitur Baca Juga")?></h6>
                        </div>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("SeeAlsoFeature.name", __("Nama"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        echo $this->Form->input("SeeAlsoFeature.name", array("div" => array("class" => "col-sm-9 col-md-8"), "label" => false, "class" => "form-control"));
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->label("Dummy.news_category_id", __("Kategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                        ?>
                                        <div class="col-sm-9 col-md-8">
                                            <select class="form-control news-category" name="data[Dummy][news_category_id]" data-news-subcategory-target=".news-subcategory,.news-subcategory2,.news-subcategory3">
                                                <option>-- Pilih Kategori Berita --</option>
                                                <?php
                                                $categorySelected = "";
                                                foreach($parentCategory as $parent) {
                                                    if($parent['NewsCategory']['name'] == $category) {
                                                        $categorySelected = "selected";
                                                    } else {
                                                        $categorySelected = "";
                                                    }
                                                ?>
                                                <option value="<?= $parent['NewsCategory']['id'] ?>" <?= $categorySelected ?>><?= $parent['NewsCategory']['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
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
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("Dummy.0.news_subcategory_id", __("Subkategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                ?>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-subcategory" data-news-title-target=".news-title-target">
                                                        <option value="">-- Pilih Subkategori Berita --</option>
                                                        <?php
                                                        $subSelected1 = "";
                                                        foreach($subCategories as $sub1) {
                                                            if($sub1['NewsCategory']['name'] == $this->data['SeeAlsoFeatureDetail'][0]['News']['NewsCategory']['name']) {
                                                                $subSelected1 = "selected";
                                                            } else {
                                                                $subSelected1 = "";
                                                            }
                                                        ?>
                                                        <option value="<?= $sub1['NewsCategory']['id'] ?>" <?= $subSelected1 ?>><?= $sub1['NewsCategory']['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title-target" name="data[SeeAlsoFeatureDetail][0][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                        <?php
                                                        $selected1 = "";
                                                        foreach($newsTitle1 as $title1) {
                                                            if($title1['News']['id'] == $this->data['SeeAlsoFeatureDetail'][0]['News']['id']) {
                                                                $selected1 = "selected";
                                                            } else {
                                                                $selected1 = "";
                                                            }
                                                        ?>
                                                        <option value="<?= $title1['News']['id'] ?>" <?= $selected1 ?>><?= $title1['News']['title_ind'] ?></option>
                                                        <?php                                                   
                                                        }
                                                        ?>
                                                        <?php
                                                            echo $this->Form->input("SeeAlsoFeatureDetail.0.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("Dummy.1.news_subcategory_id", __("Subkategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                ?>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-subcategory2" data-news-title2-target=".news-title2-target">
                                                        <option value="">-- Pilih Subkategori Berita --</option>
                                                        <?php
                                                        $subSelected2 = "";
                                                        foreach($subCategories as $sub2) {
                                                            if($sub2['NewsCategory']['name'] == $this->data['SeeAlsoFeatureDetail'][1]['News']['NewsCategory']['name']) {
                                                                $subSelected2 = "selected";
                                                            } else {
                                                                $subSelected2 = "";
                                                            }
                                                        ?>
                                                        <option value="<?= $sub2['NewsCategory']['id'] ?>" <?= $subSelected2 ?>><?= $sub2['NewsCategory']['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title2-target" name="data[SeeAlsoFeatureDetail][1][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                        <?php
                                                        $selected2 = "";
                                                        foreach($newsTitle2 as $title2) {
                                                            if($title2['News']['id'] == $this->data['SeeAlsoFeatureDetail'][1]['News']['id']) {
                                                                $selected2 = "selected";
                                                            } else {
                                                                $selected2 = "";
                                                            }
                                                        ?>
                                                        <option value="<?= $title2['News']['id'] ?>" <?= $selected2 ?>><?= $title2['News']['title_ind'] ?></option>
                                                        <?php                                                   
                                                        }
                                                        ?>
                                                        <?php
                                                            echo $this->Form->input("SeeAlsoFeatureDetail.1.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
				        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->label("Dummy.2.news_subcategory_id", __("Subkategori Berita"), array("class" => "col-sm-3 col-md-4 control-label"));
                                                ?>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-subcategory3" data-news-title3-target=".news-title3-target">
                                                        <option value="">-- Pilih Subkategori Berita --</option>
                                                        <?php
                                                        $subSelected3 = "";
                                                        foreach($subCategories as $sub3) {
                                                            if($sub3['NewsCategory']['name'] == $this->data['SeeAlsoFeatureDetail'][2]['News']['NewsCategory']['name']) {
                                                                $subSelected3 = "selected";
                                                            } else {
                                                                $subSelected3 = "";
                                                            }
                                                        ?>
                                                        <option value="<?= $sub3['NewsCategory']['id'] ?>" <?= $subSelected3 ?>><?= $sub3['NewsCategory']['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label">Judul Berita</label>
                                                <div class="col-sm-9 col-md-8">
                                                    <select class="form-control news-title3-target" name="data[SeeAlsoFeatureDetail][2][news_id]">
                                                        <option value="">--Pilih Judul Berita--</option>
                                                        <?php
                                                        $selected3 = "";
                                                        foreach($newsTitle3 as $title3) {
                                                            if($title3['News']['id'] == $this->data['SeeAlsoFeatureDetail'][2]['News']['id']) {
                                                                $selected3 = "selected";
                                                            } else {
                                                                $selected3= "";
                                                            }
                                                        ?>
                                                        <option value="<?= $title3['News']['id'] ?>" <?= $selected3 ?>><?= $title3['News']['title_ind'] ?></option>
                                                        <?php                                                   
                                                        }
                                                        ?>
                                                        <?php
                                                            echo $this->Form->input("SeeAlsoFeatureDetail.2.id", array("type" => "hidden", "class" => "form-control"));
                                                        ?>
                                                    </select>
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