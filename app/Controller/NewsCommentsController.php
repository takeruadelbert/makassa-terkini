<?php

App::uses('AppController', 'Controller');

class NewsCommentsController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Komentar");
        $this->_setPageInfo("admin_add", "Tambah Komentar");
        $this->_setPageInfo("admin_edit", "Ubah Komentar");
    }
    
    function admin_index() {
        $this->_activePrint(func_get_args(), "data_news_comment");
        $this->contain=[
            "CommentStatus",
        ];
        $this->_options();
        parent::admin_index();
    }
    
    function admin_change_status() {
        $this->autoRender = false;
        if ($this->request->is("PUT")) {
            $this->NewsComment->id = $this->request->data['id'];
            $this->NewsComment->save(array("NewsComment" => array("comment_status_id" => $this->request->data['status'])));
            $data = $this->NewsComment->find("first", array("conditions" => array("NewsComment.id" => $this->request->data['id']), "recursive" => 1));
            echo json_encode($this->_generateStatusCode(207, null, array("status_label" => $data['CommentStatus']['name'])));
        } else {
            echo json_encode($this->_generateStatusCode(400));
        }
    }
    
    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->NewsComment->data['NewsComment']['id'] = $id;
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
        $this->set("commentStatuses", $this->{ Inflector::classify($this->name) }->CommentStatus->find("list", array("fields" => array("CommentStatus.id", "CommentStatus.name"))));
    }
    
    function admin_view($id = null) {
        if (!$this->NewsComment->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->NewsComment->data['NewsComment']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("commentStatuses", $this->{ Inflector::classify($this->name) }->CommentStatus->find("list", array("fields" => array("CommentStatus.id", "CommentStatus.name"))));
    }
    
    function _options() {
        $this->set("commentStatuses", $this->{ Inflector::classify($this->name) }->CommentStatus->find("list", array("fields" => array("CommentStatus.id", "CommentStatus.name"))));
    }
    
    function front_comment_news() {
        if($this->request->is("post")) {
            if(strlen($this->data['NewsComment']['comment']) > 50 && !empty($this->data['NewsComment']['comment'] && strlen($this->data['NewsComment']['comment']) != 0)) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                    $this->Session->setFlash(__(""), 'default', array(), 'komentar-sukses');
                    $this->redirect($this->referer());
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    $this->Session->setFlash(__(""), 'default', array(), 'komentar-gagal');
                    $this->redirect($this->referer());
                }
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'komentar-kurang-banyak');
                $this->redirect($this->referer());
            }
        }
    }
    
    function mobile_comment_news() {
        if($this->request->is("post")) {
            if(strlen($this->data['NewsComment']['comment']) > 50 && !empty($this->data['NewsComment']['comment'] && strlen($this->data['NewsComment']['comment']) != 0)) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                    $this->NewsComment->data['NewsComment']['comment_status_id'] = 2;
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                    $this->Session->setFlash(__(""), 'default', array(), 'komentar-sukses');
                    $this->redirect($this->referer());
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    $this->Session->setFlash(__(""), 'default', array(), 'komentar-gagal');
                    $this->redirect($this->referer());
                }
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'komentar-kurang-banyak');
                $this->redirect($this->referer());
            }
        }
    }
}