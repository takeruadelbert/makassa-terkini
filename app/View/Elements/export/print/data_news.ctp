<h3 style="text-align: center">
    Berita
</h3>
<table width="100%" class="table table-hover table-bordered">
    <thead>
        <tr>
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
                <td><?= $item['NewsStatus']['name'] ?></td>
                <td class="text-center"><?= $item['News']['keterangan'] ?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>