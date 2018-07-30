<h3 style="text-align: center">
    Data Pengguna
</h3>
<table width="100%" class="table table-hover table-bordered">
    <thead>
        <tr>
            <th width="50">No</th>
            <th><?= __("Username") ?></th>
            <th><?= __("Nama Depan") ?></th>
            <th><?= __("Nama Belakang") ?></th>
            <th><?= __("Email") ?></th>
            <th><?= __("User Group") ?></th>
            <th><?= __("Alamat") ?></th>
            <th><?= __("No. Handphone") ?></th>
            <th><?= __("Status Pengguna") ?></th>
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
                <td><?= $item['User']['username'] ?></td>
                <td><?= $item['Biodata']['first_name'] ?></td>
                <td><?= $item['Biodata']['last_name'] ?></td>
                <td><?= $item['User']['email'] ?></td>
                <td><?= $userGroups[$item['User']['user_group_id']] ?></td>
                <td><?= $item['Biodata']['address'] ?></td>
                <td><?= $item['Biodata']['handphone'] ?></td>
                <td><?= $item['AccountStatus']['name'] ?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>