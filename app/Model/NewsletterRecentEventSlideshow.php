<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsletterRecentEventSlideshow extends AppModel {
    var $name = 'NewsletterRecentEventSlideshow';
    
    public $belongsTo = array(
        "Event",
    );
    
    public $hasMany = array(

    );
}