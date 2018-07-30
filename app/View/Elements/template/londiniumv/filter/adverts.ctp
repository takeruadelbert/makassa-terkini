<form action="#" role="form" class="panel-filter">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title">Filter Data</h6>
            <div class="panel-icons-group"> <a href="#" data-panel="collapse" class="btn btn-link btn-icon"><i class="icon-arrow-up9"></i></a></div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label><?= __("Posisi Iklan") ?></label>
                        <?= $this->Form->input(null, ['label' => false, "div" => false, 'options' => $advertPositions, "name" => "select.Advert.advert_position_id", "class" => "form-control tip", "empty" => "--" . __("Pilih Posisi Iklan") . "--"]) ?>
                    </div>
                    <div class="col-md-6">
                        <label><?= __("Ukuran Iklan") ?></label>
                        <?= $this->Form->input(null, ['label' => false, "div" => false, 'options' => $advertTypes, "name" => "select.Advert.advert_type_id", "class" => "form-control tip", "empty" => "--" . __("Pilih Ukuran Iklan") . "--"]) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label><?= __("Nama Pelanggan") ?></label>
                        <input type="text" name="DataCustomer.name" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                    <div class="col-md-6">
                        <label><?= __("Status Iklan") ?></label>
                        <?= $this->Form->input(null, ['label' => false, "div" => false, 'options' => $advertStatuses, "name" => "select.Advert.advert_status_id", "class" => "form-control tip", "empty" => "--" . __("Pilih Status Iklan") . "--"]) ?>
                    </div>
                </div>
            </div>
            <div class="form-actions text-center">
                <input type="button" value="<?= __("Reset") ?>" class="btn btn-danger btn-filter-reset">
                <input type="button" value="<?= __("Cari") ?>" class="btn btn-info btn-filter">
            </div>
        </div>
    </div>
</form>
<script>
    filterReload();
</script>
