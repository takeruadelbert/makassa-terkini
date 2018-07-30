<?php

App::uses('AppController', 'Controller');

class NewslettersController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Data Newsletter");
        $this->_setPageInfo("admin_add", "Tambah Data Newsletter");
        $this->_setPageInfo("admin_edit", "Ubah Data Newsletter");
        $this->_setPageInfo("admin view", "Lihat Data Newsletter");
    }
    
    function admin_index() {
        $this->contain=[

        ];
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
    }
    
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->Newsletter->data['Newsletter']['id'] = $id;
                    
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
    }
    
    function admin_view($id = null) {
        if (!$this->Newsletter->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->Newsletter->data['Newsletter']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
    }
    
    function _options() {
        
    }
    
    function front_subscribe() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                $this->Session->setFlash(__(""), 'default', array(), 'newsletter-sukses');
                $this->redirect('/');
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__(""), 'default', array(), 'newsletter-gagal-email-sudah-terdaftar');
                $this->redirect('/');
            }
        }
    }
    
    function mobile_subscribe() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                $this->Session->setFlash(__(""), 'default', array(), 'newsletter-sukses');
                $this->redirect('/m');
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__(""), 'default', array(), 'newsletter-gagal-email-sudah-terdaftar');
                $this->redirect('/m');
            }
        }
    }
    
    function admin_send_newsletter($id = null) {
        $success = true;
        $email = $this->Newsletter->find("first",[
            "conditions" => [
                "Newsletter.id" => $id,
            ]
        ]);
        try {            
            $this->_sentEmail("newsletter", [
                "tujuan" => $email['Newsletter']['email'],
                "subject" => "Makassar Terkini - Newsletter",
                "from" => "istana.tasking@gmail.com",
                "acc" => "NoReply2",
                "item" => [
                    "id" => $id
                ],
            ]);
        } catch (Exception $e) {
            $success = false;
            $this->Session->setFlash(__("Terdapat kesalahan saat mengirimkan email."), 'default', array(), 'danger');
        }
        if ($success == true) {
            $this->Session->setFlash(__("Pengiriman Newsletter Berhasil."), 'default', array(), 'success');
        } else {
            $this->Session->setFlash(__("Terdapat kesalahan saat mengirimkan email."), 'default', array(), 'danger');
        }
        $this->redirect(array('action' => 'admin_index'));
    }
    
    function stop_subscribe($id = null) {
        try {
            $this->Newsletter->query("DELETE FROM newsletters WHERE id = $id");
            $this->Session->setFlash(__(""), 'default', array(), 'berhenti-berlangganan-newsletter-sukses');
        } catch(Exception $e) {
            $this->Session->setFlash(__(""), 'default', array(), 'berhenti-berlangganan-newsletter-gagal');
        }
        $this->redirect("/stop-subscribe/$id");
    }
}
