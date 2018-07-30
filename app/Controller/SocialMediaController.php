<?php

App::uses('AppController', 'Controller');

class SocialMediaController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Sosial Media");
        $this->_setPageInfo("admin_add", "Tambah Sosial Media");
        $this->_setPageInfo("admin_edit", "Ubah Sosial Media");
        $this->_setPageInfo("admin view", "Lihat Sosial Media");
    }
    
    function admin_index() {
        $this->contain=[
            "ShowingStatus",
        ];
        $this->_options();
        parent::admin_index();
    }
    
    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        }
        $this->set("showingStatuses", $this->{ Inflector::classify($this->name) }->ShowingStatus->find("list", array("fields" => array("ShowingStatus.id", "ShowingStatus.name"))));
    }
    
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->SocialMedia->data['SocialMedia']['id'] = $id;
                    $this->{ Inflector::classify($this->name) }->saveAll();
                    $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                    $this->data = $rows;
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("showingStatuses", $this->{ Inflector::classify($this->name) }->ShowingStatus->find("list", array("fields" => array("ShowingStatus.id", "ShowingStatus.name"))));
    }
    
    function admin_view($id = null) {
        if (!$this->SocialMedia->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->SocialMedia->data['SocialMedia']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("showingStatuses", $this->{ Inflector::classify($this->name) }->ShowingStatus->find("list", array("fields" => array("ShowingStatus.id", "ShowingStatus.name"))));
    }
    
    function _options() {
        $this->set("showingStatuses", $this->{ Inflector::classify($this->name) }->ShowingStatus->find("list", array("fields" => array("ShowingStatus.id", "ShowingStatus.name"))));
    }
}
