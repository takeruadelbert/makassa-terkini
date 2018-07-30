function renderPaginationNews(paginationInfo, totalButton) {
    var queryString, m, page;
    totalButton = typeof totalButton !== 'undefined' ? totalButton : 5;
    var symmetryCount = Math.floor(parseInt(totalButton) / 2);
    var totalButtonBefore = paginationInfo.currentPage - 1;
    var totalButtonAfter = paginationInfo.totalPage - paginationInfo.currentPage;
    var countButtonBefore = totalButtonBefore > symmetryCount ? symmetryCount : totalButtonBefore;
    var countButtonAfter = totalButtonAfter > symmetryCount ? symmetryCount : totalButtonAfter;
    if (countButtonBefore <= 0 && countButtonAfter <= 0) {
        var buttonBefore = 0;
        var buttonAfter = 0;
    } else {
        var buttonBefore = countButtonBefore + (symmetryCount - countButtonAfter);
        var buttonAfter = countButtonAfter + (symmetryCount - countButtonBefore);
    }
    var dataPush = {
        prev: false,
        next: false,
        buttonBefore: [],
        buttonAfter: [],
        buttonCurrent: {},
    };
    if (paginationInfo.currentPage != 1) {
        page = parseInt(paginationInfo.currentPage) - 1;
        dataPush['prev'] = {
            href: "#",
            onclick: "requestNews(" + page + ")",
        };
    }
    for (var n = buttonBefore; n >= 1; n--) {
        m = parseInt(paginationInfo.currentPage) - n;
        if (m < 1) {
            continue;
        }
        dataPush["buttonBefore"].push({
            href: "#",
            onclick: "requestNews(" + m + ")",
            number: m,
        });
    }
    dataPush["buttonCurrent"] = {
        href: "#",
        number: parseInt(paginationInfo.currentPage),
    };
    for (var n = 1; n <= buttonAfter; n++) {
        m = parseInt(paginationInfo.currentPage) + n;
        if (m > paginationInfo.totalPage) {
            continue;
        }
        dataPush["buttonAfter"].push({
            href: "#",
            onclick: "requestNews(" + m + ")",
            number: m,
        });
    }
    if (paginationInfo.currentPage != paginationInfo.totalPage) {
        page = parseInt(paginationInfo.currentPage) + 1;
        dataPush['next'] = {
            href: "#",
            onclick: "requestNews(" + page + ")",
        };
    }
    var source = $("#tmpl-pagination-dashboard").html();
    var template = Handlebars.compile(source);
    var html = template(dataPush)
    $("#target-pagination-news").html(html);
}

function renderPaginationEvents(paginationInfo, totalButton) {
    var queryString, m, page;
    totalButton = typeof totalButton !== 'undefined' ? totalButton : 5;
    var symmetryCount = Math.floor(parseInt(totalButton) / 2);
    var totalButtonBefore = paginationInfo.currentPage - 1;
    var totalButtonAfter = paginationInfo.totalPage - paginationInfo.currentPage;
    var countButtonBefore = totalButtonBefore > symmetryCount ? symmetryCount : totalButtonBefore;
    var countButtonAfter = totalButtonAfter > symmetryCount ? symmetryCount : totalButtonAfter;
    if (countButtonBefore <= 0 && countButtonAfter <= 0) {
        var buttonBefore = 0;
        var buttonAfter = 0;
    } else {
        var buttonBefore = countButtonBefore + (symmetryCount - countButtonAfter);
        var buttonAfter = countButtonAfter + (symmetryCount - countButtonBefore);
    }
    var dataPush = {
        prev: false,
        next: false,
        buttonBefore: [],
        buttonAfter: [],
        buttonCurrent: {},
    };
    if (paginationInfo.currentPage != 1) {
        page = parseInt(paginationInfo.currentPage) - 1;
        dataPush['prev'] = {
            href: "#",
            onclick: "requestEvent(" + page + ")",
        };
    }
    for (var n = buttonBefore; n >= 1; n--) {
        m = parseInt(paginationInfo.currentPage) - n;
        if (m < 1) {
            continue;
        }
        dataPush["buttonBefore"].push({
            href: "#",
            onclick: "requestEvent(" + m + ")",
            number: m,
        });
    }
    dataPush["buttonCurrent"] = {
        href: "#",
        number: parseInt(paginationInfo.currentPage),
    };
    for (var n = 1; n <= buttonAfter; n++) {
        m = parseInt(paginationInfo.currentPage) + n;
        if (m > paginationInfo.totalPage) {
            continue;
        }
        dataPush["buttonAfter"].push({
            href: "#",
            onclick: "requestEvent(" + m + ")",
            number: m,
        });
    }
    if (paginationInfo.currentPage != paginationInfo.totalPage) {
        page = parseInt(paginationInfo.currentPage) + 1;
        dataPush['next'] = {
            href: "#",
            onclick: "requestEvent(" + page + ")",
        };
    }
    var source = $("#tmpl-pagination-dashboard").html();
    var template = Handlebars.compile(source);
    var html = template(dataPush)
    $("#target-pagination-events").html(html);
}

function renderPaginationCitizen(paginationInfo, totalButton) {
    var queryString, m, page;
    totalButton = typeof totalButton !== 'undefined' ? totalButton : 5;
    var symmetryCount = Math.floor(parseInt(totalButton) / 2);
    var totalButtonBefore = paginationInfo.currentPage - 1;
    var totalButtonAfter = paginationInfo.totalPage - paginationInfo.currentPage;
    var countButtonBefore = totalButtonBefore > symmetryCount ? symmetryCount : totalButtonBefore;
    var countButtonAfter = totalButtonAfter > symmetryCount ? symmetryCount : totalButtonAfter;
    if (countButtonBefore <= 0 && countButtonAfter <= 0) {
        var buttonBefore = 0;
        var buttonAfter = 0;
    } else {
        var buttonBefore = countButtonBefore + (symmetryCount - countButtonAfter);
        var buttonAfter = countButtonAfter + (symmetryCount - countButtonBefore);
    }
    console.log(countButtonAfter);
    console.log(buttonAfter);
    var dataPush = {
        prev: false,
        next: false,
        buttonBefore: [],
        buttonAfter: [],
        buttonCurrent: {},
    };
    if (paginationInfo.currentPage != 1) {
        page = parseInt(paginationInfo.currentPage) - 1;
        dataPush['prev'] = {
            href: "#",
            onclick: "requestCitizenReport(" + page + ")",
        };
    }
    for (var n = buttonBefore; n >= 1; n--) {
        m = parseInt(paginationInfo.currentPage) - n;
        if (m < 1) {
            continue;
        }
        dataPush["buttonBefore"].push({
            href: "#",
            onclick: "requestCitizenReport(" + m + ")",
            number: m,
        });
    }
    dataPush["buttonCurrent"] = {
        href: "#",
        number: parseInt(paginationInfo.currentPage),
    };
    for (var n = 1; n <= buttonAfter; n++) {
        m = parseInt(paginationInfo.currentPage) + n;
        if (m > paginationInfo.totalPage) {
            continue;
        }
        dataPush["buttonAfter"].push({
            href: "#",
            onclick: "requestCitizenReport(" + m + ")",
            number: m,
        });
    }
    if (paginationInfo.currentPage != paginationInfo.totalPage) {
        page = parseInt(paginationInfo.currentPage) + 1;
        dataPush['next'] = {
            href: "#",
            onclick: "requestCitizenReport(" + page + ")",
        };
    }
    var source = $("#tmpl-pagination-dashboard").html();
    var template = Handlebars.compile(source);
    console.log(dataPush);
    var html = template(dataPush)
    $("#target-pagination-citizen").html(html);
}

function renderPaginationAdvert(paginationInfo, totalButton) {
    var queryString, m, page;
    totalButton = typeof totalButton !== 'undefined' ? totalButton : 5;
    var symmetryCount = Math.floor(parseInt(totalButton) / 2);
    var totalButtonBefore = paginationInfo.currentPage - 1;
    var totalButtonAfter = paginationInfo.totalPage - paginationInfo.currentPage;
    var countButtonBefore = totalButtonBefore > symmetryCount ? symmetryCount : totalButtonBefore;
    var countButtonAfter = totalButtonAfter > symmetryCount ? symmetryCount : totalButtonAfter;
    if (countButtonBefore <= 0 && countButtonAfter <= 0) {
        var buttonBefore = 0;
        var buttonAfter = 0;
    } else {
        var buttonBefore = countButtonBefore + (symmetryCount - countButtonAfter);
        var buttonAfter = countButtonAfter + (symmetryCount - countButtonBefore);
    }
    console.log(countButtonAfter);
    console.log(buttonAfter);
    var dataPush = {
        prev: false,
        next: false,
        buttonBefore: [],
        buttonAfter: [],
        buttonCurrent: {},
    };
    if (paginationInfo.currentPage != 1) {
        page = parseInt(paginationInfo.currentPage) - 1;
        dataPush['prev'] = {
            href: "#",
            onclick: "requestAdvert(" + page + ")",
        };
    }
    for (var n = buttonBefore; n >= 1; n--) {
        m = parseInt(paginationInfo.currentPage) - n;
        if (m < 1) {
            continue;
        }
        dataPush["buttonBefore"].push({
            href: "#",
            onclick: "requestAdvert(" + m + ")",
            number: m,
        });
    }
    dataPush["buttonCurrent"] = {
        href: "#",
        number: parseInt(paginationInfo.currentPage),
    };
    for (var n = 1; n <= buttonAfter; n++) {
        m = parseInt(paginationInfo.currentPage) + n;
        if (m > paginationInfo.totalPage) {
            continue;
        }
        dataPush["buttonAfter"].push({
            href: "#",
            onclick: "requestAdvert(" + m + ")",
            number: m,
        });
    }
    if (paginationInfo.currentPage != paginationInfo.totalPage) {
        page = parseInt(paginationInfo.currentPage) + 1;
        dataPush['next'] = {
            href: "#",
            onclick: "requestAdvert(" + page + ")",
        };
    }
    var source = $("#tmpl-pagination-dashboard").html();
    var template = Handlebars.compile(source);
    console.log(dataPush);
    var html = template(dataPush)
    $("#target-pagination-advert").html(html);
}

function renderPaginationNewsPublished(paginationInfo, totalButton) {
    var queryString, m, page;
    totalButton = typeof totalButton !== 'undefined' ? totalButton : 5;
    var symmetryCount = Math.floor(parseInt(totalButton) / 2);
    var totalButtonBefore = paginationInfo.currentPage - 1;
    var totalButtonAfter = paginationInfo.totalPage - paginationInfo.currentPage;
    var countButtonBefore = totalButtonBefore > symmetryCount ? symmetryCount : totalButtonBefore;
    var countButtonAfter = totalButtonAfter > symmetryCount ? symmetryCount : totalButtonAfter;
    if (countButtonBefore <= 0 && countButtonAfter <= 0) {
        var buttonBefore = 0;
        var buttonAfter = 0;
    } else {
        var buttonBefore = countButtonBefore + (symmetryCount - countButtonAfter);
        var buttonAfter = countButtonAfter + (symmetryCount - countButtonBefore);
    }
    console.log(countButtonAfter);
    console.log(buttonAfter);
    var dataPush = {
        prev: false,
        next: false,
        buttonBefore: [],
        buttonAfter: [],
        buttonCurrent: {},
    };
    if (paginationInfo.currentPage != 1) {
        page = parseInt(paginationInfo.currentPage) - 1;
        dataPush['prev'] = {
            href: "#",
            onclick: "requestNewsPublished(" + page + ")",
        };
    }
    for (var n = buttonBefore; n >= 1; n--) {
        m = parseInt(paginationInfo.currentPage) - n;
        if (m < 1) {
            continue;
        }
        dataPush["buttonBefore"].push({
            href: "#",
            onclick: "requestNewsPublished(" + m + ")",
            number: m,
        });
    }
    dataPush["buttonCurrent"] = {
        href: "#",
        number: parseInt(paginationInfo.currentPage),
    };
    for (var n = 1; n <= buttonAfter; n++) {
        m = parseInt(paginationInfo.currentPage) + n;
        if (m > paginationInfo.totalPage) {
            continue;
        }
        dataPush["buttonAfter"].push({
            href: "#",
            onclick: "requestNewsPublished(" + m + ")",
            number: m,
        });
    }
    if (paginationInfo.currentPage != paginationInfo.totalPage) {
        page = parseInt(paginationInfo.currentPage) + 1;
        dataPush['next'] = {
            href: "#",
            onclick: "requestNewsPublished(" + page + ")",
        };
    }
    var source = $("#tmpl-pagination-dashboard").html();
    var template = Handlebars.compile(source);
    console.log(dataPush);
    var html = template(dataPush)
    $("#target-pagination-newspublish").html(html);
}

function renderPaginationNewsEdit(paginationInfo, totalButton) {
    var queryString, m, page;
    totalButton = typeof totalButton !== 'undefined' ? totalButton : 5;
    var symmetryCount = Math.floor(parseInt(totalButton) / 2);
    var totalButtonBefore = paginationInfo.currentPage - 1;
    var totalButtonAfter = paginationInfo.totalPage - paginationInfo.currentPage;
    var countButtonBefore = totalButtonBefore > symmetryCount ? symmetryCount : totalButtonBefore;
    var countButtonAfter = totalButtonAfter > symmetryCount ? symmetryCount : totalButtonAfter;
    if (countButtonBefore <= 0 && countButtonAfter <= 0) {
        var buttonBefore = 0;
        var buttonAfter = 0;
    } else {
        var buttonBefore = countButtonBefore + (symmetryCount - countButtonAfter);
        var buttonAfter = countButtonAfter + (symmetryCount - countButtonBefore);
    }
    console.log(countButtonAfter);
    console.log(buttonAfter);
    var dataPush = {
        prev: false,
        next: false,
        buttonBefore: [],
        buttonAfter: [],
        buttonCurrent: {},
    };
    if (paginationInfo.currentPage != 1) {
        page = parseInt(paginationInfo.currentPage) - 1;
        dataPush['prev'] = {
            href: "#",
            onclick: "requestNewsEdit(" + page + ")",
        };
    }
    for (var n = buttonBefore; n >= 1; n--) {
        m = parseInt(paginationInfo.currentPage) - n;
        if (m < 1) {
            continue;
        }
        dataPush["buttonBefore"].push({
            href: "#",
            onclick: "requestNewsEdit(" + m + ")",
            number: m,
        });
    }
    dataPush["buttonCurrent"] = {
        href: "#",
        number: parseInt(paginationInfo.currentPage),
    };
    for (var n = 1; n <= buttonAfter; n++) {
        m = parseInt(paginationInfo.currentPage) + n;
        if (m > paginationInfo.totalPage) {
            continue;
        }
        dataPush["buttonAfter"].push({
            href: "#",
            onclick: "requestNewsEdit(" + m + ")",
            number: m,
        });
    }
    if (paginationInfo.currentPage != paginationInfo.totalPage) {
        page = parseInt(paginationInfo.currentPage) + 1;
        dataPush['next'] = {
            href: "#",
            onclick: "requestNewsEdit(" + page + ")",
        };
    }
    var source = $("#tmpl-pagination-dashboard").html();
    var template = Handlebars.compile(source);
    console.log(dataPush);
    var html = template(dataPush)
    $("#target-pagination-newsedit").html(html);
}