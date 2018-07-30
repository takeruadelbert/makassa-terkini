<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SlideshowDetail extends AppModel {
    var $name = 'SlideshowDetail';
    
    public $belongsTo = array(
        "News",
    );
}