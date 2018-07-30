<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class News extends AppModel {

    var $name = 'News';
    var $validate = array(
        'title_ind' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'content_ind' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
//        'sinopsys_ind' => array(
//            'rule' => 'notEmpty',
//            'message' => 'Harus diisi'
//        ),
        'news_category_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'meta_key' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
    );
    public $belongsTo = array(
        'NewsStatus',
        'NewsCategory',
        'Author' => [
            "className" => "Account",
            "foreignKey" => "author_id",
        ],
        "Editor" => [
            "className" => "Account",
            "foreignKey" => "editor_id",
        ],
        'Publisher' => [
            "className" => "Account",
            "foreignKey" => "publisher_id",
        ],
        'NewsType',
    );
    public $hasMany = array(
        'NewsImage' => [
            "dependent" => true,
        ],
    );
    public $virtualFields = [
//        "popular_rate" => "CAST(News.hits / (TIMESTAMPDIFF(DAY, News.news_date, NOW()) + 1) as DECIMAL(10,5))",
        "popular_rate" => "News.hits",
    ];

}
