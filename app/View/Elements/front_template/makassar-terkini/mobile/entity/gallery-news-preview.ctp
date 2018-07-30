<script type="text/x-handlebars-template" id="gallery-news-home-nodes">
    {{#each news}}
    <div class="row row-boxPhotoList">
        <div class="col-md-12 col-sm-12 col-xs-12 box-photoList">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-photoTitle font-sourceSansProSemibold">
                    <a href="{{mobileReferNews type id title}}">
                        {{title}}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 galleryGray-time font-sourceSansPro">
                    {{#if News.is_sponsor}}
                        <div class="col-md-2 col-sm-2 col-xs-2 boxOut-sponsor">                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 gallerySponsor font-sourceSansProSemibold flex">                                                                            
                                    <a href="#">
                                        SPONSOR
                                    </a>                                                                            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="sponsorTriangle-down center-block"></div>
                                </div>
                            </div>
                        </div>
                    {{/if}}
                    <div class="col-md-10 col-sm-10 col-xs-10 gallerySponsor-time">
                        <img src="<?= Router::url("/front_file/makassar-terkini/mobile/img/icon/icon-clock-grey.png", true)?>" />
                        {{convertDate newsdate}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pictureGalleri">
                    <a href="{{mobileReferNews type id title}}">
                        <img src="{{imgsrc}}" />
                    </a>
                    <div class="gallery-count font-sourceSansProSemibold flex">
                        {{numimg}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{/each}}   
</script>