<script type="text/x-handlebars-template" id="mobile-citizen-report-nodes">
    {{#each news}}
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
        <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                <a href="{{mobileReferNews type id title}}">
                    <img src="{{imgsrc}}" />
                </a>
            </div>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro center-news">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle">
                        <a href="{{mobileReferNews type id title}}">
                            {{title}}
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam font-openSans flex">
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="col-md-12 col-sm-12 col-xs-12 galleryText-time">
                                <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true) ?>" />
                                {{news-timeago newsdate}} yang lalu
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-userGray.png", true)?>" />
                            {{author}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{/each}}   
</script>