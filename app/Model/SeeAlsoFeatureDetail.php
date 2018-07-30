<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SeeAlsoFeatureDetail extends AppModel {
    var $name = 'SeeAlsoFeatureDetail';
    
    public $belongsTo = array(
        "News",
    );
}