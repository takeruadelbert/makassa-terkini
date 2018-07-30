<?php

App::uses('AppController', 'Controller');

class NewsletterRecentEventSlideshowsController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Newsletter Recent Event Slideshow");
    }
    
    function admin_index() {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                unset($this->{ Inflector::classify($this->name) }->data['Dummy']);
                $this->NewsletterRecentEventSlideshow->query('TRUNCATE TABLE newsletter_recent_event_slideshows');
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                $this->{ Inflector::classify($this->name) }->saveMany($this->{ Inflector::classify($this->name) }->data['NewsletterRecentEventSlideshow'], array('validate' => false));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        } else {
            $rows = $this->NewsletterRecentEventSlideshow->find('all',[
                "recursive" => 3,
            ]);
            $this->data = $rows;
        }
    }
}