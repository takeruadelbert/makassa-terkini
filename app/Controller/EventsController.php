<?php
App::uses('AppController', 'Controller');

class EventsController extends AppController {

    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Event");
        $this->_setPageInfo("admin_add", "Tambah Event");
        $this->_setPageInfo("admin_edit", "Ubah Event");
    }

    function admin_index() {
        $this->_activePrint(func_get_args(), "data_event");
        $this->contain = [
            "EventStatus",
            "EventImage",
        ];
        $this->_options();
        parent::admin_index();
    }

    function admin_edit($id = null) {
        $i = 0;
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->Event->data['Event']['id'] = $id;
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "jpeg", "png");
                    $size = 10 * 1024 * 1024;
                    while($this->data['EventImage'][$i]['gambar'] != null) {
                        $uploader = new qqFileUploader($allowedExt, $size, $this->data['EventImage'][$i]['gambar']);
                        $result = $uploader->handleUpload("img" . DS . "events" . DS);
                        unset($this->Event->data['EventImage'][$i]['gambar']);
                        switch ($result['status']) {
                            case 206:
                                $this->Event->data['EventImage'][$i]['path'] = DS . "{$result['data']['folder']}{$result['data']['fileName']}";
                                break;
                        }
                        $i++;
                    }
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
        $this->set("countries", $this->{ Inflector::classify($this->name) }->Country->find("list", array("fields" => array("Country.id", "Country.name"), "conditions" => array("Country.id" => 100))));
        $this->set("states", $this->{ Inflector::classify($this->name) }->State->find("list", array("fields" => array("State.id", "State.name"))));
        $this->set("cities", $this->{ Inflector::classify($this->name) }->City->find("list", array("fields" => array("City.id", "City.name"))));
        $this->set("eventStatuses", $this->{ Inflector::classify($this->name) }->EventStatus->find("list", array("fields" => array("EventStatus.id", "EventStatus.name"))));
    }

    function admin_add() {
        $i = 0;
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                App::import("Vendor", "qqUploader");
                $allowedExt = array("jpg", "jpeg", "png");
                $size = 10 * 1024 * 1024;
                while($this->data['EventImage'][$i]['gambar'] != null) {
                    $uploader = new qqFileUploader($allowedExt, $size, $this->data['EventImage'][$i]['gambar']);
                    $result = $uploader->handleUpload("img" . DS . "events" . DS);
                    unset($this->Event->data['EventImage'][$i]['gambar']);
                    switch ($result['status']) {
                        case 206:
                            $this->Event->data['EventImage'][$i]['path'] = DS . "{$result['data']['folder']}{$result['data']['fileName']}";
                            break;
                    }
                    $i++;
                }
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        }
        $this->set("countries", $this->{ Inflector::classify($this->name) }->Country->find("list", array("fields" => array("Country.id", "Country.name"), "conditions"=>array("Country.id"=>100))));
        $this->set("states", $this->{ Inflector::classify($this->name) }->State->find("list", array("fields" => array("State.id", "State.name"))));
        $this->set("cities", $this->{ Inflector::classify($this->name) }->City->find("list", array("fields" => array("City.id", "City.name"))));
        $this->set("eventStatuses", $this->{ Inflector::classify($this->name) }->EventStatus->find("list", array("fields" => array("EventStatus.id", "EventStatus.name"))));
    }
    
    function admin_view($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->Event->data['Event']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("countries", $this->{ Inflector::classify($this->name) }->Country->find("list", array("fields" => array("Country.id", "Country.name"))));
        $this->set("states", $this->{ Inflector::classify($this->name) }->State->find("list", array("fields" => array("State.id", "State.name"))));
        $this->set("cities", $this->{ Inflector::classify($this->name) }->City->find("list", array("fields" => array("City.id", "City.name"))));
        $this->set("eventStatuses", $this->{ Inflector::classify($this->name) }->EventStatus->find("list", array("fields" => array("EventStatus.id", "EventStatus.name"))));
    }
    
    function _options() {
        $this->set("eventStatuses", $this->{ Inflector::classify($this->name) }->EventStatus->find("list", array("fields" => array("EventStatus.id", "EventStatus.name"))));
    }
    
    function admin_upload_image() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->jump = true;
        App::import('Vendor', 'qqUploaderEvents');
    }
    
    function count_share_facebook($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $shareData = [];
            $currentEvent = $this->Event->find('first',[
                "conditions" => [
                    "Event.id" => $id,
                ]
            ]);
            $shareData['Event']['fb_share_counts'] = $currentEvent['Event']['fb_share_counts'] + 1;
            $shareData['Event']['id'] = $id;
            $this->Event->saveAll($shareData);
        }
    }
    
    function count_share_twitter($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $shareData = [];
            $currentEvent = $this->Event->find('first',[
                "conditions" => [
                    "Event.id" => $id,
                ]
            ]);
            $shareData['Event']['twitter_share_counts'] = $currentEvent['Event']['twitter_share_counts'] + 1;
            $shareData['Event']['id'] = $id;
            $this->Event->saveAll($shareData);
        }
    }
    
    function count_share_gplus($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $shareData = [];
            $currentEvent = $this->Event->find('first',[
                "conditions" => [
                    "Event.id" => $id,
                ]
            ]);
            $shareData['Event']['gplus_share_counts'] = $currentEvent['Event']['gplus_share_counts'] + 1;
            $shareData['Event']['id'] = $id;
            $this->Event->saveAll($shareData);
        }
    }
    
    function admin_list() {
        $this->autoRender = false;
        if (isset($this->request->query['q'])) {
            $q = $this->request->query['q'];
            $conds = array(
                "or" => array(
                    "Event.title_ind like" => "%$q%",
            ));
        } else {
            $conds = array();
        }
        $suggestions = ClassRegistry::init("Event")->find("all", array(
            "conditions" => $conds,
        ));
        $result = [];
        foreach ($suggestions as $item) {
            if (!empty($item['Event'])) {
                $result[] = [
                    "id" => $item['Event']['id'],
                    "title_ind" => $item['Event']['title_ind'],
                ];
            }
        }
        echo json_encode($result);
    }
}