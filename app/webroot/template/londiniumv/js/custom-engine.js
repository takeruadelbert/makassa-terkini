$(document).ready(function () {
    moment.locale("id");
    $.datetimepicker.setLocale("id");
    reloadDatePicker();
    tombolBeritaLaennya();
})

function reloadDatePicker() {
    $.datetimepicker.setDateFormatter({
        parseDate: function (date, format) {
            var d = moment(date, format);
            return d.isValid() ? d.toDate() : false;
        },
        formatDate: function (date, format) {
            return moment(date).format(format);
        }
    });
//    $(".idpck-slave").remove();
    $(".datepicker,.daterangestart,.daterangeend").each(function (i) {
        $this = $(this);
        var status = $this.data("status");
        if (status != "deploy") {
            if ($this.val() == "") {
                var val = "";
            } else {
                var val = moment($this.val()).format("Do MMMM YYYY");
            }
            var realVal = $this.val();
            var name = $(this).attr("name");
            var formattedName = "n" + i;
            $this.after("<input class='idpck-slave' type='hidden' value='" + realVal + "' id='idpck_" + formattedName + "' name='" + name + "'/>");
            $this.removeAttr("name").data("idpck-target", "idpck_" + formattedName).val(val);
            $this.data("status", "deploy");
        }
    })
    $(".datepicker").datetimepicker({
        timepicker: false,
        format: "Do MMMM YYYY",
        formatDate: 'Do MMMM YYYY',
        formatTime: "H:mm",
        yearStart: 1900,
        onSelectDate: function (dp, $input) {
            var targetId = $input.data("idpck-target");
            $("#" + targetId).val(moment($input.val(), "Do MMMM YYYY").format("YYYY-MM-DD"));
        },
    });
    $(".datetime").each(function (i) {
        $this = $(this);
        if ($this.val() == "") {
            var val = "";
        } else {
            var val = moment($this.val()).format("Do MMMM YYYY H:mm:ss");
        }
        var realVal = $this.val();
        var name = $(this).attr("name");
        var formattedName = "n" + i;
        $this.after("<input class='idpck-slave' type='hidden' value='" + realVal + "' id='idpck_" + formattedName + "' name='" + name + "'/>");
        $this.removeAttr("name").data("idpck-target", "idpck_" + formattedName).val(val);
    });
    $(".datetime").datetimepicker({
        format: "Do MMMM YYYY H:mm:ss",
        formatDate: 'Do MMMM YYYY',
        formatTime: "H:mm",
        step: 15,
        onSelectDate: function (dp, $input) {
            var targetId = $input.data("idpck-target");
            $("#" + targetId).val(moment($input.val(), "Do MMMM YYYY H:mm:ss").format("YYYY-MM-DD HH:mm:ss"));
        },
        onSelectTime: function (dp, $input) {
            var targetId = $input.data("idpck-target");
            $("#" + targetId).val(moment($input.val(), "Do MMMM YYYY H:mm:ss").format("YYYY-MM-DD HH:mm:ss"));
        },
        onChangeDateTime: function (dp, $input) {
            var targetId = $input.data("idpck-target");
            $("#" + targetId).val(moment($input.val(), "Do MMMM YYYY H:mm:ss").format("YYYY-MM-DD HH:mm:ss"));
        }
    });
    $(".timepicker").datetimepicker({
        format: "H:mm",
        formatDate: 'Do MMMM YYYY',
        formatTime: "H:mm",
        step: 15,
        datepicker: false,
    });
    $('.daterangestart').datetimepicker({
        timepicker: false,
        format: "Do MMMM YYYY",
        formatDate: 'Do MMMM YYYY',
        formatTime: "H:mm",
        onShow: function (ct) {
            this.setOptions({
                maxDate: $('.daterangeend').val() ? $('.daterangeend').val() : false
            })
        },
        onSelectDate: function (dp, $input) {
            var targetId = $input.data("idpck-target");
            $("#" + targetId).val(moment($input.val(), "Do MMMM YYYY").format("YYYY-MM-DD"));
        },
    });
    $('.daterangeend').datetimepicker({
        timepicker: false,
        format: "Do MMMM YYYY",
        formatDate: 'Do MMMM YYYY',
        formatTime: "H:mm",
        onShow: function (ct) {
            this.setOptions({
                minDate: $('.daterangestart').val() ? $('.daterangestart').val() : false
            })
        },
        onSelectDate: function (dp, $input) {
            var targetId = $input.data("idpck-target");
            $("#" + targetId).val(moment($input.val(), "Do MMMM YYYY").format("YYYY-MM-DD"));
        },
    });
}

function buildNewsData(json) {
    var result = [];
    $(json).each(function (k, v) {
        var news = {
            title: v.News.title_ind,
            sinopsys: v.News.sinopsys_ind,
            imgsrc: BASE_URL + v.News.thumbnail_path,
            href: BASE_URL + "/" + v.News.id + "/" + seoUrl(v.News.title_ind),
            publishdate: v.News.publish_date
        };
        result.push(news);
    })
    return result;
}

//https://gist.github.com/skattyadz/1285806
function timeAgo(time) {
    var units = [
        {name: "detik", limit: 60, in_seconds: 1},
        {name: "menit", limit: 3600, in_seconds: 60},
        {name: "jam", limit: 86400, in_seconds: 3600},
        {name: "hari", limit: 604800, in_seconds: 86400},
        {name: "minggu", limit: 2629743, in_seconds: 604800},
        {name: "bulan", limit: 31556926, in_seconds: 2629743},
        {name: "tahun", limit: null, in_seconds: 31556926}
    ];
    var diff = (new Date() - new Date(time)) / 1000;
    if (diff < 5)
        return "sekarang";

    var i = 0, unit;
    while (unit = units[i++]) {
        if (diff < unit.limit || !unit.limit) {
            var diff = Math.floor(diff / unit.in_seconds);
            return diff + " " + unit.name;
        }
    }
}

//http://stackoverflow.com/questions/14107522/producing-seo-friendly-url-in-javascript
function seoUrl(url) {

    // make the url lowercase         
    var encodedUrl = url.toString().toLowerCase();

    // replace & with and           
    encodedUrl = encodedUrl.split(/\&+/).join("-and-")

    // remove invalid characters 
    encodedUrl = encodedUrl.split(/[^a-z0-9]/).join("-");

    // remove duplicates 
    encodedUrl = encodedUrl.split(/-+/).join("-");

    // trim leading & trailing characters 
    encodedUrl = encodedUrl.trim('-');

    return encodedUrl;
}

function tombolBeritaLaennya() {
    $('.more-news').on('click', function (event) {
        var $this = $(this);
        event.preventDefault();
        var page = parseInt($this.data("current-page")) + 1;
        var url = $this.data("url");
        var limit = $this.data("limit");
        var order = $this.data("order");
        var templateE = $this.data("template");
        var container = $this.data("container");
        var remove = $this.data("remove");
        if (typeof $this.data("category") === "undefined") {
            var category = "";
        } else {
            var category = $this.data("category");
        }
        $.ajax({
            url: url,
            data: {page: page, limit: limit, order: order, category: category},
            dataType: "json",
            type: "GET",
            success: function (json) {
                var templateNews = Handlebars.compile($(templateE).html(), {noEscape: true});
                var result = templateNews({news: buildNewsData(json.data.items)});
                $(container).append(result);
                $this.data("current-page", page)
                if (json.data.pagination_info.endItem >= json.data.pagination_info.totalItem) {
                    $(remove).remove();
                }
            }
        })
    });
}