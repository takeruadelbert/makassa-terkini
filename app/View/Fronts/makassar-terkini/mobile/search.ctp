<!--Content-->
<!--==================================================-->
<section>
    <div class="container">
        <div class="row section-color">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-marginTop">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-backgroundSearch flex">
                            <div class="col-md-3 col-sm-3 col-xs-3 boxOut-searchText font-sourceSansProSemibold">
                                Search
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <form type="GET" action="<?= Router::url("/m/search") ?>"  class="input-group">
                                    <input type="text" class="form-control field-search font-sourceSansPro" placeholder="Cari berita di sini ..." name="term">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn button-search font-sourceSansProSemibold"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->element(_FRONT_TEMPLATE_DIR . DS . $frontTemplate . DS . "mobile" . DS . "node_pencarian_berita"); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {


        $.material.init();


        $(".scroll").waypoint({
            handler: function (direction) {
                if (direction == "down") {
                    var $this = $("#data-scroll");
                    var page = parseInt($this.data("current-page")) + 1;
                    var url = $this.data("url");
                    var limit = $this.data("limit");
                    var order = $this.data("order");
                    var templateE = $this.data("template");
                    var container = $this.data("container");
                    var term = $this.data("search");
                    var remove = $this.data("remove");
                    if (typeof $this.data("category") === "undefined") {
                        var category = "";
                    } else {
                        var category = $this.data("category");
                    }
                    $.ajax({
                        url: url,
                        data: {page: page, limit: limit, order: order, category: category, term: term},
                        dataType: "json",
                        type: "GET",
                        success: function (json) {
                            var templateNews = Handlebars.compile($(templateE).html(), {noEscape: true});
                            var result = templateNews({news: buildNewsData(json.data.items)});
                            $(container).append(result);
                            $this.data("current-page", page);
                            Waypoint.refreshAll();
                            if (json.data.pagination_info.endItem >= json.data.pagination_info.totalItem) {

                            }
                        }
                    });
                }
            },
            offset: 'bottom-in-view',
        })
    });
</script>