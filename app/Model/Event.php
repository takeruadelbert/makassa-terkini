<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Event extends AppModel {
    var $name = 'Event';
    var $validate = array (
        'title_ind' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'content_ind' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
//        'title_en' => array(
//            'rule' => 'notEmpty',
//            'message' => 'Harus diisi'
//        ),
//        'content_en' => array(
//            'rule' => 'notEmpty',
//            'message' => 'Harus diisi'
//        ),
//        'sinopsys_ind' => array(
//            'rule' => 'notEmpty',
//            'message' => 'Harus diisi'
//        ),
//        'sinopsys_en' => array(
//            'rule' => 'notEmpty',
//            'message' => 'Harus diisi'
//        ),
        'date' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'time' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
//        'latitude' => array(
//            'rule' => 'notEmpty',
//            'message' => 'Harus diisi'
//        ),
//        'longitude' => array(
//            'rule' => 'notEmpty',
//            'message' => 'Harus diisi'
//        ),
        'event_status_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
    );
    
    public $belongsTo = array(
        'Country',
        'State',
        'City',
        'EventStatus',
    );
    
    public $hasMany = array(
        'EventImage',
    );
}