/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#birthday").datepicker({
    dateFormat: 'd/m/yy',
    beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
                left: 150
            });
        }, 0);
    }
});



$("#tanggalTransfer").datepicker({
    dateFormat: 'd/m/yy',
    beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
                
            });
        }, 0);
    }
});

$("#timepicker1").timepicker({
    beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
                left: 525
            });
        }, 0);
    }
});

$("#timepicker2").timepicker({
    beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
                left: 985
            });
        }, 0);
    }
});

$('.timepicker').timepicker();

$('.datepicker').datepicker();