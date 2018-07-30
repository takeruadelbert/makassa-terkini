<?php

class CompanyProfilesController extends AppController {

    var $disabledAction = array(
        "admin_index",
        "admin_add",
    );

    function admin_index() {
        $this->contain = array(
            "State",
            "City",
        );
        parent::admin_index();
    }

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_edit", "Ubah Konfigurasi Web");
    }

    function beforeRender() {
        parent::beforeRender();
        $this->set("cities", $this->{ Inflector::classify($this->name) }->City->find("list", array("fields" => array("City.id", "City.name"))));
        $this->set("states", $this->{ Inflector::classify($this->name) }->State->find("list", array("fields" => array("State.id", "State.name"))));
    }

    function admin_edit($id = null) {
        $id = 1;
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                App::import("Vendor", "qqUploader");
                $allowedExt = array("jpg", "jpeg", "png");
                $size = 10 * 1024 * 1024;
                $uploader = new qqFileUploader($allowedExt, $size, $this->data['CompanyProfile']['file_logo']);
                $result = $uploader->handleUpload("img" . DS);
                unset($this->CompanyProfile->data['CompanyProfile']['file_logo']);
//                debug($result);
//                die;
                switch ($result['status']) {
                    case 206:
                        $this->CompanyProfile->data['CompanyProfile']['path_logo'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                        break;
                }
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->{ Inflector::classify($this->name) }->save();
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect("/setting");
                } else {
                    
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array(
                'conditions' => array(
                    Inflector::classify($this->name) . ".id" => $id
                ),
                'recursive' => 2
            ));
            $this->data = $rows;
        }
    }

}
