<?php

App::uses('AppController', 'Controller');

class EventImagesController extends AppController {

    var $name = "EventImages";
    var $disabledAction=array(
        'admin_index',
        'admin_add',
        'admin_edit',
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }
    
//    function admin_delete($id = null) {
//        if(!is_null($id)) {
//            $this->EventImage->query("DELETE FROM event_images WHERE id = $id");
//        } else {
//            debug("unable deleted.");
//        }
//    }
}
