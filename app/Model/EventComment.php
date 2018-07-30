<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventComment extends AppModel {
    var $name = 'EventComment';
    var $validate = array(
        'comentator_name' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'comment' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'comment_status_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
    );
    var $belongsTo = array(
        'CommentStatus',
    );
}