<?php

class Bowl extends AppModel {

    var $name = 'Bowl';
    var $belongsTo = array(
    );
    var $hasOne = array(
    );
    var $hasMany = array(
        'Fruit'
    );
    var $validate = array(
        "paid_time" => array(
            "Harus diisi" => "notEmpty"
        )
    );
    var $virtualFields = array(
    );

    function beforeValidate($options = array()) {
        
    }

    function deleteData($id = null) {
        return $this->delete($id);
    }

}

?>
