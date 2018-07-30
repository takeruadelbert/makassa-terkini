<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Newsletter extends AppModel {
    var $name = 'Newsletter';
    
    public $validate = array(
        'email' => array(
            'Harus diisi' => array("rule" => 'notEmpty'),
            'Sudah terdaftar' => array("rule" => 'isUnique'),
        )
    );
    
    public $belongsTo = array(
    );
    
    public $hasMany = array(

    );
}