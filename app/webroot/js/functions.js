window.onhashchange = function () {
//    var hashes = location.hash.split("#");
//    var hash = hashes[hashes.length - 1].replace(/#/g, '');
//    if (hash.length > 0) {
//        $.ajax({
//            url: BASE_URL + hash,
//            success: function (data) {
//                $(CONTENT_SELECTOR).html(data);
//            },
//            error: function (jqXHR, textStatus, errorThrown) {
//                switch (jqXHR.status) {
//                    case 404:
//                        alert("Halaman tidak ditemukan");
//                        break;
//                    case 405:
//                        break;
//                    case 500:
//                        alert("Internal error");
//                        break;
//                    case 401:
//                        break;
//                }
//            }
//        });
//    }
}

$(document).ready(function () {
    $(".btn-filter").click(function () {
        doFilter($(this));
    });
    $(".btn-filter-reset").click(function () {
        window.location.href = BASE_URL + URL;
    });
    $(".panel-filter input").keypress(function (e) {
        if (e.which == 13) {
            doFilter($(this));
        }
    });
    $(".angka").number(true, 0, ",", ".");
    $(".date").attr("type", "date");
    $(".city-state").on("change", function () {
        cityList(this, $(this).data("city-state-target"));
    });
    $(".news-title").on("change", function () {
        titleList(this, $(this).data("news-title-target"));
    });
    $(".news-title2").on("change", function () {
        titleList(this, $(this).data("news-title2-target"));
    });
    $(".news-title3").on("change", function () {
        titleList(this, $(this).data("news-title3-target"));
    });
    
    // galeri foto slideshow
    $(".news-title-photo").on("change", function () {
        titlePhotoList(this, $(this).data("news-title-photo-target"));
    });
    $(".news-title-photo2").on("change", function () {
        titlePhotoList(this, $(this).data("news-title-photo2-target"));
    });
    $(".news-title-photo3").on("change", function () {
        titlePhotoList(this, $(this).data("news-title-photo3-target"));
    });
    
    // galeri video slideshow
    $(".news-title-video").on("change", function () {
        titleVideoList(this, $(this).data("news-title-video-target"));
    });
    $(".news-title-video2").on("change", function () {
        titleVideoList(this, $(this).data("news-title-video2-target"));
    });
    $(".news-title-video3").on("change", function () {
        titleVideoList(this, $(this).data("news-title-video3-target"));
    });
    
    $(".news-subcategory").on("change", function () {
        titleList(this, $(this).data("news-title-target"));
    });
    $(".news-subcategory2").on("change", function () {
        titleList(this, $(this).data("news-title2-target"));
    });
    $(".news-subcategory3").on("change", function () {
        titleList(this, $(this).data("news-title3-target"));
    });
    $(".news-category").on("change", function () {
        subcategoryList(this, $(this).data("news-subcategory-target"));
        subcategoryList(this, $(this).data("news-subcategory2-target"));
        subcategoryList(this, $(this).data("news-subcategory3-target"));
    });
    loadckeditor();
})

function doFilter(e) {
    var data = e.closest(".panel-filter").serialize();
    window.location.href = BASE_URL + URL + "?" + data;
}

function formHandler(formE, buttonE) {
    var data = $(formE).serialize();
    var url = $(formE).attr('action');
    $.ajax({
        type: "POST",
        data: data,
        url: url,
        dataType: 'json',
        success: function (data, textStatus, jqXHR) {
            if (data.status == 101) {
                displayError(data);
            } else if (data.status == 200) {

            }
        }
    });
}

function hapusData(id, e) {
    if (confirm("Apakah Anda Yakin Menghapus Ini?")) {
        $.ajax({
            type: "DELETE",
            url: BASE_URL + PREFIX + "/" + CONTROLLER + "/delete/" + id,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status == 204) {
                    var template = $("#tmp-alert-warning").html();
                    Mustache.parse(template);
                    var rendered = Mustache.render(template, {message: data.message});
                    $("#flash-block").html(rendered);
                    $(e).remove();
                } else if (data.status == 400) {

                }
            } 
        });
    } else {
        alert("cancel");
    }
}

function hapusDataUrl(id, url, e) {
    if (confirm("Apakah Anda Yakin Menghapus Ini?")) {
        $.ajax({
            type: "DELETE",
            url: url + id,
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                if (data.status == 204) {
                    var template = $("#tmp-alert-warning").html();
                    Mustache.parse(template);
                    var rendered = Mustache.render(template, {message: data.message});
                    $("#flash-block").html(rendered);
                    if (typeof (e) === "function") {
                        e();
                    } else {
                        $(e).remove();
                    }
                } else {
                    alert(data.message);
                }
            }
        });
    } else {
        alert("cancel");
    }
}

function getOptions(e, url, label, parent) {
    var id = $(parent + " option:selected").val() || null;
    if (id == null) {
        id = "";
    }
    label = label || "";
    console.log(id);
    $.ajax({
        type: "GET",
        url: url + "/" + id,
        dataType: 'json',
        success: function (data, textStatus, jqXHR) {
            $(e).html("");
            $(e).append("<option >" + label + "</option>")
            $.each(data, function (k, v) {
                $(e).append("<option value='" + k + "'>" + v + "</option>");
            })
            console.log(jqXHR);
        }
    });
}

function windowOpener(windowHeight, windowWidth, windowName, windowUri) {
    var centerWidth = (window.screen.width - windowWidth) / 2;
    var centerHeight = (window.screen.height - windowHeight) / 2;

    newWindow = window.open(windowUri, windowName, 'resizable=1,scrollbars=yes,width=' + windowWidth +
            ',height=' + windowHeight +
            ',left=' + centerWidth +
            ',top=' + centerHeight);

    newWindow.focus();
    return newWindow.name;
}

function changeStatus(id, status, url, e) {
    $.ajax({
        type: "PUT",
        url: url,
        data: {id: id, status: status},
        dataType: "JSON",
        success: function (data) {
            $(e).html(data.data.status_label);
            alert(data.message);
        },
        error: function () {

        }
    })
}

function fixckeditor() {
    $(".ckeditor-fix").each(function () {
        var instanceId = $(this).attr('id');
        $("#" + instanceId).val(CKEDITOR.instances[instanceId].getData());
    })
}

function loadckeditor() {
    CKEDITOR.editorConfig = function (config) {
    };
    CKFinder.setupCKEditor();
    $(".ckeditor-fix").each(function () {
        var $e = $(this);
        var instanceId = $(this).attr('id');
        CKEDITOR.replace(instanceId, {
            filebrowserBrowseUrl: BASE_URL+'js/ckfinder/ckfinder.html',
            filebrowserUploadUrl: BASE_URL+'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    })
}

function cityList(e, targetE) {
    var id = $(e).val();
    $.ajax({
        url: BASE_URL + "admin/cities/list/" + id,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            var $target = $(targetE);
            $target.html("<option value=''>- Pilih Kota -</option>");
            $.each(data.data, function (k, v) {
                $target.append("<option value='" + k + "'>" + v + "</option>");
            })
        },
        error: function () {

        }
    })
}

function titleList(e, targetE) {
    var id = $(e).val();
    $.ajax({
        url: BASE_URL + "admin/news/list/" + id,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            var $target = $(targetE);
            $target.html("<option value=''>-- Pilih Judul Berita --</option>");
            $.each(data.data, function (k, v) {
                $target.append("<option value='" + parseInt(k.replace(/["']/g, "")) + "'>" + v + "</option>");
            })
        },
        error: function () {

        }
    })
}

function titlePhotoList(e, targetE) {
    var id = $(e).val();
    $.ajax({
        url: BASE_URL + "admin/news/photo_list/" + id,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            var $target = $(targetE);
            $target.html("<option value=''>-- Pilih Judul Berita --</option>");
            $.each(data.data, function (k, v) {
                $target.append("<option value='" + parseInt(k) + "'>" + v + "</option>");
            })
        },
        error: function () {

        }
    })
}

function titleVideoList(e, targetE) {
    var id = $(e).val();
    $.ajax({
        url: BASE_URL + "admin/news/video_list/" + id,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            var $target = $(targetE);
            $target.html("<option value=''>-- Pilih Judul Berita --</option>");
            $.each(data.data, function (k, v) {
                $target.append("<option value='" + k + "'>" + v + "</option>");
            })
        },
        error: function () {

        }
    })
}

function subcategoryList(e, targetE) {
    var id = $(e).val();
    $.ajax({
        url: BASE_URL + "admin/newsCategories/list/" + id,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            var $target = $(targetE);
            $target.html("<option value=''>-- Pilih Subkategori Berita --</option>");
            $.each(data.data, function (k, v) {
                $target.append("<option value='" + k + "'>" + v + "</option>");
            })
        },
        error: function () {

        }
    })
}