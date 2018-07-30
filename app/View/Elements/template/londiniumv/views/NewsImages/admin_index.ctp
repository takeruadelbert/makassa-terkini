<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/news-images");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA MENU")?>
                <div class="pull-right">
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('print', '<?php echo Router::url("index/print?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-print2"></i> 
                        <?= __("Cetak")?>
                    </button>&nbsp;
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('excel', '<?php echo Router::url("index/excel?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-file-excel"></i>
                        Excel
                    </button>&nbsp;
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('pdf', '<?php echo Router::url("index/pdf?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-file-pdf"></i>
                        PDF
                    </button>
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
                            <th><?= __("Judul Berita") ?></th>
                            <th><?= __("Sinopsis Berita") ?></th>
                            <th><?= __("Kategori Berita") ?></th>
                            <th><?= __("Deskripsi Foto") ?></th>
                            <th><?= __("Foto") ?></th>
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
                                <td><?= $item['News']['title_ind'] ?></td>
                                <td><?= $this->Echo->empty_strip($item['News']['sinopsys_ind']) ?></td>
                                <td class="text-center"><?= $item['News']['NewsCategory']['name'] ?></td>
                                <td><?= $this->Echo->empty_strip($item['NewsImage']['description']) ?></td>
                                <td> <img src="<?= Router::url($item['NewsImage']['path'], true) ?>" title="<?= $item['NewsImage']['description'] ?>" width="150" height="70"></td>
                                <td class="text-center">
                                    <a href="<?= Router::url("/admin/newsImages/view/{$item['NewsImage']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
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

