<?php

App::uses('AppController', 'Controller');

class ModuleContentsController extends AppController {

    var $disabledAction = array(
    );

    function admin_index() {
        $this->contain=array(
            "Module",
            "Parent",
        );
        parent::admin_index();
    }
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Sub Menu");
        $this->_setPageInfo("admin_add", "Tambah Sub Menu");
        $this->_setPageInfo("admin_edit", "Ubah Sub Menu");
    }

    function beforeRender() {
        parent::beforeRender();
        $this->_options();
    }

    function parents($module_id = null) {
        $this->autoRender = false;
        $list = $this->{ Inflector::classify($this->name) }->find("list", array("fields" => array("ModuleContent.id", "ModuleContent.name"), "conditions" => array("Module.id" => $module_id), "recursive" => 1));
        echo json_encode($list);
    }

    function _options() {
        $this->set("modules", $this->{ Inflector::classify($this->name) }->Module->find("list", array("fields" => array("Module.id", "Module.name"))));
        $this->set("moduleContents", $this->{ Inflector::classify($this->name) }->find("list", array("fields" => array("ModuleContent.id", "ModuleContent.name"))));
        if ($this->params['action'] == "admin_edit") {
            $this->set("parents", $this->{ Inflector::classify($this->name) }->find("list", array("fields" => array("ModuleContent.id", "ModuleContent.name"), "conditions" => array("Module.id" => $this->data['Module']['id']), "recursive" => 1)));
        }
    }

}
