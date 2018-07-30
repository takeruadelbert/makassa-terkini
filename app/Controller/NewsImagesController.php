<?php

App::uses('AppController', 'Controller');

class NewsImagesController extends AppController {

    var $disabledAction=array(
    );
    
    function admin_index() {
        $this->contain = [
            "News" => [
                "NewsCategory"
            ]
        ];
        $this->_options();
        parent::admin_index();
    }
    
    function admin_view($id = null) {
        if (!$this->NewsImage->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->NewsImage->data['NewsImage']['id'] = $id;
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->_options();
    }
    
    function _options() {
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->News->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"))));
    }
}
