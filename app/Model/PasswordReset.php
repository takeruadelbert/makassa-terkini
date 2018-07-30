<?php

class PasswordReset extends AppModel {

    var $name = 'PasswordReset';
    var $validate = array(
    );
    var $belongsTo = array(
    );
    var $hasMany = array(
    );
    var $virtualFields = array(
    );
    var $hasOne = array(
        "Account",
    );
    function deleteData($id = null) {
        return $this->delete($id);
    }

}

?>
