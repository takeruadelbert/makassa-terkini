<h3 style="text-align: center">
    Komnetar Acara
</h3>
<table width="100%" class="table table-hover table-bordered">
    <thead>
        <tr>
            <th width="50">No</th>
            <th><?= __("Nama Komentar") ?></th>
            <th><?= __("Komentar") ?></th>
            <th><?= __("Status") ?></th>
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
                <td class="text-center"><?= $i ?></td>
                <td><?= $item['EventComment']['comentator_name'] ?></td>
                <td><?= $this->Echo->empty_strip($item['EventComment']['comment']) ?></td>
                <td><?= $item['CommentStatus']['name'] ?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>