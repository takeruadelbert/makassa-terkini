<?php

class User extends AppModel {

    public $validate = array(
        'username' => array(
            'Hasur diisi'=>array("rule"=>"notEmpty"),
            'Sudah terdaftar' => array("rule" => 'isUnique'),
            'Hanya alphanumeric' => array("rule" => 'alphaNumeric'),
        ),
        'password' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'user_group_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus dipilih'
        ),
        'repeat_password' => array(
            'rule1' => array(
                'rule' => 'checkPassword',
                'message' => 'Kata sandi tidak sama'
            ),
            'rule2' => array(
                'rule' => 'notEmpty',
                'message' => 'Harus diisi'
            )
        ),
        'email' => array(
            'Harus diisi' => array("rule" => 'notEmpty'),
            'Sudah terdaftar' => array("rule" => 'isUnique'),
        )
    );
    public $belongsTo = array(
        'UserGroup',
        "Account",
    );
    public $hasOne = array(
        
    );
    
    public $hasMany = array(
        'SocialProfile' => array(
            'className' => 'SocialProfile',
        )
    );

    function checkPassword() {
        if ($this->data['User']['password'] != $this->data['User']['repeat_password']) {
            return false;
        }
        return true;
    }
}
