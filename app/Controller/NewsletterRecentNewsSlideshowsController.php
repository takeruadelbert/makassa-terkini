<?php

App::uses('AppController', 'Controller');

class NewsletterRecentNewsSlideshowsController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "NewsletterRecentNews");
    }
    
    function admin_index() {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                unset($this->{ Inflector::classify($this->name) }->data['Dummy']);
                $this->NewsletterRecentNewsSlideshow->query('TRUNCATE TABLE newsletter_recent_news_slideshows');
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                $this->{ Inflector::classify($this->name) }->saveMany($this->{ Inflector::classify($this->name) }->data['NewsletterRecentNewsSlideshow'], array('validate' => false));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        } else {
            $rows = $this->NewsletterRecentNewsSlideshow->find('all',[
                "recursive" => 3,
            ]);
            $this->data = $rows;
        }
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->News->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"))));
    }
}