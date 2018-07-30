<?php

App::uses('AppController', 'Controller');

class AdvertsController extends AppController {

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
            "AdvertStatus",
            "AdvertType",
            "AdvertPosition",
            "DataCustomer",
        ];
        $this->_options();
        parent::admin_index();
    }
    
    function admin_add() {
        if ($this->request->is("post") || $this->request->is("put")) {
            if(empty($this->data['Advert'][0]['gambar']['tmp_name']) && !empty($this->data['Advert']['banner_html'])) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                    $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                }
            } else if(!empty($this->data['Advert'][0]['gambar']['tmp_name']) && empty($this->data['Advert']['banner_html'])) {
                $size_advert_id = $this->data['Advert']['advert_type_id'];
                $advert = ClassRegistry::init("AdvertType")->find("first",[
                   "conditions" => [
                        "AdvertType.id" => $size_advert_id,
                    ],
                ]);
                $size_advert = $advert['AdvertType']['name'];
                $attribute_file = getimagesize($this->data['Advert'][0]['gambar']['tmp_name']);
                $size_file_width = $attribute_file[0];
                $size_file_height = $attribute_file[1];
                $file_size = $size_file_width . "x" . $size_file_height;
                if($size_advert == $file_size) {
                    $this->{ Inflector::classify($this->name) }->set($this->data);
                    if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {                        
                        App::import("Vendor", "qqUploader");
                        $allowedExt = array("jpg", "jpeg", "png", "gif");
                        $size = 10 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->data['Advert'][0]['gambar']);
                        $result = $uploader->handleUpload("img" . DS . "adverts" . DS);
                        unset($this->Advert->data['Advert'][0]['gambar']);
                        switch ($result['status']) {
                            case 206:
                                $this->Advert->data['Advert']['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                break;
                        }
                        $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                        $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                        $this->redirect(array('action' => 'admin_index'));
                    } else {                        
                        $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    }
                } else {
                    $this->Session->setFlash(__("Ukuran file yang diupload tidak sama dengan ukuran iklan."), 'default', array(), 'danger');
                }
            } else if(empty($this->data['Advert'][0]['gambar']['tmp_name']) && empty($this->data['Advert']['banner_html'])) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                    $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                }
            } else if(!empty($this->data['Advert'][0]['gambar']['tmp_name']) && !empty($this->data['Advert']['banner_html'])) {
                $size_advert_id = $this->data['Advert']['advert_type_id'];
                $advert = ClassRegistry::init("AdvertType")->find("first",[
                   "conditions" => [
                        "AdvertType.id" => $size_advert_id,
                    ],
                ]);
                $size_advert = $advert['AdvertType']['name'];
                $attribute_file = getimagesize($this->data['Advert'][0]['gambar']['tmp_name']);
                $size_file_width = $attribute_file[0];
                $size_file_height = $attribute_file[1];
                $file_size = $size_file_width . "x" . $size_file_height;
                if($size_advert == $file_size) {
                    $this->{ Inflector::classify($this->name) }->set($this->data);
                    if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {                     
                        App::import("Vendor", "qqUploader");
                        $allowedExt = array("jpg", "jpeg", "png", "gif");
                        $size = 10 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->data['Advert'][0]['gambar']);
                        $result = $uploader->handleUpload("img" . DS . "adverts" . DS);
                        unset($this->Advert->data['Advert'][0]['gambar']);
                        switch ($result['status']) {
                            case 206:
                                $this->Advert->data['Advert']['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                break;
                        }
                        $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                        $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                        $this->redirect(array('action' => 'admin_index'));
                    } else {
                        $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    }
                } else {
                    $this->Session->setFlash(__("Ukuran file yang diupload tidak sama dengan ukuran iklan."), 'default', array(), 'danger');
                }
            }             
        }
        $this->set("advertStatuses", $this->{ Inflector::classify($this->name) }->AdvertStatus->find("list", array("fields" => array("AdvertStatus.id", "AdvertStatus.name"))));
        $this->set("advertTypes", $this->{ Inflector::classify($this->name) }->AdvertType->find("list", array("fields" => array("AdvertType.id", "AdvertType.name"))));
        $this->set("advertPositions", $this->{ Inflector::classify($this->name) }->AdvertPosition->find("list", array("fields" => array("AdvertPosition.id", "AdvertPosition.name"), "order" => "AdvertPosition.name")));
    }
      
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            if(empty($this->data['Advert'][0]['gambar']['tmp_name']) && !empty($this->data['Advert']['banner_html'])) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                if ($this->{ Inflector::classify($this->name) }->validates()) {
                    if (!is_null($id)) {
                        $this->{ Inflector::classify($this->name) }->id = $id;
                        $this->Advert->data['Advert']['id'] = $id;
                        $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                        $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                        $this->data = $rows;
                        $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                        $this->redirect(array('action' => 'admin_index'));
                    } else {

                    }
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                }
            } else if(!empty($this->data['Advert'][0]['gambar']['tmp_name']) && empty($this->data['Advert']['banner_html'])) {
                $size_advert_id = $this->data['Advert']['advert_type_id'];
                $advert = ClassRegistry::init("AdvertType")->find("first",[
                   "conditions" => [
                        "AdvertType.id" => $size_advert_id,
                    ],
                ]);
                $size_advert = $advert['AdvertType']['name'];
                $attribute_file = getimagesize($this->data['Advert'][0]['gambar']['tmp_name']);
                $size_file_width = $attribute_file[0];
                $size_file_height = $attribute_file[1];
                $file_size = $size_file_width . "x" . $size_file_height;
                if($size_advert == $file_size) {
                    $this->{ Inflector::classify($this->name) }->set($this->data);
                    if ($this->{ Inflector::classify($this->name) }->validates()) {
                        if (!is_null($id)) {
                            $this->{ Inflector::classify($this->name) }->id = $id;
                            $this->Advert->data['Advert']['id'] = $id;                        
                            App::import("Vendor", "qqUploader");
                            $allowedExt = array("jpg", "jpeg", "png", "gif");
                            $size = 10 * 1024 * 1024;
                            $uploader = new qqFileUploader($allowedExt, $size, $this->data['Advert'][0]['gambar']);
                            $result = $uploader->handleUpload("img" . DS . "adverts" . DS);
                            unset($this->Advert->data['Advert'][0]['gambar']);
                            switch ($result['status']) {
                                case 206:
                                    $this->Advert->data['Advert']['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                    break;
                            }
                            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                            $this->data = $rows;
                            $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                            $this->redirect(array('action' => 'admin_index'));
                        } else {
                            
                        }
                    } else {                        
                        $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    }
                } else {
                    $this->Session->setFlash(__("Ukuran file yang diupload tidak sama dengan ukuran iklan."), 'default', array(), 'danger');
                }
            } else if(empty($this->data['Advert'][0]['gambar']['tmp_name']) && empty($this->data['Advert']['banner_html'])) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                if ($this->{ Inflector::classify($this->name) }->validates()) {
                    if (!is_null($id)) {
                        $this->{ Inflector::classify($this->name) }->id = $id;
                        $this->Advert->data['Advert']['id'] = $id;
                        $this->Advert->data['DataCustomer']['id'] = $this->data['Advert']['data_customer_id'];
                        $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                        $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                        $this->data = $rows;
                        $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                        $this->redirect(array('action' => 'admin_index'));
                    } else {

                    }
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                }
            } else if(!empty($this->data['Advert'][0]['gambar']['tmp_name']) && !empty($this->data['Advert']['banner_html'])) {
                $size_advert_id = $this->data['Advert']['advert_type_id'];
                $advert = ClassRegistry::init("AdvertType")->find("first",[
                   "conditions" => [
                        "AdvertType.id" => $size_advert_id,
                    ],
                ]);
                $size_advert = $advert['AdvertType']['name'];
                $attribute_file = getimagesize($this->data['Advert'][0]['gambar']['tmp_name']);
                $size_file_width = $attribute_file[0];
                $size_file_height = $attribute_file[1];
                $file_size = $size_file_width . "x" . $size_file_height;
                if($size_advert == $file_size) {
                    $this->{ Inflector::classify($this->name) }->set($this->data);
                    if ($this->{ Inflector::classify($this->name) }->validates()) {
                        if (!is_null($id)) {
                            $this->{ Inflector::classify($this->name) }->id = $id;
                            $this->Advert->data['Advert']['id'] = $id;                        
                            App::import("Vendor", "qqUploader");
                            $allowedExt = array("jpg", "jpeg", "png", "gif");
                            $size = 10 * 1024 * 1024;
                            $uploader = new qqFileUploader($allowedExt, $size, $this->data['Advert'][0]['gambar']);
                            $result = $uploader->handleUpload("img" . DS . "adverts" . DS);
                            unset($this->Advert->data['Advert'][0]['gambar']);
                            switch ($result['status']) {
                                case 206:
                                    $this->Advert->data['Advert']['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                    break;
                            }
                            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                            $this->data = $rows;
                            $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                            $this->redirect(array('action' => 'admin_index'));
                        } else {

                        }
                    } else {
                        $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    }
                } else {
                    $this->Session->setFlash(__("Ukuran file yang diupload tidak sama dengan ukuran iklan."), 'default', array(), 'danger');
                }
            }             
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("advertStatuses", $this->{ Inflector::classify($this->name) }->AdvertStatus->find("list", array("fields" => array("AdvertStatus.id", "AdvertStatus.name"))));
        $this->set("advertTypes", $this->{ Inflector::classify($this->name) }->AdvertType->find("list", array("fields" => array("AdvertType.id", "AdvertType.name"))));
        $this->set("advertPositions", $this->{ Inflector::classify($this->name) }->AdvertPosition->find("list", array("fields" => array("AdvertPosition.id", "AdvertPosition.name"), "order" => "AdvertPosition.name")));
    }
    
    function admin_view($id = null) {
        if (!$this->Advert->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->Advert->data['Advert']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("advertStatuses", $this->{ Inflector::classify($this->name) }->AdvertStatus->find("list", array("fields" => array("AdvertStatus.id", "AdvertStatus.name"))));
        $this->set("advertTypes", $this->{ Inflector::classify($this->name) }->AdvertType->find("list", array("fields" => array("AdvertType.id", "AdvertType.name"))));
        $this->set("advertPositions", $this->{ Inflector::classify($this->name) }->AdvertPosition->find("list", array("fields" => array("AdvertPosition.id", "AdvertPosition.name"), "order" => "AdvertPosition.name")));
    }
        
    function _options() {
        $this->set("advertStatuses", $this->{ Inflector::classify($this->name) }->AdvertStatus->find("list", array("fields" => array("AdvertStatus.id", "AdvertStatus.name"))));
        $this->set("advertTypes", $this->{ Inflector::classify($this->name) }->AdvertType->find("list", array("fields" => array("AdvertType.id", "AdvertType.name"))));
        $this->set("advertPositions", $this->{ Inflector::classify($this->name) }->AdvertPosition->find("list", array("fields" => array("AdvertPosition.id", "AdvertPosition.name"))));
        $this->set("dataCustomers", $this->{ Inflector::classify($this->name) }->DataCustomer->find("list", array("fields" => array("DataCustomer.id", "DataCustomer.name"))));
    }
    
    function admin_upload_image() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->jump = true;
        App::import('Vendor', 'qqUploaderNews');
    }
    
    function count_clicked_adv($adv_id = null) {
        $this->autoRender = false;
        if($this->Advert->exists($adv_id)) {
            if($this->request->is("POST") || $this->request->is("PUT")) {
                $data = $this->Advert->find("first",[
                    "conditions" => [
                        "Advert.id" => $adv_id,
                    ]
                ]);
                $this->{ Inflector::classify($this->name) }->id = $adv_id;
                $this->Advert->data['Advert']['id'] = $adv_id;
                $this->Advert->data['Advert']['hits'] = $data['Advert']['hits'] + 1;
                $this->Advert->save();
            }
        } else {
            throw new NotFoundException(__("Data Not Found"));
        }
    }
    
    function admin_advert_archives() {
        $this->contain=[
            "AdvertStatus",
            "AdvertType",
        ];
        $this->_options();
        parent::admin_index();
    }
}