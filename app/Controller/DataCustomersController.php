<?php

App::uses('AppController', 'Controller');

class DataCustomersController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Data Pelanggan");
        $this->_setPageInfo("admin_add", "Tambah Data Pelanggan");
        $this->_setPageInfo("admin_edit", "Ubah Data Pelanggan");
        $this->_setPageInfo("admin view", "Lihat Data Pelanggan");
    }
    
    function admin_index() {
        $this->_activePrint(func_get_args(), "data_customer");
        $this->contain=[
            "City",
            "State",
            "Country",
            "Gender",
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
        $this->_options();
    }
    
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->DataCustomer->data['DataCustomer']['id'] = $id;
                    
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
        $this->_options();
    }
    
    function admin_view($id = null) {
        if (!$this->DataCustomer->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->DataCustomer->data['DataCustomer']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->_options();
    }
    
    function _options() {
        $this->set("states", $this->{ Inflector::classify($this->name) }->State->find("list", array("fields" => array("State.id", "State.name"))));
        $this->set("cities", $this->{ Inflector::classify($this->name) }->City->find("list", array("fields" => array("City.id", "City.name"))));
        $this->set("countries", $this->{ Inflector::classify($this->name) }->Country->find('list',[
            "conditions" => [
                "Country.id" => 100
            ]
        ]));
        $this->set("genders", $this->{ Inflector::classify($this->name) }->Gender->find("list", array("fields" => array("Gender.id", "Gender.name"))));
    }
     
    function admin_list() {
        $this->autoRender = false;
        if (isset($this->request->query['q'])) {
            $q = $this->request->query['q'];
            $conds = array(
                "or" => array(
                    "DataCustomer.name like" => "%$q%",
            ));
        } else {
            $conds = array();
        }
        $suggestions = ClassRegistry::init("DataCustomer")->find("all", array(
            "conditions" => $conds,
        ));
        $result = [];
        foreach ($suggestions as $item) {
            if (!empty($item['DataCustomer'])) {
                $result[] = [
                    "id" => $item['DataCustomer']['id'],
                    "nama" => $item['DataCustomer']['name'],
                ];
            }
        }
        echo json_encode($result);
    }
}
