<form action="#" role="form" class="panel-filter">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title">Filter Data</h6>
            <div class="panel-icons-group"> <a href="#" data-panel="collapse" class="btn btn-link btn-icon"><i class="icon-arrow-up9"></i></a></div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label><?= __("Judul") ?></label>
                        <input type="text" name="News.title_ind" placeholder="<?= __("") ?>" class="form-control tip">
                    </div>
                    <div class="col-md-4">
                        <label><?= __("Kategori Berita") ?></label>
                        <?= $this->Form->input(null, ['label' => false, "div" => false, 'options' => $newsCategories, "name" => "select.News.news_category_id", "class" => "form-control tip", "empty" => "--" . __("Pilih Kategori Berita") . "--"]) ?>
                    </div>
                    <div class="col-md-4">
                        <div class="has-feedback">
                            <label ><?= __("Author") ?></label>
                            <input type="text" placeholder="cari author" class="form-control typeahead-ajax">
                            <input type="hidden" name="News.author_id" id="author">
                            <i class="icon-search3 form-control-feedback"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="has-feedback">
                            <label><?= __("Editor") ?></label>
                            <input type="text" placeholder="cari editor" class="form-control typeahead2-ajax">
                            <input type="hidden" name="News.editor_id" id="editor">
                            <i class="icon-search3 form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="has-feedback">
                            <label ><?= __("Publisher") ?></label>
                            <input type="text" placeholder="cari publisher" class="form-control typeahead3-ajax">
                            <input type="hidden" name="News.publisher_id" id="publisher">
                            <i class="icon-search3 form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label><?= __("Status") ?></label>
                        <?= $this->Form->input(null, ['label' => false, "div" => false, 'options' => $newsStatuses, "name" => "select.News.news_status_id", "class" => "form-control tip", "empty" => "--" . __("Pilih Status") . "--"]) ?>
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
<script>
    $(document).ready(function () {
        // cari author
        var author = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('full_name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?= Router::url("/admin/accounts/list", true) ?>',
            remote: {
                url: '<?= Router::url("/admin/accounts/list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
            }
        });
        author.initialize();
        $('input.typeahead-ajax').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'author',
            display: 'full_name',
            source: author.ttAdapter(),
            templates: {
                header: '<center><h5>Data Author</h5></center><hr>',
                suggestion: function (context) {
                    return '<p> Nama : ' + context.full_name + '</p>';
                },
            }
        });
        $('input.typeahead-ajax').bind('typeahead:select', function (ev, suggestion) {
            console.log(suggestion);
            $('#author').val(suggestion.id);
        });
        
        // cari editor
        var editor = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('full_name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?= Router::url("/admin/accounts/list", true) ?>',
            remote: {
                url: '<?= Router::url("/admin/accounts/list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
            }
        });
        editor.initialize();
        $('input.typeahead2-ajax').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'editor',
            display: 'full_name',
            source: editor.ttAdapter(),
            templates: {
                header: '<center><h5>Data Editor</h5></center><hr>',
                suggestion: function (context) {
                    return '<p> Nama : ' + context.full_name + '</p>';
                },
            }
        });
        $('input.typeahead2-ajax').bind('typeahead:select', function (ev, suggestion) {
            console.log(suggestion);
            $('#editor').val(suggestion.id);
        });
        
        // cari publisher
        var publisher = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('full_name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '<?= Router::url("/admin/accounts/list", true) ?>',
            remote: {
                url: '<?= Router::url("/admin/accounts/list", true) ?>' + '?q=%QUERY',
                wildcard: '%QUERY',
            }
        });
        publisher.initialize();
        $('input.typeahead3-ajax').typeahead({
            hint: false,
            highlight: true
        }, {
            name: 'publisher',
            display: 'full_name',
            source: publisher.ttAdapter(),
            templates: {
                header: '<center><h5>Data Publisher</h5></center><hr>',
                suggestion: function (context) {
                    return '<p> Nama : ' + context.full_name + '</p>';
                },
            }
        });
        $('input.typeahead3-ajax').bind('typeahead:select', function (ev, suggestion) {
            console.log(suggestion);
            $('#publisher').val(suggestion.id);
        });
    })
</script>
