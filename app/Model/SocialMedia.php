<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SocialMedia extends AppModel {
    var $name = 'SocialMedia';
    var $validate = array (
        
    );
    
    public $belongsTo = array(
        'ShowingStatus',
    );
    
    public $hasMany = array(

    );
}