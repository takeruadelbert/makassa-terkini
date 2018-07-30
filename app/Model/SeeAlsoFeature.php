<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SeeAlsoFeature extends AppModel {
    var $name = 'SeeAlsoFeature';
    
    public $belongsTo = array(
        
    );
    
    public $hasMany = array(
        "SeeAlsoFeatureDetail",
    );
}