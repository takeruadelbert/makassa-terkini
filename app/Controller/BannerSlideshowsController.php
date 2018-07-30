<?php

App::uses('AppController', 'Controller');

class BannerSlideshowsController extends AppController {

    var $disabledAction=array(
    );
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Banner");
        $this->_setPageInfo("admin_add", "Tambah Banner");
        $this->_setPageInfo("admin_edit", "Ubah Banner");
        $this->_setPageInfo("admin_edit", "Lihat Banner");
    }
    
    function admin_index() {
        $this->contain=[

        ];
        $this->_options();
        parent::admin_index();
    }
    
    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $banners = $this->BannerSlideshow->find('all');
                foreach ($banners as $k => $banner) {
                    $this->BannerSlideshow->data['BannerSlideshow']['id'] = $this->data['BannerSlideshow'][$k]['id'];
                    $this->BannerSlideshow->data['BannerSlideshow']['banner_slideshow_status_id'] = $this->data['BannerSlideshow']['banner_slideshow_status_id'];
                    $this->BannerSlideshow->data['BannerSlideshow']['url'] = $this->data['BannerSlideshow'][$k]['url'];
                    $this->BannerSlideshow->data['BannerSlideshow']['start_date'] = $this->data['BannerSlideshow'][$k]['start_date'];
                    $this->BannerSlideshow->data['BannerSlideshow']['expired_date'] = $this->data['BannerSlideshow'][$k]['expired_date'];
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data,array("deep"=>true));
                }
                if(isset($this->data['Gambar']) && !empty($this->data['Gambar'])) {
                    $this->{ Inflector::classify($this->name) }->saveMany($this->data['Gambar'], array('validate' => false));
                }
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_add'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        }
        $this->set("bannerSlideshowStatuses", $this->{ Inflector::classify($this->name) }->BannerSlideshowStatus->find("list", array("fields" => array("BannerSlideshowStatus.id", "BannerSlideshowStatus.name"))));
    }
    
    function admin_upload_image() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->jump = true;
        App::import('Vendor', 'qqUploaderBanners');
    }
}