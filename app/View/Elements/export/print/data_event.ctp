<h3 style="text-align: center">
    Acara
</h3>
<table width="100%" class="table table-hover table-bordered">
    <thead>
        <tr>
            <th width="50">No</th>
            <th><?= __("Event") ?></th>
            <th><?= __("Sinopsis") ?></th>
            <th><?= __("Tanggal") ?></th>
            <th><?= __("Waktu") ?></th>
            <th><?= __("Latitude") ?></th>
            <th><?= __("Longitude") ?></th>
            <th><?= __("Sponsor") ?></th>
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
                <td id="event-title"><?= $item['Event']['title_ind'] ?></td>
                <td id="event-sinopsys"><?= $item['Event']['sinopsys_ind'] ?></td>
                <td><?= $this->Html->cvtTanggal($item['Event']['date']) ?></td>
                <td><?= $item['Event']['time'] ?></td>
                <td><?= $item['Event']['latitude'] ?></td>
                <td><?= $item['Event']['longitude'] ?></td>
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
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>