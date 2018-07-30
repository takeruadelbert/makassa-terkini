<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsImage extends AppModel {
    var $name = 'NewsImage';
    var $actsAs = array(
        'DeleteableFile' => [
            'deleteableFileFields' => [
                'path'
            ]
        ]
    );
    public $belongsTo = [
        'News'
    ];
}