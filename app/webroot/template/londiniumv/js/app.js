$(document).ready(function() {
    $(".checkall").click(function() {
        var $checkBoxes = $(this).parents("thead").siblings("tbody").find("input.checkboxDeleteRow");
        if ($(this).is(":checked")) {
            $checkBoxes.attr("checked", "checked");
            $checkBoxes.parent("span").addClass("checked");
        } else {
            $checkBoxes.removeAttr("checked");
            $checkBoxes.parent("span").removeClass("checked");
        }
    });
    $('.opensmallwindow').bind('click', function() {
        //alert($(this).attr('href'));
        $.colorbox({
            href: $(this).data('href'),
            width: '555', //width: 555px; height: 296px; 
            height: '296'
        });
        return false;
    });
    $(".required").siblings("label").addClass("label-required");
    reloadStyle();
})

function reloadStyle() {
    $(".styled, .multiselect-container input").uniform({radioClass: 'choice', selectAutoWidth: false});
}