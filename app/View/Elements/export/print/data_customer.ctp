<h3 style="text-align: center">
    Data Pelanggan
</h3>
<table width="100%" class="table table-hover table-bordered">
    <thead>
        <tr>
            <th width="50">No</th>
            <th><?= __("Nama Pelanggan") ?></th>
            <th><?= __("Jenis Kelamin") ?></th>
            <th><?= __("Kota") ?></th>
            <th><?= __("Provinsi") ?></th>
            <th><?= __("Negara") ?></th>
            <th><?= __("Nomor Telepon/HP") ?></th>
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
                <td class="text-center"><?= $item['DataCustomer']['name'] ?></td>
                <td class="text-center"><?= $item['Gender']['name'] ?></td>
                <td class="text-center"><?= $item['City']['name'] ?></td>
                <td class="text-center"><?= $item['State']['name'] ?></td>
                <td class="text-center"><?= $item['Country']['name'] ?></td>
                <td class="text-center"><?= $item['DataCustomer']['phone'] ?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>