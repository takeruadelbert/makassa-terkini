<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

    var $hari = array(
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu"
    );

    function Rp($Rp) {
        if ($Rp == "") {
            return "Rp. 0";
        }
        return "Rp. " . number_format($Rp, 0, "", ".") . ",-";
    }

    function cvtTanggal($date = null, $now = true) {
        if (!empty($date)) {
            $tgl = date("d", strtotime($date));
            $bulan = $this->getNamaBulan(date("m", strtotime($date)));
            $tahun = date("Y", strtotime($date));
        } else if ($now) {
            $tgl = date("d");
            $bulan = $this->getNamaBulan(date("m"));
            $tahun = date("Y");
        } else {
            return "-";
        }
        return "$tgl $bulan $tahun";
    }

    function cvtHariTanggal($date = null) {
        if (!empty($date)) {
            $tgl = date("d", strtotime($date));
            $bulan = $this->getNamaBulan(date("m", strtotime($date)));
            $tahun = date("Y", strtotime($date));
            $hari = $this->hari[date("w", strtotime($date))];
        } else {
            $tgl = date("d");
            $bulan = $this->getNamaBulan(date("m"));
            $tahun = date("Y");
            $hari = $this->hari[date("w")];
        }
        return "$hari, $tgl $bulan $tahun";
    }

    function cvtWaktu($date = null) {
        if (!empty($date)) {
            $tgl = date("d", strtotime($date));
            $bulan = $this->getNamaBulan(date("m", strtotime($date)));
            $tahun = date("Y", strtotime($date));
            $jam = date("H", strtotime($date));
            $menit = date("i", strtotime($date));
        } else {
            $tgl = date("d");
            $bulan = $this->getNamaBulan(date("m"));
            $tahun = date("Y");
            $jam = date("H");
            $menit = date("i");
        }
        return "$tgl $bulan $tahun - $jam:$menit";
    }
    
    function cvtJam($date = null) {
        if (!empty($date)) {
            $jam = date("H", strtotime($date));
            $menit = date("i", strtotime($date));
        } else {
            $jam = date("H");
            $menit = date("i");
        }
        return "$jam:$menit";
    }

     function periode($awal, $akhir) {
        $tglAwal = date("d", strtotime($awal));
        $bulanAwal = $this->getNamaBulan(date("m", strtotime($awal)));
        $tahunAwal = date("Y", strtotime($awal));
        $hariAwal = $this->hari[date("w", strtotime($awal))];
        $tglAkhir = date("d", strtotime($akhir));
        $bulanAkhir = $this->getNamaBulan(date("m", strtotime($akhir)));
        $tahunAkhir = date("Y", strtotime($akhir));
        $hariAkhir = $this->hari[date("w", strtotime($akhir))];

        if (strtotime($awal) == strtotime($akhir)) {
            return "$hariAwal, $tglAwal $bulanAwal $tahunAwal";
        } else {
            return "$hariAwal, $tglAwal $bulanAwal $tahunAwal - $hariAkhir, $tglAkhir $bulanAkhir $tahunAkhir";
        }
    }
    
    function getTanggal($date = null) {
        if (!empty($date)) {
            $tgl = date("d", strtotime($date));
        } else {
            $tgl = date("d");
        }
        return "$tgl";
    }

    function getBulan($date = null) {
        if (!empty($date)) {
            $bulan = $this->getNamaBulan(date("m", strtotime($date)));
        } else {
            $bulan = $this->getNamaBulan(date("m"));
        }
        return $bulan;
    }

    function getNamaBulan($i = null) {
        if ($i == 1) {
            $monthName = 'Januari';
        } elseif ($i == 2) {
            $monthName = 'Februari';
        } elseif ($i == 3) {
            $monthName = 'Maret';
        } elseif ($i == 4) {
            $monthName = 'April';
        } elseif ($i == 5) {
            $monthName = 'Mei';
        } elseif ($i == 6) {
            $monthName = 'Juni';
        } elseif ($i == 7) {
            $monthName = 'Juli';
        } elseif ($i == 8) {
            $monthName = 'Agustus';
        } elseif ($i == 9) {
            $monthName = 'September';
        } elseif ($i == 10) {
            $monthName = 'Oktober';
        } elseif ($i == 11) {
            $monthName = 'November';
        } else {
            $monthName = 'Desember';
        }
        return $monthName;
    }
    
    function getHari($i = null) {
        $result = "";
        if($i == "Monday") {
            $result = "Senin";
        } else if($i == "Tuesday") {
            $result = "Selasa";
        } else if($i == "Wednesday") {
            $result = "Rabu";
        } else if($i == "Thursday") {
            $result = "Kamis";
        } else if($i == "Friday") {
            $result = "Jumat";
        } else if($i == "Saturday") {
            $result = "Sabtu";
        } else if($i == "Sunday") {
            $result = "Minggu";
        }
        return $result;
    }

    function println($string = false) {
        if ($string === false) {
            return "<br/>";
        } else if (empty($string)) {
            return "";
        } else {
            return "$string<br/>";
        }
    }

    function changeStatusSelect($id, $options = array(), $default = null, $url = "", $e = null) {
        $result = "<select onchange=changeStatus($id,$(this).val(),'$url','$e') class='form-control'>";
        $result .= "<option value>--Pilih Status--</option>";
        foreach ($options as $k => $v) {
            if ($k == $default) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $result.="<option value='$k' $selected>{$v}</option>";
        }
        return $result . "</select>";
    }
    
    //http://stackoverflow.com/questions/11481737/how-to-calculate-time-ago-in-php
    function getTimeago($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return 'kurang dari 1 detik yang lalu';
        }

        $a = array(12 * 30 * 24 * 60 * 60 => 'tahun',
            30 * 24 * 60 * 60 => 'bulan',
            24 * 60 * 60 => 'hari',
            60 * 60 => 'jam',
            60 => 'menit',
            1 => 'detik'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;

            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . $str . ' yang lalu';
            }
        }
    }
    
    function getNamaBulanInter($i = null) {
        if ($i == 1) {
            $monthName = 'January';
        } elseif ($i == 2) {
            $monthName = 'February';
        } elseif ($i == 3) {
            $monthName = 'March';
        } elseif ($i == 4) {
            $monthName = 'April';
        } elseif ($i == 5) {
            $monthName = 'May';
        } elseif ($i == 6) {
            $monthName = 'June';
        } elseif ($i == 7) {
            $monthName = 'July';
        } elseif ($i == 8) {
            $monthName = 'August';
        } elseif ($i == 9) {
            $monthName = 'September';
        } elseif ($i == 10) {
            $monthName = 'October';
        } elseif ($i == 11) {
            $monthName = 'November';
        } else {
            $monthName = 'December';
        }
        return $monthName;
    }
    
    function cvtTanggalInter($date = null, $now = true) {
        if (!empty($date)) {
            $tgl = date("d", strtotime($date));
            $bulan = $this->getNamaBulanInter(date("m", strtotime($date)));
            $tahun = date("Y", strtotime($date));
        } else if ($now) {
            $tgl = date("d");
            $bulan = $this->getNamaBulanInter(date("m"));
            $tahun = date("Y");
        } else {
            return "-";
        }
        return "$tgl $bulan $tahun";
    }
    
    function cvtWaktuInter($date = null) {
        if (!empty($date)) {
            $tgl = date("d", strtotime($date));
            $bulan = $this->getNamaBulanInter(date("m", strtotime($date)));
            $tahun = date("Y", strtotime($date));
            $jam = date("H", strtotime($date));
            $menit = date("i", strtotime($date));
        } else {
            $tgl = date("d");
            $bulan = $this->getNamaBulanInter(date("m"));
            $tahun = date("Y");
            $jam = date("H");
            $menit = date("i");
        }
        return "$tgl $bulan $tahun - $jam:$menit";
    }
    
    function cvtHariTanggalJam($date = null) {
        if (!empty($date)) {
            $tgl = date("d", strtotime($date));
            $bulan = $this->getNamaBulan(date("m", strtotime($date)));
            $tahun = date("Y", strtotime($date));
            $hari = $this->hari[date("w", strtotime($date))];
            $jam = date("H", strtotime($date));
            $menit = date("i", strtotime($date));
        } else {
            $tgl = date("d");
            $bulan = $this->getNamaBulan(date("m"));
            $tahun = date("Y");
            $hari = $this->hari[date("w")];
            $jam = date("H");
            $menit = date("i");
        }
        return "$hari, $tgl $bulan $tahun $jam:$menit";
    }
}
