<?php

App::uses('AppController', 'Controller');

class NewsCategoriesController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Kategori Berita");
        $this->_setPageInfo("admin_add", "Tambah Kategori Berita");
        $this->_setPageInfo("admin_edit", "Ubah Kategori Berita");
    }
    
    function admin_index() {
        $this->contain=array(
            "Parent",
        );
        $this->_options();
        parent::admin_index();
    }
    
    function beforeRender() {
        parent::beforeRender();
        $this->_options();
    }

    function parents($news_id = null) {
        $this->autoRender = false;
        $list = $this->{ Inflector::classify($this->name) }->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"), "conditions" => array("News.id" => $news_id), "recursive" => 1));
        echo json_encode($list);
    }

    function _options() {
        $newsCategories = $this->{ Inflector::classify($this->name) }->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ['Parent']));
        $newsCategories['Kategori Utama'] = $newsCategories[0];
        $this->set(compact("newsCategories"));
//        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->find("list", array("conditions"=> array("NewsCategory.parent_id" => null))));
//        if ($this->params['action'] == "admin_edit" || $this->params['action'] == 'admin_add' || $this->params['action'] == 'admin_view') {
//            $this->set("parents", $this->{ Inflector::classify($this->name) }->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"), "recursive" => 1)));
//        }
    }
    
    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                App::import("Vendor", "qqUploader");
                $allowedExt = array("jpg", "jpeg", "png");
                $size = 10 * 1024 * 1024;
                $uploader = new qqFileUploader($allowedExt, $size, $this->data['NewsCategory']['gambar']);
                $result = $uploader->handleUpload("img" . DS . "category-logo" . DS);
                unset($this->NewsCategory->data['NewsCategory']['gambar']);
                switch ($result['status']) {
                    case 206:
                        $this->NewsCategory->data['NewsCategory']['logo_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                        break;
                }
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        }
        $newsCategories = $this->{ Inflector::classify($this->name) }->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ['Parent']));
        $newsCategories['Kategori Utama'] = $newsCategories[0];
        $this->set("parents", $newsCategories);
    }
    
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->NewsCategory->data['NewsCategory']['id'] = $id;
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "jpeg", "png");
                    $size = 10 * 1024 * 1024;
                    $uploader = new qqFileUploader($allowedExt, $size, $this->data['NewsCategory']['gambar']);
                    $result = $uploader->handleUpload("img" . DS . "category-logo" . DS);
                    unset($this->NewsCategory->data['NewsCategory']['gambar']);
                    switch ($result['status']) {
                        case 206:
                            $this->NewsCategory->data['NewsCategory']['logo_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                            break;
                    }
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                    $rows = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                    $this->data = $rows;
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $newsCategories = $this->{ Inflector::classify($this->name) }->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ['Parent']));
        $newsCategories['Kategori Utama'] = $newsCategories[0];
        $this->set("parents", $newsCategories);
    }
    
    function admin_view($id = null) {
        if (!$this->NewsCategory->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->NewsCategory->data['NewsCategory']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
    }
    
    function admin_list($parent_id = false) {
        if ($parent_id === false) {
            $data = $this->NewsCategory->find("list", [
                "fields" => [
                    "NewsCategory.id",
                    "NewsCategory.name",
                ]
            ]);
        } else {
            $data = $this->NewsCategory->find("list", [
                "fields" => [
                    "NewsCategory.id",
                    "NewsCategory.name",
                ],
                "conditions" => [
                    "OR" => [
                        "NewsCategory.parent_id" => $parent_id,
                        "NewsCategory.id" => $parent_id,
                    ]
                ]
            ]);
        }
        echo json_encode($this->_generateStatusCode(205, null, $data));
        die;
    }
}
