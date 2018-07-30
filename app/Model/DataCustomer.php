<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DataCustomer extends AppModel {
    var $name = 'DataCustomer';
    var $validate = array (
        
    );
    
    public $belongsTo = array(
        'State',
        'Country',
        'City',
        'Gender',
    );
    
    public $hasMany = array(
        "Advert",
    );
}