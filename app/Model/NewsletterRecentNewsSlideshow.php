<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsletterRecentNewsSlideshow extends AppModel {
    var $name = 'NewsletterRecentNewsSlideshow';
    
    public $belongsTo = array(
        "News",
    );
    
    public $hasMany = array(
//        "News",
    );
}