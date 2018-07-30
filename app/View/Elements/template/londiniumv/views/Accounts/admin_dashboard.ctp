<div class="table-responsive"><!--hhh--> 
    <?php
    if ($this->Session->read('credential.admin.User.UserGroup.name') == 'admin') {
        ?>
        <div class="well block">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#default-tab1" data-toggle="tab">Acara</a></li>
                    <li><a href="#default-tab2" data-toggle="tab">Berita</a></li>
                    <li><a href="#default-tab3" data-toggle="tab">Citizen Report</a></li>
                    <li><a href="#default-tab4" data-toggle="tab">Iklan</a></li>
                </ul>
                <div class="tab-content with-padding">
                    <div class="tab-pane fade in active" id="default-tab1">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Acara Terbaru<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="event-template" type="text/x-handlebars-template">
                                                {{#event}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-2 col-xl-2">
                                                <a href="{{referEvent Event.id Event.title_ind}}">
                                                <img src = "{{urlHelper EventImage.0.path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-10 col-xl-10">
                                                <div class = "task-description" ><a href="{{referEvent Event.id Event.title_ind}}">{{Event.title_ind}}</a><span>{{{Event.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate Event.date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/event}}
                                                {{^event}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada event<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/event}}
                                            </script>
                                            <div id = "event_main"></div>
                                            <div class="table-actions" style="float:right" id="target-pagination-events">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="default-tab2">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita Terbaru<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="news-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-4 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita terbaru<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "news_main"></div>
                                            <div class="table-actions" style="float:right" id="target-pagination-news">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita yang Telah Dipublish<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="newspublish-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-4 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita yang dipublish<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "newspublish_main"></div>
                                            <div class="table-actions" style="float:right" id="target-pagination-newspublish">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita yang Sudah Diubah<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="newsedit-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-4 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita yang diubah<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "newsedit_main"></div>

                                            <div class="table-actions" style="float:right" id="target-pagination-newsedit">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="default-tab3">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Citizen Report<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="citizen-template" type="text/x-handlebars-template">
                                                {{#citizen}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-2 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-10 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/citizen}}
                                                {{^citizen}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada citizen report<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/citizen}}
                                            </script>
                                            <div id = "citizen_main"></div>

                                            <div class="table-actions" style="float:right" id="target-pagination-citizen">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>    
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="default-tab4">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Advert Expired<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="advert-template" type="text/x-handlebars-template">
                                                {{#advert}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-10 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i> Iklan pada {{AdvertPosition.name}} akan expired<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/advert}}
                                                {{^advert}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada iklan yang akan expired<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/advert}}
                                            </script>
                                            <div id = "advert_main"></div>

                                            <div class="table-actions" style="float:right" id="target-pagination-advert">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                requestNews(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNews($this.data("page"));
                });
                requestEvent(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestEvent($this.data("page"));
                });
                requestCitizenReport(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestCitizenReport($this.data("page"));
                });
                requestAdvert(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestAdvert($this.data("page"));
                });
                requestNewsPublished(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNewsPublished($this.data("page"));
                });
                requestNewsEdit(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNewsEdit($this.data("page"));
                });
            })
        </script>
        <?php
    }
    ?>

    <?php
    if ($this->Session->read('credential.admin.User.UserGroup.name') == 'editor') {
        ?>
        <div class="well block">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#default-tab1" data-toggle="tab">Berita</a></li>
                </ul>
                <div class="tab-content with-padding">
                    <div class="tab-pane fade in active" id="default-tab1">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita Terbaru<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="news-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-3 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-9 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita terbaru<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "news_main"></div>
                                            <div class="table-actions" style="float:right" id="target-pagination-news">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita yang Sudah Diubah<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="newsedit-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-3 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-9 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita yang diubah<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "newsedit_main"></div>

                                            <div class="table-actions" style="float:right" id="target-pagination-newsedit">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                requestNews(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNews($this.data("page"));
                });
                requestNewsEdit(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNewsEdit($this.data("page"));
                });
            })
        </script>
        <?php
    }
    ?>
    <?php
    if ($this->Session->read('credential.admin.User.UserGroup.name') == 'publisher') {
        ?>
        <div class="well block">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#default-tab1" data-toggle="tab">Berita</a></li>
                </ul>
                <div class="tab-content with-padding">
                    <div class="tab-pane fade in active" id="default-tab1">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita yang Sudah Diubah<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="newsedit-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-3 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-9 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita yang diubah<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "newsedit_main"></div>

                                            <div class="table-actions" style="float:right" id="target-pagination-newsedit">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita yang Telah Dipublish<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="newspublish-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-4 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita yang dipublish<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "newspublish_main"></div>
                                            <div class="table-actions" style="float:right" id="target-pagination-newspublish">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                requestNewsPublished(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNewsPublished($this.data("page"));
                });
                requestNewsEdit(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNewsEdit($this.data("page"));
                });
            })
        </script>
        <?php
    }
    ?>

    <?php
    if ($this->Session->read('credential.admin.User.UserGroup.name') == 'editor dan publisher') {
        ?>
        <div class="well block">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#default-tab1" data-toggle="tab">Berita</a></li>
                </ul>
                <div class="tab-content with-padding">
                    <div class="tab-pane fade in active" id="default-tab1">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita Terbaru<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="news-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-4 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita terbaru<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "news_main"></div>
                                            <div class="table-actions" style="float:right" id="target-pagination-news">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita yang Telah Dipublish<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="newspublish-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-4 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita yang dipublish<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "newspublish_main"></div>
                                            <div class="table-actions" style="float:right" id="target-pagination-newspublish">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal form-separate" action="#" role="form">
                                    <div class="panel panel-default" style="display:block;overflow:auto;">
                                        <div class="panel-body">
                                            <div class="block-inner text-danger">
                                                <h6 class="heading-hr">Berita yang Sudah Diubah<small class="display-block">Makassar Terkini</small></h6>
                                            </div>
                                            <script id="newsedit-template" type="text/x-handlebars-template">
                                                {{#news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-4 col-xl-2">
                                                <a href="{{referNews News.news_type_id News.id News.title_ind}}">
                                                <img src = "{{urlHelper News.thumbnail_path}}" style = "width:105px;height:105px"/>
                                                </a>
                                                </div>
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><a href="{{referNews News.news_type_id News.id News.title_ind}}">{{News.title_ind}}</a><span>{{{News.sinopsys_ind}}}</span></div>
                                                </div>
                                                <div class= "col-md-12">
                                                <div class="task-info pull-right"><span>{{newDate News.publish_date}}</span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                                {{^news}}
                                                <div class = "block task task-high">
                                                <div class = "row with-padding" >
                                                <div class = "col-md-8 col-xl-10">
                                                <div class = "task-description" ><span><i class= "icon-warning"></i>Tidak ada berita yang diubah<i class= "icon-warning"></i></span></div>
                                                </div>
                                                </div>
                                                </div>
                                                {{/news}}
                                            </script>
                                            <div id = "newsedit_main"></div>

                                            <div class="table-actions" style="float:right" id="target-pagination-newsedit">
                                            </div>
                                            <script id="tmpl-pagination-dashboard" type="text/x-handlebars-template">
                                                <ul class="pagination">
                                                {{#prev}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Prev</a></li>
                                                {{/prev}}
                                                {{#buttonBefore}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonBefore}}
                                                {{#buttonCurrent}}
                                                <li class="active"><a href="{{href}}">{{number}}</a></li>
                                                {{/buttonCurrent}}
                                                {{#buttonAfter}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">{{number}}</a></li>
                                                {{/buttonAfter}}
                                                {{#next}}
                                                <li><a href="{{href}}" onclick="{{onclick}}">Next</a></li>
                                                {{/next}}
                                                </ul>
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                requestNews(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNews($this.data("page"));
                });
                requestNewsPublished(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNewsPublished($this.data("page"));
                });
                requestNewsEdit(1);
                $(".button-page").on("click", function () {
                    var $this = $(this);
                    requestNewsEdit($this.data("page"));
                });
            })
        </script>
        <?php
    }
    ?>
</div>