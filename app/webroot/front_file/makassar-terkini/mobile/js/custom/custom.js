/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function () {

    $('#nav').affix({
        offset: {
        }
    });

//    $('.sidebar').find('.has-more').on('click', function (e) {
//        $(this).parent().find('.ul-secondary').slideToggle();
//        $(this).parent().siblings().find('.ul-secondary').slideUp();
//        e.preventDefault();
//    });


    $('#sidebar').affix({
        offset: {
            top: 1000
        }
    });
    
    $('.button-show').on("click", function () {
        $(this).parents('.box-infoProfil').find('.popup-infoUser').slideToggle(200);
        $(this).parents('.box-infoProfil').find('.button-show').addClass('hidden');
        $(this).parents('.box-infoProfil').find('.button-hide').removeClass('hidden');
    });
    
    $('.button-hide').on("click", function () {
        $(this).parents('.box-infoProfil').find('.popup-infoUser').slideToggle(200);
        $(this).parents('.box-infoProfil').find('.button-hide').addClass('hidden');
        $(this).parents('.box-infoProfil').find('.button-show').removeClass('hidden');
    });







});