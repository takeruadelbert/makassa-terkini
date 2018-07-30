<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/news-category");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA KATEGORI BERITA")?>
                <div class="pull-right">
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#multipledelete" type="button" href="<?php echo Router::url('/admin/popups/content?content=confirm', true); ?>">
                        <i class="icon-file-remove"></i> 
                        <?= __("Hapus Data")?>
                    </button>&nbsp;
                    <a href="<?= Router::url("/admin/{$this->params['controller']}/add", true) ?>">
                        <button class="btn btn-xs btn-success" type="button">
                            <i class="icon-file-plus"></i>
                            <?= __("Tambah Data")?>
                        </button>
                    </a>
                </div>
                <small class="display-block"></small>
            </h6>
        </div>
        <div class="table-responsive pre-scrollable stn-table">
            <form id="checkboxForm" method="post" name="checkboxForm" action="<?php echo Router::url('/' . $this->params['prefix'] . '/' . $this->params['controller'] . '/multiple_delete', true); ?>">
                <table width="100%" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="50"><input type="checkbox" class="styled checkall"/></th>
                            <th width="50">No</th>
                            <th><?= __("Kategori Berita") ?></th>
                            <th><?= __("Nama Unik Kategori") ?></th>
                            <th><?= __("Parent Kategori") ?></th>
                            <th width="100"><?= __("Warna") ?></th>
                            <th width="100"><?= __("Aksi") ?></th>
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
                                <td><?= $this->Echo->empty_strip($item['NewsCategory']['name']) ?></td>
                                <td><?= $this->Echo->empty_strip($item['NewsCategory']['uniq']) ?></td>
                                <td>
                                    <?php 
                                        if($item['NewsCategory']['parent_id'] == null) {
                                            echo "-";
                                        } else {
                                            echo $item['Parent']['name'];
                                        }
                                    ?>
                                </td>
                                <td><input type="color" class="form-control" value="<?= empty($item['NewsCategory']['color']) ? "" : $item['NewsCategory']['color'] ?>" disabled></td>
                                <td class="text-center">
                                    <a href="<?= Router::url("/admin/{$this->params['controller']}/view/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
                                    <a href="<?= Router::url("/admin/{$this->params['controller']}/edit/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Ubah"><i class="icon-pencil"></i></button></a>
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

