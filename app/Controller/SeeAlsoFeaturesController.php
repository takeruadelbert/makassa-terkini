<?php

App::uses('AppController', 'Controller');

class SeeAlsoFeaturesController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Fitur Baca Juga");
        $this->_setPageInfo("admin_add", "Tambah Fitur Baca Juga");
        $this->_setPageInfo("admin_edit", "Ubah Fitur Baca Juga");
        $this->_setPageInfo("admin_edit", "Lihat Fitur Baca Juga");
    }
    
    function admin_index() {
        $this->contain=[
            
        ];
        $this->_options();
        parent::admin_index();
    }
    
    function admin_add() {
        if ($this->request->is("post")) {
            $category = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->NewsCategory->find("first",[
                "conditions" => [
                    "NewsCategory.id" => $this->data['Dummy']['news_category_id'],
                ],
            ]);
            $this->SeeAlsoFeature->data['SeeAlsoFeature']['parent_category'] = $category['NewsCategory']['name'];
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
        $this->_options();
    }
    
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $category = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->NewsCategory->find("first",[
                "conditions" => [
                    "NewsCategory.id" => $this->data['Dummy']['news_category_id'],
                ],
            ]);
            $this->SeeAlsoFeature->data['SeeAlsoFeature']['parent_category'] = $category['NewsCategory']['name'];
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->SeeAlsoFeature->data['SeeAlsoFeature']['id'] = $id;
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
            $category = $rows['SeeAlsoFeature']['parent_category'];
            $parentCategoryId = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->NewsCategory->find("first",[
                "conditions" => [
                    "NewsCategory.name" => $category, 
                ],
            ]);
            $parentCategory = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->NewsCategory->find("all",[
                "conditions" => [
                    "AND" => [
                        "NewsCategory.parent_id" => null,
                    ],
                ],
            ]);
            $subCategory = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->NewsCategory->find("all",[
                "conditions" => [
                    "OR" => [
                        "NewsCategory.parent_id" => $parentCategoryId['NewsCategory']['id'],
                        "NewsCategory.id" => $parentCategoryId['NewsCategory']['id'],
                    ],
                ],
            ]);
            $titles1 = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $rows['SeeAlsoFeatureDetail'][0]['News']['NewsCategory']['name'],
                ],
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "order" => "News.id desc"
            ]);
            $titles2 = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $rows['SeeAlsoFeatureDetail'][1]['News']['NewsCategory']['name'],
                ],
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "order" => "News.id desc"
            ]);
            $titles3 = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $rows['SeeAlsoFeatureDetail'][2]['News']['NewsCategory']['name'],
                ],
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "order" => "News.id desc"
            ]);
            $this->set("category", $category);
            $this->set("parentCategory", $parentCategory);
            $this->set("subCategories", $subCategory);
            $this->set("newsTitle1", $titles1);
            $this->set("newsTitle2", $titles2);
            $this->set("newsTitle3", $titles3);
        }
        $this->_options();
    }        
    
    function admin_view($id = null) {
        if (!$this->SeeAlsoFeature->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->SeeAlsoFeature->data['SeeAlsoFeature']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 4,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
            $category = $rows['SeeAlsoFeature']['parent_category'];
            $parentCategoryId = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->NewsCategory->find("first",[
                "conditions" => [
                    "NewsCategory.name" => $category, 
                ],
            ]);
            $parentCategory = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->NewsCategory->find("all",[
                "conditions" => [
                    "AND" => [
                        "NewsCategory.parent_id" => null,
                    ],
                ],
            ]);
            $subCategory = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->NewsCategory->find("all",[
                "conditions" => [
                    "OR" => [
                        "NewsCategory.parent_id" => $parentCategoryId['NewsCategory']['id'],
                        "NewsCategory.id" => $parentCategoryId['NewsCategory']['id'],
                    ],
                ],
            ]);
            $titles1 = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $rows['SeeAlsoFeatureDetail'][0]['News']['NewsCategory']['name'],
                ],
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "order" => "News.id"
            ]);
            $titles2 = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $rows['SeeAlsoFeatureDetail'][1]['News']['NewsCategory']['name'],
                ],
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "order" => "News.id"
            ]);
            $titles3 = $this->SeeAlsoFeature->SeeAlsoFeatureDetail->News->find("all",[
                "conditions" => [
                    "NewsCategory.name" => $rows['SeeAlsoFeatureDetail'][2]['News']['NewsCategory']['name'],
                ],
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "order" => "News.id"
            ]);
            $this->set("category", $category);
            $this->set("parentCategory", $parentCategory);
            $this->set("subCategories", $subCategory);
            $this->set("newsTitle1", $titles1);
            $this->set("newsTitle2", $titles2);
            $this->set("newsTitle3", $titles3);
        }
        $this->_options();
    }
        
    function _options() {
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->SeeAlsoFeatureDetail->News->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"), "conditions" => array("NewsCategory.parent_id" => null))));
    }
}