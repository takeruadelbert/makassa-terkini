Handlebars.registerHelper('news-timeago', function(datetime) {
  var timestamp=moment(datetime).valueOf();
  var label=timeAgo(timestamp);
  return label;
});

Handlebars.registerHelper('shortenText', function(text) {
    var result = text.replace(/<\/?[^>]+(>|$)/g, "");
    if(result.length > 200) {
        return result.substring(0,200) + "...";
    } else {
        return result;
    }
});

Handlebars.registerHelper('seourl', function(uri) {
  return seoUrl(uri);
});

Handlebars.registerHelper('referNews', function (typeId, newsId, newsTitle) {
    if (typeId == 1) {
        return BASE_URL + "/berita/" + newsId + "/" + seoUrl(newsTitle);
    } else if (typeId == 2) {
        return BASE_URL + "/foto/" + newsId + "/" + seoUrl(newsTitle);
    } else {
        return BASE_URL + "/video/" + newsId + "/" + seoUrl(newsTitle);
    }
});

Handlebars.registerHelper('mobileReferNews', function (typeId, newsId, newsTitle) {
    if (typeId == 1) {
        return BASE_URL + "/m/berita/" + newsId + "/" + seoUrl(newsTitle);
    } else if (typeId == 2) {
        return BASE_URL + "/m/foto/" + newsId + "/" + seoUrl(newsTitle);
    } else {
        return BASE_URL + "/m/video/" + newsId + "/" + seoUrl(newsTitle);
    }
});

Handlebars.registerHelper('getDuration', function(input) {
    return replace(input).duration;
});

Handlebars.registerHelper('convertDate', function(date){
   return cvtTanggal(date); 
});

// replace \ -> /
function replace(input) {
    return input.replace("\\", "/").replace("\\", "/");
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

var bulan = [
    "January",
    "Febuary",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

function cvtTanggal(date) {
    var d = new Date(date);
    return d.getDate() + " " + bulan[d.getMonth()] + " " + d.getFullYear() + " - " + d.getHours() + ":" + d.getMinutes();
}