<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MobileAdvert extends AppModel {
    var $name = 'MobileAdvert';
    var $actsAs = array(
        'DeleteableFile' => [
            'deleteableFileFields' => [
                'path'
            ]
        ]
    );
    public $belongsTo = array(
        "AdvertStatus",
        "AdvertPosition",
        "DataCustomer",
    );
}