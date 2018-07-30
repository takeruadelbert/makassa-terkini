<?php

class Biodata extends AppModel {

    public $validate = array(
        'first_name' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'address' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'city_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus dipilih'
        ),
        'state_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus dipilih'
        ),
        'handphone' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        ),
        'country_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus dipilih'
        )
    );
    public $belongsTo = array(
        'IdentityType',
        'State',
        'Country',
        'City',
        'Gender',
        "IdentityType",
        "Account",
    );
    public $hasOne = array(
        
    );
    
    public $virtualFields=[
        "full_name"=>"concat(Biodata.first_name,' ',Biodata.last_name)",
    ];

}
