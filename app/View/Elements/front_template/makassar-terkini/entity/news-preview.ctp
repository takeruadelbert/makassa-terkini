<script type="text/x-handlebars-template" id="news-preview-nodes">
    {{#each news}}
    <a href="{{referNews type id title}}" class="news-module-hor">
        <div class="news-module-hor-img">
            <img src="{{imgsrc}}">
        </div>

        <div class="news-module-hor-content font-sourceSansPro">
            <div class="news-module-hor-title">
            {{title}}
            </div>

            <div class="news-module-hor-etc">  
                <div class="news-module-hor-info pull-left">
                    {{newscategory}}
                </div>
                <div class="news-module-hor-info pull-left">
                    -
                </div>
                <div class="news-module-hor-time pull-left">
                    {{news-timeago newsdate}} yang lalu
                </div>
                {{#if News.is_sponsor}}
                    <div class="news-module-hor-tag pull-left">
                        SPONSOR
                    </div>
                {{/if}}
            </div>
            <div class="news-module-hor-desc">
                {{shortenText sinopsys}}
            </div>
        </div>
    </a>
    {{/each}}
</script>