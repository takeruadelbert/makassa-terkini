<?php

class ModuleContent extends AppModel {

    var $name = 'ModuleContent';
    var $actsAs = array('Containable');
    var $validate = array(
        'module_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus dipilih'
        ),
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Harus diisi'
        )
    );
    var $belongsTo = array(
        'Module',
        "Parent" => array(
            "className" => "ModuleContent",
        )
    );
    var $hasMany = array(
        "ModuleLink",
    );
    var $virtualFields = array(
    );

    function deleteData($id = null) {
        return $this->delete($id);
    }

    function afterFind($results, $primary = false) {
        parent::afterFind($results, $primary);
//        debug($results);
        return $results;
    }

}

?>
