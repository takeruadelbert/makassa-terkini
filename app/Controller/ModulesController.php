<?php

App::uses('AppController', 'Controller');

class ModulesController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Modul");
        $this->_setPageInfo("admin_add", "Tambah Modul");
        $this->_setPageInfo("admin_edit", "Ubah Modul");
    }
    
    function admin_sample(){}
}
