<?php

App::uses('AppController', 'Controller');

class SlideshowsController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Iklan");
        $this->_setPageInfo("admin_add", "Tambah Iklan");
        $this->_setPageInfo("admin_edit", "Ubah Iklan");
        $this->_setPageInfo("admin_edit", "Lihat Iklan");
    }
    
    function admin_index() {
        $this->contain=[
            "ShowingStatus",
            "SlideshowType",
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
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->SlideshowDetail->News->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"))));
        $this->set("slideshowTypes", $this->{ Inflector::classify($this->name) }->SlideshowType->find("list", array("fields" => array("SlideshowType.id", "SlideshowType.name"))));
    }
    
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->Slideshow->data['Slideshow']['id'] = $id;
                    $this->{ Inflector::classify($this->name) }->saveAll();
                    $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 3, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                    $this->data = $rows;
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 3, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
            $categories[] = [];
            foreach ($this->data['SlideshowDetail'] as $k => $category) {
                $categories[$k] = $category['News']['NewsCategory']['name'];
            }
            $titles1 = $this->Slideshow->SlideshowDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $categories[0],
                ],
                "fields" => [
                    "News.title_ind",
                ],
                "order" => "News.id"
            ]);
            $title1List[] = [];
            foreach ($titles1 as $k => $title1) {
                $title1List[$k] = $title1['News']['title_ind'];
            }
            $titles2 = $this->Slideshow->SlideshowDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $categories[1],
                ],
                "fields" => [
                    "News.title_ind",
                ],
                "order" => "News.id"
            ]);
            $title2List[] = [];
            foreach ($titles2 as $k => $title2) {
                $title2List[$k] = $title2['News']['title_ind'];
            }
            $titles3 = $this->Slideshow->SlideshowDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $categories[2],
                ],
                "fields" => [
                    "News.title_ind",
                ],
                "order" => "News.id"
            ]);
            $title3List[] = [];
            foreach ($titles3 as $k => $title3) {
                $title3List[$k] = $title3['News']['title_ind'];
            }
            $this->set("newsTitle1", $title1List);
            $this->set("newsTitle2", $title2List);
            $this->set("newsTitle3", $title3List);
        }
        $this->set("showingStatuses", $this->{ Inflector::classify($this->name) }->ShowingStatus->find("list", array("fields" => array("ShowingStatus.id", "ShowingStatus.name"))));
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->SlideshowDetail->News->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"))));
        $this->set("slideshowTypes", $this->{ Inflector::classify($this->name) }->SlideshowType->find("list", array("fields" => array("SlideshowType.id", "SlideshowType.name"))));        
    }        
    
    function admin_view($id = null) {
        if (!$this->Slideshow->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->Slideshow->data['Slideshow']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 4,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("showingStatuses", $this->{ Inflector::classify($this->name) }->ShowingStatus->find("list", array("fields" => array("ShowingStatus.id", "ShowingStatus.name"))));
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->SlideshowDetail->News->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"))));
        $this->set("slideshowTypes", $this->{ Inflector::classify($this->name) }->SlideshowType->find("list", array("fields" => array("SlideshowType.id", "SlideshowType.name"))));
    }
        
    function _options() {
        $this->set("showingStatuses", $this->{ Inflector::classify($this->name) }->ShowingStatus->find("list", array("fields" => array("ShowingStatus.id", "ShowingStatus.name"))));
        $this->set("slideshowTypes", $this->{ Inflector::classify($this->name) }->SlideshowType->find("list", array("fields" => array("SlideshowType.id", "SlideshowType.name"))));
    }
}