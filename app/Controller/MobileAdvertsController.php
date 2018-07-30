<?php

App::uses('AppController', 'Controller');

class MobileAdvertsController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Iklan Mobile");
        $this->_setPageInfo("admin_add", "Tambah Iklan Mobile");
        $this->_setPageInfo("admin_edit", "Ubah Iklan Mobile");
        $this->_setPageInfo("admin_edit", "Lihat Iklan Mobile");
    }
    
    function admin_index() {
        $this->contain=[
            "AdvertStatus",
            "AdvertPosition",
            "DataCustomer",
        ];
        $this->_options();
        $this->order = "MobileAdvert.id";
        parent::admin_index();
    }
      
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            if(empty($this->data['MobileAdvert'][0]['gambar']['tmp_name']) && !empty($this->data['MobileAdvert']['banner_html'])) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                if ($this->{ Inflector::classify($this->name) }->validates()) {
                    if (!is_null($id)) {
                        $this->{ Inflector::classify($this->name) }->id = $id;
                        $this->Advert->data['MobileAdvert']['id'] = $id;
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
            } else if(!empty($this->data['MobileAdvert'][0]['gambar']['tmp_name']) && empty($this->data['MobileAdvert']['banner_html'])) {
                $size_advert = "980x280";

                $attribute_file = getimagesize($this->data['MobileAdvert'][0]['gambar']['tmp_name']);
                $size_file_width = $attribute_file[0];
                $size_file_height = $attribute_file[1];
                $file_size = $size_file_width . "x" . $size_file_height;
                if($size_advert == $file_size) {
                    $this->{ Inflector::classify($this->name) }->set($this->data);
                    if ($this->{ Inflector::classify($this->name) }->validates()) {
                        if (!is_null($id)) {
                            $this->{ Inflector::classify($this->name) }->id = $id;
                            $this->MobileAdvert->data['MobileAdvert']['id'] = $id;                        
                            App::import("Vendor", "qqUploader");
                            $allowedExt = array("jpg", "jpeg", "png", "gif");
                            $size = 10 * 1024 * 1024;
                            $uploader = new qqFileUploader($allowedExt, $size, $this->data['MobileAdvert'][0]['gambar']);
                            $result = $uploader->handleUpload("img" . DS . "mobile_adverts" . DS);
                            unset($this->MobileAdvert->data['MobileAdvert'][0]['gambar']);
                            switch ($result['status']) {
                                case 206:
                                    $this->MobileAdvert->data['MobileAdvert']['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
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
            } else if(empty($this->data['MobileAdvert'][0]['gambar']['tmp_name']) && empty($this->data['MobileAdvert']['banner_html'])) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                if ($this->{ Inflector::classify($this->name) }->validates()) {
                    if (!is_null($id)) {
                        $this->{ Inflector::classify($this->name) }->id = $id;
                        $this->MobileAdvert->data['MobileAdvert']['id'] = $id;
                        $this->Advert->data['DataCustomer']['id'] = $this->data['MobileAdvert']['data_customer_id'];
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
            } else if(!empty($this->data['MobileAdvert'][0]['gambar']['tmp_name']) && !empty($this->data['MobileAdvert']['banner_html'])) {
                $size_advert = "980x280";
                
                $attribute_file = getimagesize($this->data['MobileAdvert'][0]['gambar']['tmp_name']);
                $size_file_width = $attribute_file[0];
                $size_file_height = $attribute_file[1];
                $file_size = $size_file_width . "x" . $size_file_height;
                if($size_advert == $file_size) {
                    $this->{ Inflector::classify($this->name) }->set($this->data);
                    if ($this->{ Inflector::classify($this->name) }->validates()) {
                        if (!is_null($id)) {
                            $this->{ Inflector::classify($this->name) }->id = $id;
                            $this->MobileAdvert->data['MobileAdvert']['id'] = $id;                        
                            App::import("Vendor", "qqUploader");
                            $allowedExt = array("jpg", "jpeg", "png", "gif");
                            $size = 10 * 1024 * 1024;
                            $uploader = new qqFileUploader($allowedExt, $size, $this->data['MobileAdvert'][0]['gambar']);
                            $result = $uploader->handleUpload("img" . DS . "mobile_adverts" . DS);
                            unset($this->MobileAdvert->data['MobileAdvert'][0]['gambar']);
                            switch ($result['status']) {
                                case 206:
                                    $this->MobileAdvert->data['MobileAdvert']['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
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
        $this->set("advertPositions", $this->{ Inflector::classify($this->name) }->AdvertPosition->find("list", array("fields" => array("AdvertPosition.id", "AdvertPosition.name"), "order" => "AdvertPosition.name")));
    }
    
    function admin_view($id = null) {
        if (!$this->MobileAdvert->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->MobileAdvert->data['MobileAdvert']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("advertStatuses", $this->{ Inflector::classify($this->name) }->AdvertStatus->find("list", array("fields" => array("AdvertStatus.id", "AdvertStatus.name"))));
        $this->set("advertPositions", $this->{ Inflector::classify($this->name) }->AdvertPosition->find("list", array("fields" => array("AdvertPosition.id", "AdvertPosition.name"), "order" => "AdvertPosition.name")));
    }
        
    function _options() {
        $this->set("advertStatuses", $this->{ Inflector::classify($this->name) }->AdvertStatus->find("list", array("fields" => array("AdvertStatus.id", "AdvertStatus.name"))));
        $this->set("advertPositions", $this->{ Inflector::classify($this->name) }->AdvertPosition->find("list", array("fields" => array("AdvertPosition.id", "AdvertPosition.name"))));
        $this->set("dataCustomers", $this->{ Inflector::classify($this->name) }->DataCustomer->find("list", array("fields" => array("DataCustomer.id", "DataCustomer.name"))));
    }
    
    function admin_upload_image() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->jump = true;
        App::import('Vendor', 'qqUploaderMobileAdverts');
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
}