<script type="text/x-handlebars-template" id="comments-preview-nodes">
    {{#each comments}}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 box-review">
            <div class="col-md-2 col-sm-2 col-xs-2 boxOut-pictureReview">
                <a href="#">
                    <img src="{{profilePicture}}">
                </a>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-10">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-nameReview">
                    <span class="review-name">
                        <a href="#">
                            {{comentatorName}}
                        </a>
                    </span>
                    <span class="review-time">
                        {{convertDate date}}
                    </span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-deskripsiReview">
                    {{comment}}
                </div>
            </div>
        </div>
    </div>
    {{/each}}
</script>