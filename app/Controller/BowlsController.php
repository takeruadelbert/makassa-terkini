<?php

App::uses('AppController', 'Controller');

class BowlsController extends AppController {

    var $name = "Bowls";
    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function admin_upload_image() {
        $this->autoRender = false;
//        debug($this->request->params['form']['file'], false);
//        debug(tmpfile(), false);
        App::import("Vendor", "qqUploader");

        $allowedExtensions = array('zip', 'pdf', 'rar', 'doc', 'docx', 'xls', 'xlsx', 'txt', 'rtf', 'jpg');
        $sizeLimit = 1 * 1024 * 1024;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit, @$this->request->params['form']['file']);
        $result = $uploader->handleUpload('img/hotel/room/');

        if ($result['status'] == 206) {
            $this->response->type('json');
            $this->response->body(json_encode($result));
        } else {
            $this->response->statusCode(500);
            $this->response->body($result['message']);
        }
    }

}
