<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GalleryVideoSlideshowDetail extends AppModel {
    var $name = 'GalleryVideoSlideshowDetail';
    
    public $belongsTo = array(
        "News",
    );
}