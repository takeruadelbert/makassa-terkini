<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA HAK AKSES") ?>
                <small class="display-block"></small>
            </h6>
        </div>
        <div class="table-responsive pre-scrollable stn-table">
            <form id="checkboxForm" method="post" name="checkboxForm" action="<?php echo Router::url('/' . $this->params['prefix'] . '/' . $this->params['controller'] . '/multiple_delete', true); ?>">
                <table width="100%" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>User Group</th>
                            <th>Modul</th>
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
                            <tr id="row-<?= $i ?>">
                                <td class="text-center"><?= $i ?></td>
                                <td><?php echo $item['UserGroup']['name']; ?></td>
                                <td>
                                    <?php
                                    foreach ($item['Role'] as $role) {
                                        echo "<li>" . $role['Module']['name'] . "</li>";
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= Router::url("/admin/{$this->params['controller']}/edit/{$item['UserGroup']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Ubah"><i class="icon-pencil"></i></button></a>
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
