$(document).ready(function () {
    $(".navigation").find(".active").parentsUntil($(".navigation")).siblings(".level-closed").trigger("click");
    $(".paginate_button").on("click", function () {
        if ($(this).find("a").length > 0) {
            window.location = $(this).find("a").attr("href");
        }
    });
});

function filterReload() {
    $(".toggle-bar").click(function () {
        var target = $(this).data("toggle-target");
        $(".toggle-target").not("*[data-toggle-id='" + target + "']").hide();
        $("*[data-toggle-id='" + target + "']").slideToggle();
    })
}

function displayError(data) {

}

function exp(type, link) {
    switch (type) {
        case "print":
            window.open(link);
            break;
        case "excel" :
            window.open(link);
            break;
    }
}

function requestNews(page) {
    var source = $("#news-template").html();
    var template = Handlebars.compile(source);
    var place = $("#news_main");
    place.html("");
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'fronts/ajax_news',
        data: {page: page, limit: 3, order: "News.publish_date desc", category: ""},
        dataType: 'json',
        success: function (response) {
            var html = template({news: response.data.items});
            place.append(html);
            renderPaginationNews(response.data.pagination_info);
        }
    });
}

function requestEvent(page) {
    var source = $("#event-template").html();
    var template = Handlebars.compile(source);
    var place = $("#event_main");
    place.html("");
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'fronts/ajax_event',
        data: {page: page, limit: 3, order: "Event.created desc", category: ""},
        dataType: 'json',
        success: function (response) {
            var html = template({event: response.data.items});
            place.append(html);
            renderPaginationEvents(response.data.pagination_info);
        }
    });
}

function requestAdvert(page) {
    var source = $("#advert-template").html();
    var template = Handlebars.compile(source);
    var place = $("#advert_main");
    place.html("");
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'fronts/ajax_advert_expire',
        data: {page: page, limit: 3, order: "Advert.expired_date desc", category: ""},
        dataType: 'json',
        success: function (response) {
            var html = template({advert: response.data.items});
            place.append(html);
            renderPaginationAdvert(response.data.pagination_info);
        }
    });
}

function requestCitizenReport(page) {
    var source = $("#citizen-template").html();
    var template = Handlebars.compile(source);
    var place = $("#citizen_main");
    place.html("");
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'fronts/ajax_news',
        data: {page: page, limit: 3, order: "News.publish_date desc", category: "", citizen_report: "1"},
        dataType: 'json',
        success: function (response) {
            var html = template({citizen: response.data.items});
            place.append(html);
            renderPaginationCitizen(response.data.pagination_info);
        }
    });
}

function requestNewsPublished(page) {
    var source = $("#newspublish-template").html();
    var template = Handlebars.compile(source);
    var place = $("#newspublish_main");
    place.html("");
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'fronts/ajax_news',
        data: {page: page, limit: 3, order: "News.publish_date desc", category: "", status_id: 3},
        dataType: 'json',
        success: function (response) {
            var html = template({news: response.data.items});
            place.append(html);
            renderPaginationNewsPublished(response.data.pagination_info);
        }
    });
}

function requestNewsEdit(page) {
    var source = $("#newsedit-template").html();
    var template = Handlebars.compile(source);
    var place = $("#newsedit_main");
    place.html("");
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'fronts/ajax_news',
        data: {page: page, limit: 3, order: "News.publish_date desc", category: "", status_id: "2"},
        dataType: 'json',
        success: function (response) {
            var html = template({news: response.data.items});
            place.append(html);
            renderPaginationNewsEdit(response.data.pagination_info);
        }
    });
}


var hari = [
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu"
];

var bulan = [
    "Januari",
    "Febuari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
];

function cvtHariTanggal(date) {
    var d = new Date(date);
    return hari[d.getUTCDay()] + ", " + d.getUTCDate() + " " + bulan[d.getUTCMonth()] + " " + d.getUTCFullYear();
}

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

Handlebars.registerHelper('newDate', function (date) {
    return cvtHariTanggal(date);
});

Handlebars.registerHelper('urlHelper', function (url) {
    return BASE_URL + url;
});

Handlebars.registerHelper('referNews', function (typeId, newsId, newsTitle) {
    if (typeId == 1) {
        return BASE_URL + "admin/news/view_news_article/" + newsId;
    } else if (typeId == 2) {
        return BASE_URL + "admin/news/view_news_photo/" + newsId;
    } else {
        return BASE_URL + "admin/news/view_news_video/" + newsId;
    }
});

Handlebars.registerHelper('referEvent', function (eventId, eventTitle) {
    return BASE_URL + "admin/events/view/" + eventId;
});