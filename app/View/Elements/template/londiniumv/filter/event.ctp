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
                        <label><?= __("Judul") ?></label>
                        <input type="text" name="Event.title_ind" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                    <div class="col-md-6">
                        <label ><?= __("Sinopsis") ?></label>
                        <input type="text" name="Event.sinopsys_ind" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label><?= __("Tanggal") ?></label>
                        <input type="date" name="Event.date" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                    <div class="col-md-6">
                        <label><?= __ ("Status") ?></label>
                        <?= $this->Form->input(null, ['label' => false, "div" => false, 'options' => $eventStatuses, "name" => "select.Event.event_status_id", "class" => "form-control tip","empty"=>"--".__("Pilih Status")."--"]) ?>
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
