<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewsCategory extends AppModel {

    var $name = "NewsCategory";
    var $actsAs = array('Containable');
    var $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'parent_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi',
        ),
    );
    var $belongsTo = array(
        "Parent" => array(
            "className" => "NewsCategory",
            "foreignKey"=>"parent_id",
        )
    );
    var $hasMany = [
        "Child" => [
            "className" => "NewsCategory",
            "foreignKey"=>"parent_id",
        ]
    ];

}
