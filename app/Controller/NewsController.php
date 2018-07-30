<?php

App::uses('AppController', 'Controller');

class NewsController extends AppController {

    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Berita");
        $this->_setPageInfo("admin_add", "Tambah Berita");
        $this->_setPageInfo("admin_edit", "Ubah Berita");
    }

    function admin_index() {
        $this->_activePrint(func_get_args(), "data_news");
        $this->contain = [
            "NewsStatus",
            "NewsCategory",
            "NewsImage",
            "Author" => [
                "Biodata"
            ],
            "Editor" => [
                "Biodata"
            ],
            "Publisher" => [
                "Biodata"
            ],
            "NewsType",
        ];
        $this->_options();
        $conds = $this->_filter($_GET, $this->filterCond);
        if (empty($conds)) {
            $conds = $this->defaultConds;
        }

        if ($this->_isGroupOf('author')) {
            $conds[] = [
                "NOT" => [
                    "News.news_status_id" => 3,
                ]
            ];
        }

        $conds['AND'] = am($conds, array(
                ), $this->conds);
        $this->Paginator->settings = array(
            Inflector::classify($this->name) => array(
                'conditions' => [
                    "News.is_deleted" => 0,
                    $conds
                ],
                'limit' => $this->paginate['limit'],
                'maxLimit' => $this->paginate['maxLimit'],
                'order' => Inflector::classify($this->name) . '.id desc',
                'recursive' => -1,
                'contain' => $this->contain,
            )
        );
        $rows = $this->Paginator->paginate($this->{ Inflector::classify($this->name) });
        $data = array(
            'rows' => $rows,
        );
        $this->set(compact('data', 'conds'));
    }

    function admin_log() {
        $this->_activePrint(func_get_args(), "data_news_log");
        $this->contain = [
            "NewsStatus",
            "NewsCategory",
            "NewsImage",
            "Author" => [
                "Biodata"
            ],
            "Editor" => [
                "Biodata"
            ],
            "Publisher" => [
                "Biodata"
            ],
            "NewsType",
        ];
        $this->_options();
        $conds = $this->_filter($_GET, $this->filterCond);
        if (empty($conds)) {
            $conds = $this->defaultConds;
        }
        $conds['AND'] = am($conds, array(
                ), $this->conds);
        $this->Paginator->settings = array(
            Inflector::classify($this->name) => array(
                'conditions' => [
                    "News.is_deleted" => 1,
                    $conds
                ],
                'limit' => $this->paginate['limit'],
                'maxLimit' => $this->paginate['maxLimit'],
                'order' => Inflector::classify($this->name) . '.created desc',
                'recursive' => -1,
                'contain' => $this->contain,
            )
        );
        $rows = $this->Paginator->paginate($this->{ Inflector::classify($this->name) });
        $data = array(
            'rows' => $rows,
        );
        $this->set(compact('data'));
    }

    function admin_change_status() {
        $this->autoRender = false;
        if ($this->request->is("PUT")) {
            $this->News->data['News']['id'] = $this->request->data['id'];
            if ($this->_isGroupOf(["editor"])) {
                $this->News->data['News']['editor_id'] = $this->Session->read("credential.admin.Account.id");
                $this->News->data['News']['edited_date'] = date("Y-m-d h:i:s");
            } else if ($this->_isGroupOf(["publisher"])) {
                $this->News->data['News']['publisher_id'] = $this->Session->read("credential.admin.Account.id");
                $this->News->data['News']['publish_date'] = date("Y-m-d h:i:s");
            } else if ($this->_isGroupOf(["editor dan publisher", "admin"])) {
                if ($this->request->data['status'] == 2) {
                    $this->News->data['News']['editor_id'] = $this->Session->read("credential.admin.Account.id");
                    $this->News->data['News']['edited_date'] = date("Y-m-d h:i:s");
                } else if ($this->request->data['status'] == 3) {
                    if(empty($this->News->data['News']['editor_id'])) {
                        $this->News->data['News']['editor_id'] = $this->Session->read("credential.admin.Account.id");
                        $this->News->data['News']['edited_date'] = date("Y-m-d h:i:s");
                    }
                    $this->News->data['News']['publisher_id'] = $this->Session->read("credential.admin.Account.id");
                    $this->News->data['News']['publish_date'] = date("Y-m-d h:i:s");
                }
            }
            $this->News->data['News']['news_status_id'] = $this->request->data['status'];
            $this->News->saveAll();
            $data = $this->News->find("first", array("conditions" => array("News.id" => $this->request->data['id']), "recursive" => 2));
            echo json_encode($this->_generateStatusCode(207, null, array("status_label" => $data['NewsStatus']['name'])));
        } else {
            echo json_encode($this->_generateStatusCode(400));
        }
    }

    function admin_add() {
        if ($this->request->is("post")) {
            $news_type = $this->data['News']['news_type_id'];
            if ($news_type == 1) {
                $this->redirect(array('action' => 'admin_add_news_article'));
            } else if ($news_type == 2) {
                $this->redirect(array('action' => 'admin_add_news_photo'));
            } else if ($news_type == 3) {
                $this->redirect(array('action' => 'admin_add_news_video'));
            }
        }
        $this->set("newsTypes", $this->{ Inflector::classify($this->name) }->NewsType->find("list", array("fields" => array("NewsType.id", "NewsType.name"))));
    }

    function admin_add_news_article() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                App::import("Vendor", "qqUploader");
                $allowedExt = array("jpg", "jpeg", "png");
                $size = 10 * 1024 * 1024;
                $uploader = new qqFileUploader($allowedExt, $size, $this->data['NewsImage'][0]['gambar']);
                $result = $uploader->handleUpload("img" . DS . "news" . DS);
                unset($this->News->data['NewsImage'][0]['gambar']);
                switch ($result['status']) {
                    case 206:
                        $this->News->data['NewsImage'][0]['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                        $this->News->data['News']['thumbnail_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                        $this->News->data['NewsImage'][0]['default_image'] = 1;
                        break;
                }
                $this->News->data['News']['author_id'] = $this->Session->read("credential.admin.Account.id");
                $this->News->data['News']['created_date'] = date("Y-m-d h:i:s");
                $this->News->data['News']['news_type_id'] = 1;
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        }
        $newsCategories = $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ["Parent"], "conditions" => array("NewsCategory.uniq !=" => array("foto", "video", "gallery"))));
        $newsCategories["Kategori Utama"]=$newsCategories[0];
        $this->set(compact("newsCategories"));
    }

    function admin_add_news_photo() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                if (isset($this->data['NewsImage']) || !empty($this->data['NewsImage'])) {
                    $i = array_search(1, array_column($this->data['NewsImage'], 'default_image'));
                    $path_default = $this->data['NewsImage'][$i]['path'];
                    $this->News->data['News']['thumbnail_path'] = $path_default;
                }
                $this->News->data['News']['author_id'] = $this->Session->read("credential.admin.Account.id");
                $this->News->data['News']['news_type_id'] = 2;
                $this->News->data['News']['created_date'] = date("Y-m-d h:i:s");
                $this->News->data['News']['is_citizen_report'] = 0;
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        }
        $newsCategories = $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ["Parent"], "conditions" => array("NewsCategory.uniq !=" => array("foto", "video", "gallery"))));
        $newsCategories["Kategori Utama"]=$newsCategories[0];
        $this->set(compact("newsCategories"));
    }

    function admin_add_news_video() {
        $i = 0;
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                App::import("Vendor", "qqUploader");
                while ($i < 2) {
                    if ($i == 0) {
                        $allowedExt = array("mp4", "mkv", "flv", "wmv");
                        $size = 100 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->data['News'][0]['video']);
                        $result = $uploader->handleUpload("video" . DS . "news" . DS);
                        switch ($result['status']) {
                            case 206:
                                $this->News->data['News']['video_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                break;
                        }
                    } else {
                        $allowedExt = array("png", "jpeg", "jpg");
                        $size = 10 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->data['News'][0]['gambar']);
                        $result = $uploader->handleUpload("img" . DS . "news" . DS);
                        switch ($result['status']) {
                            case 206:
                                $this->News->data['News']['thumbnail_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                break;
                        }
                    }
                    $i++;
                }
                unset($this->News->data['News'][0]['video']);
                unset($this->News->data['News'][0]['gambar']);
                $this->News->data['News']['news_type_id'] = 3;
                $this->News->data['News']['created_date'] = date("Y-m-d h:i:s");
                $this->News->data['News']['author_id'] = $this->Session->read("credential.admin.Account.id");
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        }
        $newsCategories = $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ["Parent"] , "conditions" => array("NewsCategory.uniq !=" => array("foto"))));
        $newsCategories["Kategori Utama"] = $newsCategories[0];
        $this->set(compact("newsCategories"));
    }

    function admin_edit_news_photo($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->News->data['News']['id'] = $id;
                    if (isset($this->data['NewsImage']) && !empty($this->data['NewsImage'])) {
                        $i = array_search(1, array_column($this->data['NewsImage'], 'default_image'));
                        $path_default = $this->data['NewsImage'][$i]['path'];
                        $this->News->data['News']['thumbnail_path'] = $path_default;
                    }
                    $this->{ Inflector::classify($this->name) }->saveAll();
                    $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                    $this->data = $rows;
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $newsCategories = $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ['Parent'],"conditions" => array("NewsCategory.uniq !=" => array("video"))));
        $newsCategories['Kategori Utama'] = $newsCategories[0];
        $this->set(compact("newsCategories"));
    }

    function admin_edit_news_article($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->News->data['News']['id'] = $id;
                    $this->News->data['NewsImage'][0]['id'] = $this->data['NewsImage'][0]['id'];
                    if(!empty($this->data['NewsImage'][0]['gambar'])) {
                        App::import("Vendor", "qqUploader");
                        $allowedExt = array("jpg", "jpeg", "png");
                        $size = 10 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->data['NewsImage'][0]['gambar']);
                        $result = $uploader->handleUpload("img" . DS . "news" . DS);
                        unset($this->News->data['NewsImage'][0]['gambar']);
                        switch ($result['status']) {
                            case 206:
                                $this->News->data['News']['thumbnail_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                $this->News->data['NewsImage'][0]['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                $this->News->data['NewsImage'][0]['default_image'] = 1;
                                break;
                        }
                    }
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                    $rows = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                    $this->data = $rows;
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $newsCategories = $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ['Parent'],"conditions" => array("NewsCategory.uniq !=" => array("foto", "video", "gallery"))));
        $newsCategories['Kategori Utama'] = $newsCategories[0];
        $this->set(compact("newsCategories"));
    }

    function admin_edit_news_video($id = null) {
        $i = 0;
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->News->data['News']['id'] = $id;
                    if(!empty($this->data['News'][0]['video']) && !empty($this->data['News'][0]['gambar'])) {
                        App::import("Vendor", "qqUploader");
                        while ($i < 2) {
                            if ($i == 0) {
                                $allowedExt = array("mp4", "mkv", "flv", "wmv");
                                $size = 100 * 1024 * 1024;
                                $uploader = new qqFileUploader($allowedExt, $size, $this->data['News'][0]['video']);
                                $result = $uploader->handleUpload("video" . DS . "news" . DS);
                                unset($this->News->data['News'][0]['video']);
                                switch ($result['status']) {
                                    case 206:
                                        $this->News->data['News']['video_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                        break;
                                }
                            } else {
                                $allowedExt = array("png", "jpeg", "jpg");
                                $size = 10 * 1024 * 1024;
                                $uploader = new qqFileUploader($allowedExt, $size, $this->data['News'][0]['gambar']);
                                $result = $uploader->handleUpload("img" . DS . "news" . DS);
                                unset($this->News->data['News'][0]['gambar']);
                                switch ($result['status']) {
                                    case 206:
                                        $this->News->data['News']['thumbnail_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                                        break;
                                }
                            }
                            $i++;
                        }
                    }
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                    $rows = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                    $this->data = $rows;
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $newsCategories = $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ['Parent'],"conditions" => array("NewsCategory.uniq !=" => array("foto"))));
        $newsCategories['Kategori Utama'] = $newsCategories[0];
        $this->set(compact("newsCategories"));
    }

    function admin_view_news_article($id = null) {
        if (!$this->News->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->News->data['News']['id'] = $id;
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"), "conditions" => array("NewsCategory.uniq !=" => array("foto", "video", "gallery")))));
    }

    function admin_view_news_photo($id = null) {
        if (!$this->News->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->News->data['News']['id'] = $id;
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"), "conditions" => array("NewsCategory.uniq !=" => array("video")))));
    }

    function admin_view_news_video($id = null) {
        if (!$this->News->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->News->data['News']['id'] = $id;
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 2, 'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("newsCategories", $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name"), "conditions" => array("NewsCategory.uniq !=" => array("foto")))));
    }

    function _options() {
        $this->set("newsStatuses", $this->{ Inflector::classify($this->name) }->NewsStatus->find("list", array("fields" => array("NewsStatus.id", "NewsStatus.name"))));
        $this->set("newsTypes", $this->{ Inflector::classify($this->name) }->NewsType->find("list", array("fields" => array("NewsType.id", "NewsType.name"))));
        $newsCategories = $this->{ Inflector::classify($this->name) }->NewsCategory->find("list", array("fields" => array("NewsCategory.id", "NewsCategory.name", "Parent.name"), "contain" => ['Parent'],"conditions" => array("NewsCategory.uniq !=" => array("foto"))));
        $newsCategories['Kategori Utama'] = $newsCategories[0];
        $this->set(compact("newsCategories"));
    }

    function admin_upload_image() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->jump = true;
        App::import('Vendor', 'qqUploaderNews');
    }

    function front_add_news_article() {
        if ($this->request->is("post")) {
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024;
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['NewsImage'][0]['gambar']);
            $result = $uploader->handleUpload("img" . DS . "news" . DS);
            unset($this->News->data['NewsImage'][0]['gambar']);
            switch ($result['status']) {
                case 206:
                    $this->News->data['NewsImage'][0]['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    $this->News->data['News']['thumbnail_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    $this->News->data['NewsImage'][0]['default_image'] = 1;
                    break;
            }
            $news_category_id = $this->News->NewsCategory->find('first', array('conditions' => array('NewsCategory.name' => $this->data['News']['news_category_id'])));
            $this->News->data['News']['title_ind'] = $this->data['News']['title_ind'];
            $this->News->data['News']['news_category_id'] = $news_category_id['NewsCategory']['id'];
            $this->News->data['News']['content_ind'] = $this->data['News']['content_ind'];
            $this->News->data['News']['author_id'] = $this->Session->read("credential.member.Account.id");
            $this->News->data['News']['news_type_id'] = 1;
            $this->News->data['News']['is_citizen_report'] = 1;
            $this->News->data['News']['meta_key'] = $this->data['News']['meta_key'];
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
            $this->Session->setFlash(__(""), 'default', array(), 'kirim-berita-artikel-sukses');
            $this->redirect("/profile_member");
        }
    }

    function front_add_news_photo() {
        if ($this->request->is("post")) {
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024;
            $newsImages = $this->data['NewsImage'];
            while (($dataGambar = array_shift($newsImages)) != false) {
                $uploader = new qqFileUploader($allowedExt, $size, $dataGambar['gambar']);
                $result = $uploader->handleUpload("img" . DS . "news" . DS);
                switch ($result['status']) {
                    case 206:
                        $this->News->data['NewsImage'][]['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                        break;
                }
            }
            $path_default = $this->News->data['NewsImage'][0]['path'];
            $this->News->data['NewsImage'][0]['default_image'] = 1;
            $this->News->data['News']['thumbnail_path'] = $path_default;
            $news_category_id = $this->News->NewsCategory->find('first', array('conditions' => array('NewsCategory.name' => $this->data['News']['news_category_id'])));
            $this->News->data['News']['title_ind'] = $this->data['News']['title_ind'];
            $this->News->data['News']['news_category_id'] = $news_category_id['NewsCategory']['id'];
            $this->News->data['News']['content_ind'] = $this->data['News']['content_indo'];
            $this->News->data['News']['author_id'] = $this->Session->read("credential.admin.Account.id");
            $this->News->data['News']['news_type_id'] = 2;
            $this->News->data['News']['is_citizen_report'] = 1;
            $this->News->data['News']['meta_key'] = $this->data['News']['meta_key'];
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
            $this->Session->setFlash(__(""), 'default', array(), 'kirim-berita-foto-sukses');
            $this->redirect("/profile_member");
        }
    }

    function front_add_news_video() {
        if ($this->request->is("post")) {
            App::import("Vendor", "qqUploader");
            $allowedExt = array("mp4", "mkv", "flv", "wmv");
            $size = 10 * 1024 * 1024;
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['News'][0]['video']);
            $result = $uploader->handleUpload("video" . DS . "news" . DS);
            unset($this->News->data['News'][0]['video']);
            switch ($result['status']) {
                case 206:
                    $this->News->data['News']['video_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
            }
            $news_category_id = $this->News->NewsCategory->find('first', array('conditions' => array('NewsCategory.name' => $this->data['News']['news_category_id'])));
            $this->News->data['News']['title_ind'] = $this->data['News']['title_ind'];
            $this->News->data['News']['news_category_id'] = $news_category_id['NewsCategory']['id'];
            $this->News->data['News']['content_ind'] = $this->data['News']['content_indonesia'];
            $this->News->data['News']['author_id'] = $this->Session->read("credential.admin.Account.id");
            $this->News->data['News']['news_type_id'] = 3;
            $this->News->data['News']['is_citizen_report'] = 1;
            $this->News->data['News']['meta_key'] = $this->data['News']['meta_key'];
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
            $this->Session->setFlash(__(""), 'default', array(), 'kirim-berita-video-sukses');
            $this->redirect("/profile_member");
        }
    }

    function admin_list($news_category_id = false) {
        if ($news_category_id === false) {
            $data = $this->News->find("list", [
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ]
            ]);
        } else {
            $data = $this->News->find("list", [
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "conditions" => [
                    "News.news_category_id" => $news_category_id
                ],
                "order" => "News.id desc",
            ]);
        }
        $keys = array_keys($data);
        $values = array_values($data);
        $stringKeys = array_map('strval', $keys);
        $data = array_combine($stringKeys, $values);
        $newArray = [];
        foreach ($data as $k => $value) {
            $newkey = sprintf('%s', $k);
            $newArray["'$newkey'"] = $value;
        }
        echo json_encode($this->_generateStatusCode(205, null, $newArray));
        die;
    }

    function mobile_add_news_article() {
        if ($this->request->is("post")) {
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024;
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['NewsImage'][0]['gambar']);
            $result = $uploader->handleUpload("img" . DS . "news" . DS);
            unset($this->News->data['NewsImage'][0]['gambar']);
            switch ($result['status']) {
                case 206:
                    $this->News->data['NewsImage'][0]['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    $this->News->data['News']['thumbnail_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    $this->News->data['NewsImage'][0]['default_image'] = 1;
                    break;
            }
            $news_category_id = $this->News->NewsCategory->find('first', array('conditions' => array('NewsCategory.name' => $this->data['News']['news_category_id'])));
            $this->News->data['News']['title_ind'] = $this->data['News']['title_ind'];
            $this->News->data['News']['news_category_id'] = $news_category_id['NewsCategory']['id'];
            $this->News->data['News']['content_ind'] = $this->data['News']['content_ind'];
            $this->News->data['News']['author_id'] = $this->Session->read("credential.member.Account.id");
            $this->News->data['News']['news_type_id'] = 1;
            $this->News->data['News']['is_citizen_report'] = 1;
            $this->News->data['News']['meta_key'] = $this->data['News']['meta_key'];
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
//            $this->Session->setFlash(__(""), 'default', array(), 'kirim-berita-artikel-sukses');
            $this->redirect("/m/profile");
        }
    }

    function mobile_add_news_photo() {
        if ($this->request->is("post")) {
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024;
            $newsImages = $this->data['NewsImage'];
            while (($dataGambar = array_shift($newsImages)) != false) {
                $uploader = new qqFileUploader($allowedExt, $size, $dataGambar['gambar']);
                $result = $uploader->handleUpload("img" . DS . "news" . DS);
                switch ($result['status']) {
                    case 206:
                        $this->News->data['NewsImage'][]['path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                        break;
                }
            }
            $path_default = $this->News->data['NewsImage'][0]['path'];
            $this->News->data['NewsImage'][0]['default_image'] = 1;
            $this->News->data['News']['thumbnail_path'] = $path_default;
            $news_category_id = $this->News->NewsCategory->find('first', array('conditions' => array('NewsCategory.name' => $this->data['News']['news_category_id'])));
            $this->News->data['News']['title_ind'] = $this->data['News']['title_ind'];
            $this->News->data['News']['news_category_id'] = $news_category_id['NewsCategory']['id'];
            $this->News->data['News']['content_ind'] = $this->data['News']['content_indo'];
            $this->News->data['News']['author_id'] = $this->Session->read("credential.admin.Account.id");
            $this->News->data['News']['news_type_id'] = 2;
            $this->News->data['News']['is_citizen_report'] = 1;
            $this->News->data['News']['meta_key'] = $this->data['News']['meta_key'];
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
//            $this->Session->setFlash(__(""), 'default', array(), 'kirim-berita-foto-sukses');
            $this->redirect("/m/profile");
        }
    }

    function mobile_add_news_video() {
        if ($this->request->is("post")) {
            App::import("Vendor", "qqUploader");
            $allowedExt = array("mp4", "mkv", "flv", "wmv");
            $size = 10 * 1024 * 1024;
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['News'][0]['video']);
            $result = $uploader->handleUpload("video" . DS . "news" . DS);
            unset($this->News->data['News'][0]['video']);
            switch ($result['status']) {
                case 206:
                    $this->News->data['News']['video_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
            }
            $news_category_id = $this->News->NewsCategory->find('first', array('conditions' => array('NewsCategory.name' => $this->data['News']['news_category_id'])));
            $this->News->data['News']['title_ind'] = $this->data['News']['title_ind'];
            $this->News->data['News']['news_category_id'] = $news_category_id['NewsCategory']['id'];
            $this->News->data['News']['content_ind'] = $this->data['News']['content_indonesia'];
            $this->News->data['News']['author_id'] = $this->Session->read("credential.admin.Account.id");
            $this->News->data['News']['news_type_id'] = 3;
            $this->News->data['News']['is_citizen_report'] = 1;
            $this->News->data['News']['meta_key'] = $this->data['News']['meta_key'];
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
//            $this->Session->setFlash(__(""), 'default', array(), 'kirim-berita-video-sukses');
            $this->redirect("/m/profile");
        }
    }

    function upload_image() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->jump = true;
        App::import('Vendor', 'qqUploaderNews');
    }

    function count_share_facebook($id = null) {
        if (!$this->News->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $shareData = [];
            $currentNews = $this->News->find('first', [
                "conditions" => [
                    "News.id" => $id,
                ]
            ]);
            $shareData['News']['fb_share_counts'] = $currentNews['News']['fb_share_counts'] + 1;
            $shareData['News']['id'] = $id;
            $this->News->saveAll($shareData);
        }
    }

    function count_share_twitter($id = null) {
        if (!$this->News->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $shareData = [];
            $currentNews = $this->News->find('first', [
                "conditions" => [
                    "News.id" => $id,
                ]
            ]);
            $shareData['News']['twitter_share_counts'] = $currentNews['News']['twitter_share_counts'] + 1;
            $shareData['News']['id'] = $id;
            $this->News->saveAll($shareData);
        }
    }

    function count_share_gplus($id = null) {
        if (!$this->News->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $shareData = [];
            $currentNews = $this->News->find('first', [
                "conditions" => [
                    "News.id" => $id,
                ]
            ]);
            $shareData['News']['gplus_share_counts'] = $currentNews['News']['gplus_share_counts'] + 1;
            $shareData['News']['id'] = $id;
            $this->News->saveAll($shareData);
        }
    }

    function admin_multiple_delete_news() {
        $this->{ Inflector::classify($this->name) }->set($this->data);
        if (empty($this->data)) {
            $code = 203;
        } else {
            $allData = $this->data[Inflector::classify($this->name)]['checkbox'];
            foreach ($allData as $data) {
                if ($data != '' || $data != 0) {
                    $this->{Inflector::classify($this->name)}->data['News']['id'] = $data;
                    $this->{ Inflector::classify($this->name) }->data['News']['is_deleted'] = 1;
                    $this->{ Inflector::classify($this->name) }->data['News']['deleted_date'] = date("Y-m-d H:i:s");
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                }
            }
            $code = 204;
        }
        echo json_encode($this->_generateStatusCode($code));
        die();
    }

    function admin_photo_list($news_category_id = false) {
        if ($news_category_id === false) {
            $data = $this->News->find("list", [
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ]
            ]);
        } else {
            $data = $this->News->find("list", [
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "conditions" => [
                    "News.news_category_id" => $news_category_id,
                    "News.news_type_id" => 2,
                ]
            ]);
        }
        echo json_encode($this->_generateStatusCode(205, null, $data));
        die;
    }

    function admin_video_list($news_category_id = false) {
        if ($news_category_id === false) {
            $data = $this->News->find("list", [
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ]
            ]);
        } else {
            $data = $this->News->find("list", [
                "fields" => [
                    "News.id",
                    "News.title_ind",
                ],
                "conditions" => [
                    "News.news_category_id" => $news_category_id,
                    "News.news_type_id" => 3,
                ]
            ]);
        }
        echo json_encode($this->_generateStatusCode(205, null, $data));
        die;
    }

}
