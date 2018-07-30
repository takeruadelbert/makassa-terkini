<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventImage extends AppModel {
    var $name = 'EventImage';
    var $actsAs = array(
        'DeleteableFile' => [
            'deleteableFileFields' => [
                'path'
            ]
        ]
    );
}