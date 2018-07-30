/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#promo-1').countdowntimer({
dateAndTime: "2015/12/31 00:00:00",
        size: "xl",
        regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
        regexpReplaceWith: "<tr>\n\
                                    <td class='hidden'>$1</td>\n\
                                    <td class='hidden displayformat'>Hari</td>\n\
                                    <td class='hidden timerKoma'>:</td>\n\
                                    <td class='widthNumber'>$2</td>\n\
                                    <td class='jam'>Jam</td>\n\
                                    <td class='timerKoma'>:</td>\n\
                                    <td class='widthNumber'>$3</td>\n\
                                    <td class='menit'>Menit</td>\n\
                                    <td class='hidden timerKoma'>:</td>\n\
                                    <td class='hidden widthNumber'>$4</td>\n\
                                    <td class='hidden displayformat'>detik</td>\n\
                                    </tr>"
});
        $('#promo-2').countdowntimer({
dateAndTime: "2015/12/31 15:00:00",
        size: "xl",
        regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
        regexpReplaceWith: "<tr>\n\
                                    <td class='widthNumber'>$2</td>\n\
                                    <td class='jam'>Jam</td>\n\
                                    <td class='timerKoma'>:</td>\n\
                                    <td class='widthNumber'>$3</td>\n\
                                    <td class='menit'>Menit</td>\n\
                                    </tr>"
});
        $('#promo-3').countdowntimer({
dateAndTime: "2015/12/22 00:00:00",
        size: "xl",
        regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
        regexpReplaceWith: "<tr>\n\
                                    <td class='widthNumber'>$2</td>\n\
                                    <td class='jam'>Jam</td>\n\
                                    <td class='timerKoma'>:</td>\n\
                                    <td class='widthNumber'>$3</td>\n\
                                    <td class='menit'>Menit</td>\n\
                                    </tr>"
});