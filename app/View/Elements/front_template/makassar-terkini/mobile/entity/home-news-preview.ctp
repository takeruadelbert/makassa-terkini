<script type="text/x-handlebars-template" id="mobile-news-home-nodes">
    {{#each news}}
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita">
        <div class="col-md-4 col-sm-4 col-xs-4 boxOut-beritaFoto">
            <div class="col-md-12 col-sm-12 col-xs-12 box-beritaFoto">
                <a href="{{mobileReferNews type id title}}">
                    <img src="{{imgsrc}}"/>
                </a>
            </div>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8 boxOut-beritaTitle font-sourceSansPro center-news">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaTitle font-arial">
                        <a href="{{mobileReferNews type id title}}">
                            {{title}}
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaJam">
                        <div class="box-beritaKategori">
                            {{newscategory}}
                        </div>
                        <div class="box-beritaJamKategori">
                            {{news-timeago newsdate}} yang lalu
                        </div>
                    </div>
                </div>
                {{#if News.is_sponsor}}
                <div class="boxOut-beritaSponsor font-sourceSansProSemibold">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="sponsorTriangle center-block"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 box-beritaSponsor center flex">
                        <a href="#">
                            SPONSOR
                        </a>
                    </div>
                </div>
                {{/if}}
            </div>
        </div>
    </div>
    {{/each}}   
</script>