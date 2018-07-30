<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/news");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA BERITA")?>
                <div class="pull-right">
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('print', '<?php echo Router::url("index/print?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-print2"></i> 
                        <?= __("Cetak")?>
                    </button>&nbsp;
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#multipledelete" type="button" href="<?php echo Router::url('/admin/popups/content?content=confirm', true); ?>">
                        <i class="icon-file-remove"></i> 
                        <?= __("Hapus Data")?>
                    </button>&nbsp;
                    <?php
                        if($this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Author" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Super Admin") {
                    ?>
                            <a href="<?= Router::url("/admin/{$this->params['controller']}/add_news_article", true) ?>">
                                <button class="btn btn-xs btn-success" type="button">
                                    <i class="icon-file-plus"></i>
                                    <?= __("Tambah Berita Artikel")?>
                                </button>
                            </a>
                            <a href="<?= Router::url("/admin/{$this->params['controller']}/add_news_photo", true) ?>">
                                <button class="btn btn-xs btn-success" type="button">
                                    <i class="icon-file-plus"></i>
                                    <?= __("Tambah Berita Foto")?>
                                </button>
                            </a>
                            <a href="<?= Router::url("/admin/{$this->params['controller']}/add_news_video", true) ?>">
                                <button class="btn btn-xs btn-success" type="button">
                                    <i class="icon-file-plus"></i>
                                    <?= __("Tambah Berita Video")?>
                                </button>
                            </a>
                    <?php
                        }
                    ?>
                </div>
                <small class="display-block"></small>
            </h6>
        </div>
        <div class="table-responsive pre-scrollable stn-table">
            <form id="checkboxForm" method="post" name="checkboxForm" action="<?php echo Router::url('/' . $this->params['prefix'] . '/' . $this->params['controller'] . '/multiple_delete_news', true); ?>">
                <table width="100%" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="50"><input type="checkbox" class="styled checkall"/></th>
                            <th width="50">No</th>
                            <th><?= __("Judul Berita Bahasa Indonesia") ?></th>
                            <th><?= __("Kategori") ?></th>
                            <th><?= __("Jenis Berita") ?></th>
                            <th><?= __("Author") ?></th>
                            <th><?= __("Editor") ?></th>
                            <th><?= __("Publisher") ?></th>
                            <th><?= __("Sponsor") ?></th>
                            <th><?= __("Citizen Report") ?></th>
                            <th><?= __("Berita Rekomendasi") ?></th>
                            <th width="160"><?= __("Status") ?></th>
                            <th><?= __("Keterangan") ?></th>
                            <th width="125"><?= __("Aksi") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $limit = intval(isset($this->params['named']['limit']) ? $this->params['named']['limit'] : 10);
                        $page = intval(isset($this->params['named']['page']) ? $this->params['named']['page'] : 1);
                        $i = ($limit * $page) - ($limit - 1);
                        foreach ($data['rows'] as $item) {
                            ?>
                            <tr id="row-<?= $i ?>" class="removeRow<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>">
                                <td class="text-center"><input type="checkbox" name="data[<?php echo Inflector::classify($this->params['controller']) ?>][checkbox][]" value="<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>"  id="checkBoxRow" class="styled checkboxDeleteRow" /></td>
                                <td class="text-center"><?= $i ?></td>
                                <td id="news-title"><?= $item['News']['title_ind'] ?></td>
                                <td class="text-center"><?= $item['NewsCategory']['name'] ?></td>
                                <td class="text-center"><?= $item['NewsType']['name'] ?></td>
                                <td class="text-center"><?= e_isset(@$item['Author']['Biodata']['full_name']) ?></td>
                                <td class="text-center"><?= e_isset(@$item['Editor']['Biodata']['full_name'])?></td>
                                <td class="text-center"><?= e_isset(@$item['Publisher']['Biodata']['full_name']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($item['News']['is_sponsor'] == 1) {
                                        echo "Ya";
                                    } else {
                                        echo "Tidak";
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($item['News']['is_citizen_report'] == 1) {
                                        echo "Ya";
                                    } else {
                                        echo "Tidak";
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($item['News']['is_recommended'] == 1) {
                                        echo "Ya";
                                    } else {
                                        echo "Tidak";
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                        if($this->Session->read("credential.admin.User.user_group_id") == 1) {
                                            echo $this->Html->changeStatusSelect($item['News']['id'], ClassRegistry::init("NewsStatus")->find("list", array("fields" => array("NewsStatus.id", "NewsStatus.name"))), $item['News']['news_status_id'], Router::url("/admin/news/change_status"), null);
                                        } else if($this->Session->read("credential.admin.User.user_group_id") == 6) {
                                            echo $item['NewsStatus']['name'];
                                    ?>
                                    <?php
                                        } else if($this->Session->read("credential.admin.User.user_group_id") == 5) {
                                            echo $this->Html->changeStatusSelect($item['News']['id'], ClassRegistry::init("NewsStatus")->find("list", array("conditions" => array("NewsStatus.id" => array(2,4)), "fields" => array("NewsStatus.id", "NewsStatus.name"))), $item['News']['news_status_id'], Router::url("/admin/news/change_status"), null);
                                        } else if($this->Session->read("credential.admin.User.user_group_id") == 7) {
                                            echo $this->Html->changeStatusSelect($item['News']['id'], ClassRegistry::init("NewsStatus")->find("list", array("conditions" => array("NewsStatus.id" => array(3,4)), "fields" => array("NewsStatus.id", "NewsStatus.name"))), $item['News']['news_status_id'], Router::url("/admin/news/change_status"), null);
                                        } else if($this->Session->read("credential.admin.User.user_group_id") == 8) {
                                            echo $this->Html->changeStatusSelect($item['News']['id'], ClassRegistry::init("NewsStatus")->find("list", array("conditions" => array("NewsStatus.id" => array(2,3,4)), "fields" => array("NewsStatus.id", "NewsStatus.name"))), $item['News']['news_status_id'], Router::url("/admin/news/change_status"), null);
                                        }
                                    ?>
                                </td>
                                <td class="text-center"><?= $item['News']['keterangan'] ?></td>
                                <td class="text-center">
                                    <?php
                                        if($item['News']['news_type_id'] == 1) {
                                    ?>
                                            <a href="<?= Router::url("/admin/{$this->params['controller']}/view_news_article/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
                                            <?php
                                                if($this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Editor" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Super Admin" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Editor Dan Publisher" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Author") {
                                            ?>
                                                <a href="<?= Router::url("/admin/{$this->params['controller']}/edit_news_article/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Ubah"><i class="icon-pencil"></i></button></a>
                                            <?php
                                                }
                                        } else if($item['News']['news_type_id'] == 2) {
                                            ?>
                                                <a href="<?= Router::url("/admin/{$this->params['controller']}/view_news_photo/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
                                            <?php
                                                if($this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Editor" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Super Admin" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Editor Dan Publisher" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Author") {
                                            ?>
                                                <a href="<?= Router::url("/admin/{$this->params['controller']}/edit_news_photo/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Ubah"><i class="icon-pencil"></i></button></a>
                                            <?php
                                                }
                                        } else {
                                         ?>
                                                <a href="<?= Router::url("/admin/{$this->params['controller']}/view_news_video/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
                                            <?php
                                                if($this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Editor" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Super Admin" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Editor Dan Publisher" || $this->Echo->userGroup($this->Session->read("credential.admin.User.user_group_id")) == "Author") {
                                            ?>
                                                <a href="<?= Router::url("/admin/{$this->params['controller']}/edit_news_video/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Ubah"><i class="icon-pencil"></i></button></a>
                                            <?php
                                                }
                                        }
                                        ?>
                                    <button type="button" class="btn btn-default btn-xs btn-icon tip" title="Share Facebook" onclick="shareFacebook(<?= $i ?>)"><i class="icon-share"></i></button>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <?php echo $this->element(_TEMPLATE_DIR . "/{$template}/pagination") ?>
</div>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '483298191871288',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   function shareFacebook(id) {
       FB.ui(
            {
             method: 'feed',
             name: 'Makassar Terkini',
             link: ' http://www.google.com/',
             picture: 'http://www.hyperarts.com/external-xfbml/share-image.gif',
             caption: $("#row-"+id+" #news-title").html(),
             description: $("#row-"+id+" #news-sinopsys").html(),
             message: ''
           }, function(response){
                if (response && !response.error_message) {
                    alert('Posting completed.');
                }
           }
       );
   }
</script>

