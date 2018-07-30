<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GallerySlideshow extends AppModel {
    var $name = 'GallerySlideshow';
    
    public $belongsTo = array(
        "ShowingStatus",
        "SlideshowType",
    );
    
    public $hasMany = array(
        "GallerySlideshowDetail",
    );
}