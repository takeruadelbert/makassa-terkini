<?php

function e_isset($o) {
    return isset($o) ? $o : "-";
}

function emptyToStrip($o) {
    return !empty($o) ? $o : "-";
}

function hargaAkhir($hargaAwal, $discount = -1, $promo = -1, $promoType = -1, $promoCondition = -1) {
    if ($discount > 0) {
        switch ($promoCondition) {
            case 1:
                $discountAmount = $discount * $hargaAwal / 100;
                $harga = $hargaAwal - $discountAmount;
                if ($promoType == 2) {
                    $harga-=$promo;
                    if ($harga < 0) {
                        $harga = 0;
                    }
                } else if ($promoType == 1) {
                    $harga = $harga - ($promo * $harga / 100);
                }
                return $harga;
            case 2:
                if ($promoType == 2) {
                    $harga = $hargaAwal - $promo;
                    if ($harga < 0) {
                        $harga = 0;
                    }
                    return $harga;
                } else if ($promoType == 1) {
                    return $hargaAwal - ($promo * $hargaAwal / 100);
                }
                break;
            case 3:
            case null:
                $discountAmount = $discount * $hargaAwal / 100;
                $harga = $hargaAwal - $discountAmount;
                return $harga;
                break;
        }
    } else {
        if ($promoType == 2) {
            $harga = $hargaAwal - $promo;
            if ($harga < 0) {
                $harga = 0;
            }
            return $harga;
        } else if ($promoType == 1) {
            return $hargaAwal - ($promo * $hargaAwal / 100);
        } else {
            return $hargaAwal;
        }
    }
}

//http://www.altafweb.com/2011/12/remove-specific-tag-from-php-string.html
function strip_single($tag, $string) {
    $string = preg_replace('/<' . $tag . '[^>]*>/i', '', $string);
    $string = preg_replace('/<\/' . $tag . '>/i', '', $string);
    return $string;
}

//http://stackoverflow.com/questions/1252693/using-str-replace-so-that-it-only-acts-on-the-first-match
function str_replace_first($from, $to, $subject) {
    $from = '/' . preg_quote($from, '/') . '/';

    return preg_replace($from, $to, $subject, 1);
}
