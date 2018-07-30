<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/event");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA EVENT") ?>
                <div class="pull-right">
                    <button class="btn btn-xs btn-default" type="button" onclick="exp('print', '<?php echo Router::url("index/print?" . $_SERVER['QUERY_STRING'], true) ?>')">
                        <i class="icon-print2"></i> 
                        <?= __("Cetak") ?>
                    </button>&nbsp;
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#multipledelete" type="button" href="<?php echo Router::url('/admin/popups/content?content=confirm', true); ?>">
                        <i class="icon-file-remove"></i> 
                        <?= __("Hapus Data") ?>
                    </button>&nbsp;
                    <a href="<?= Router::url("/admin/{$this->params['controller']}/add", true) ?>">
                        <button class="btn btn-xs btn-success" type="button">
                            <i class="icon-file-plus"></i>
                            <?= __("Tambah Data") ?>
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
                            <th><?= __("Event") ?></th>
                            <th><?= __("Sinopsis") ?></th>
                            <th><?= __("Tanggal") ?></th>
                            <th><?= __("Waktu") ?></th>
                            <th><?= __("Latitude") ?></th>
                            <th><?= __("Longitude") ?></th>
                            <!--<th><? __("Rating") ?></th>-->
                            <th><?= __("Sponsor") ?></th>
                            <th><?= __("Status") ?></th>
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
                                <td id="event-title"><?= $item['Event']['title_ind'] ?></td>
                                <td id="event-sinopsys"><?= $item['Event']['sinopsys_ind'] ?></td>
                                <td><?= $this->Html->cvtTanggal($item['Event']['date']) ?></td>
                                <td><?= $item['Event']['time'] ?></td>
                                <td><?= $item['Event']['latitude'] ?></td>
                                <td><?= $item['Event']['longitude'] ?></td>
                                <!--<td><? $item['Event']['rating'] ?></td>-->
                                <td class="text-center">
                                <?php
                                if ($item['Event']['is_sponsor'] == 1) {
                                    echo "Ya";
                                } else {
                                    echo "Tidak";
                                }
                                ?>
                                </td>
                                <td><?= $item['EventStatus']['name'] ?></td>
                                <td class="text-center">
                                    <a href="<?= Router::url("/admin/{$this->params['controller']}/view/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Detail"><i class="icon-file"></i></button></a>
                                    <a href="<?= Router::url("/admin/{$this->params['controller']}/edit/{$item[Inflector::classify($this->params['controller'])]['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Ubah"><i class="icon-pencil"></i></button></a>
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
    window.fbAsyncInit = function () {
        FB.init({
            appId: '483298191871288',
            xfbml: true,
            version: 'v2.5'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function shareFacebook(id) {
        FB.ui(
                {
                    method: 'feed',
                    name: 'Makassar Terkini',
                    link: 'https://www.google.com/',
                    picture: 'http://www.hyperarts.com/external-xfbml/share-image.gif',
                    caption: $("#row-" + id + " #event-title").html(),
                    description: $("#row-" + id + " #event-sinopsys").html(),
                    message: ''
                }, function (response) {
            if (response && !response.error_message) {
                alert('Posting completed.');
            }
        }
        );
    }
</script>

