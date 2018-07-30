<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
session_start();
App::uses('Controller', 'Controller');
App::import('Vendor', 'wonolib');
App::import('Vendor', 'seourl');
App::import('Vendor', 'terbilang');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    var $helpers = array(
        'Html',
        'Form',
        'Text',
        'Js',
        'Session',
        'Number',
        'JqueryEngine',
        "StnAdmin",
        'Echo',
        'GoogleMap',
        'MakassarTerkini',
    );
    var $components = array(
        'Session',
        'RequestHandler',
        'Email',
        'Paginator',
        'DebugKit.Toolbar',
        "Hybridauth",
    );
    /*
     * 
     * @template
     * - londium
     * - pages-ace
     * - londiniumv
     */
    var $template = "londiniumv";
    var $frontTemplate = "makassar-terkini";
    var $statusCode = array(
        101 => "Harap mengisi kembali data yang salah dibawah",
        200 => "Berhasil disimpan",
        201 => "Login berhasil",
        202 => "Berhasil diubah",
        203 => "Silahkan pilih salah satu atau lebih data terlebih dahulu",
        204 => "Data berhasil dihapus",
        205 => "Options found",
        206 => "Ok",
        207 => "Status berubah",
        400 => "Invalid request",
        401 => "Data not found",
        402 => "Login gagal",
        403 => "Auth needed",
        405 => "Fail",
        501 => "Kode Voucher Berlaku",
        502 => "Kode Voucher Tidak Berlaku",
        404 => "Unable to connect to 3rd party",
    );
    var $emailAcc = array(
        'Activation' => array(
            'port' => 587,
            'timeout' => 20,
            'host' => 'mail.tommyhost.net',
            'username' => 'tso_act@tommyhost.net',
            'password' => 'G0K\$pep33Zy8',
            'transport' => 'Smtp',
            'tls' => true,
        ),
        'Account' => array(
            'port' => 587,
            'timeout' => 20,
            'host' => 'mail.tommyhost.net',
            'username' => 'tso_act@tommyhost.net',
            'password' => 'G0K\$pep33Zy8',
            'transport' => 'Smtp',
            'tls' => true,
        ),
        'Invoice' => array(
            'port' => 587,
            'timeout' => 20,
            'host' => 'mail.tommyhost.net',
            'username' => 'tso_act@tommyhost.net',
            'password' => 'G0K\$pep33Zy8',
            'transport' => 'Smtp',
            'tls' => true,
        ),
        'NoReply' => array(
            'port' => 587,
            'timeout' => 20,
            'host' => 'mail.tommyhost.net',
            'username' => 'tso_act@tommyhost.net',
            'password' => 'G0K\$pep33Zy8',
            'transport' => 'Smtp',
            'tls' => true,
        ),
        'MakassarTerkini' => array(
            'host' => 'mail.tommyhost.net',
            'port' => 26,
            'timeout' => 20,
            'username' => 'noreply@tommyhost.net',
            'password' => 'yRoQ2Trp2gpq',
            'transport' => 'Smtp',
//            'tls' => true,
        ),
//        'NoReply2' => array(
//            'port' => 587,
//            'timeout' => 120,
//            'host' => 'smtp.gmail.com',
//            'username' => 'edbert12345678@gmail.com',
//            'password' => 'smartkiosk',
//            'transport' => 'Smtp',
//            'tls' => true,
//        ),
        'NoReply2' => array(
            'port' => 26,
            'timeout' => 20,
            'host' => 'mail.makassarterkini.com',
            'username' => 'noreply@makassarterkini.com',
            'password' => 'noreplymt',
            'transport' => 'Smtp',
//            'ssl' => true,
        ),
    );
    var $pageInfo = array();
    var $disabledAction = array();
    var $paginate = array(
        "limit" => 10,
        "maxLimit" => 5000,
    );
    var $constantString = array(
        "pagination-tips" => "locale0001"
    );
    var $contain = array(
    );
    var $conds = array(
    );
    var $defaultConds = array(
    );
    var $filterCond = "and";
    var $args = false;
    var $cetak_template = false;
    var $order = false;
    var $layoutCetak = false;

    function _sentEmail($type = null, $info = array(), $options = array(), $sent = true) {
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail();
        if (!empty($type)) {
            switch ($type) {
                case 'newsletter':
                    $Email->template('newsletter');
                    $viewvar = $info['item'];
                    $info = am(array('subject' => 'Newsletter', 'from' => array('noreply@makassarterkini.com' => 'Newsletter')), $info);
                    break;
                case 'activation':
                    $Email->template('activation');
                    $viewvar = $info['item'];
                    $info = am(array('subject' => 'Aktivasi Pengguna', 'from' => array('activation@tokosayaonline.com' => 'e-Commerce Activation')), $info);
                    break;
                case 'forgot-password':
                    $Email->template('forgot-password');
                    $viewvar = $info['item'];
                    $info = am(array('subject' => 'Reset Kata Sandi', 'from' => array('activation@tokosayaonline.com' => 'Ubah kata sandi')), $info);
                    break;
                case 'order':
                    $Email->template('order');
                    $viewvar = $info['item'];
                    $info = am(array('subject' => 'Pesanan No. XXXX', 'from' => array('activation@tokosayaonline.com' => 'Pesanan No. XXXX')), $info);
                    break;
                case 'order-payment-confirm':
                    $Email->template('order-payment-confirm');
                    $viewvar = $info['item'];
                    $info = am(array('from' => array('activation@tokosayaonline.com' => 'Konfirmasi Pembayaran Diterima')), $info);
                    break;
                case 'order-sent':
                    $Email->template('order-sent');
                    $viewvar = $info['item'];
                    $info = am(array('from' => array('activation@tokosayaonline.com' => 'Pesanan Telah Dikirim')), $info);
                    break;
                case 'payment-confirmation':
                    $Email->template('payment-confirmation');
                    $viewvar = $info['item'];
                    $info = am(array('from' => array('activation@tokosayaonline.com' => 'Konfirmasi Pembayaran')), $info);
                    break;
                case 'registrasi-akun-makassar-terkini' :
                    $Email->template('registrasi-akun-makassar-terkini');
                    $viewvar = $info['item'];
                    $info = am(array('from' => array('noreply@makassarterkini.com' => 'Registrasi Akun Makassar Terkini')), $info);
                    break;
                case 'lupa-password' :
                    $Email->template('lupa-password');
                    $viewvar = $info['item'];
                    $info = am(array('from' => array('noreply@makassarterkini.com' => 'lupa-password')), $info);
                    break;
                case 'admin-lupa-password' :
                    $Email->template('admin-lupa-password');
                    $viewvar = $info['item'];
                    $info = am(array('from' => array('noreply@makassarterkini.com' => 'admin-lupa-password')), $info);
                    break;
                case 'mobile-lupa-password' :
                    $Email->template('mobile-lupa-password');
                    $viewvar = $info['item'];
                    $info = am(array('from' => array('noreply@makassarterkini.com' => 'mobile-lupa-password')), $info);
                    break;
                case 'contact-us' :
                    $Email->template('contact-us');
                    $viewvar = $info['item'];
                    $info = am(array('from' => array('noreply@makassarterkini.com' => 'contact-us')), $info);
                    break;
            }
            $Email->viewVars($viewvar);
            $Email->emailFormat('html');
            $Email->to($info['tujuan']);
            $Email->subject($info['subject']);
            $Email->from($info['from']);
            $Email->config($this->emailAcc[$info['acc']]);
            $Email->send();
        }
    }

    function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
        $this->pageInfo = array(
            "index" => array(
                'titlePage' => __("Index"),
                'descriptionPage' => __(""),
            ),
            "add" => array(
                'titlePage' => __("Tambah"),
                'descriptionPage' => __(""),
            ),
            "edit" => array(
                'titlePage' => __("Ubah"),
                'descriptionPage' => __(""),
            ),
            "admin_index" => array(
                'titlePage' => __("Index"),
                'descriptionPage' => __(""),
            ),
            "admin_add" => array(
                'titlePage' => __("Tambah"),
                'descriptionPage' => __(""),
            ),
            "admin_edit" => array(
                'titlePage' => __("Ubah"),
                'descriptionPage' => __(""),
            ),
            "default" => array(
                'titlePage' => __("Selamat Datang"),
                'descriptionPage' => __(""),
            ),
        );
    }

    function beforeFilter() {
//        $this->__setVar();
        $this->_listLang();
        $this->_setLang();
        $this->__checkPremission();
        $this->__checkRoleAccess();
        $this->_setCKConfig();
        $this->_checkFrontMobile();
        if (!$this->request->is('ajax')) {
            $this->set('leftSideMenuData', $this->_createLeftMenu());
        }
        if (in_array($this->params['action'], $this->disabledAction)) {
            $this->_404();
        }
    }

    function beforeRender() {
        Configure::write("template", $this->template);
        Configure::write("frontTemplate", $this->frontTemplate);
        if (isset($this->jump) && $this->jump) {
            
        } else {
            global $URL, $ACTION_URL;

            if (isset($this->cetak)) {
                $this->layout = "cetak/" . $this->cetak;
            } else if ($this->params['admin']) {
                $this->layout = _TEMPLATE_DIR . "/{$this->template}/default";
            } else if ($this->params['front'] || $this->params['member']) {
                $this->layout = _FRONT_TEMPLATE_DIR . "/{$this->frontTemplate}/default";
            } else if ($this->params['mobile']) {
                $this->layout = _FRONT_TEMPLATE_DIR . "/{$this->frontTemplate}/mobile/default";
            }
            if ($this->request->is('ajax')) {
                $this->layout = 'ajax';
            }
            //For breadcrumb system
            $camelController = Inflector::camelize($this->params['controller']);
            $underController = Inflector::underscore($this->params['controller']);
            $otherController = Inflector::variable(Inflector::pluralize($camelController));
            $target = [
                "{$this->params['prefix']}/{$camelController}/{$this->_pureAction()}",
                "{$this->params['prefix']}/{$underController}/{$this->_pureAction()}",
                "{$this->params['prefix']}/{$otherController}/{$this->_pureAction()}",
            ];
            if ($this->_pureAction() == "index") {
                $target = am([
                    "{$this->params['prefix']}/{$camelController}",
                    "{$this->params['prefix']}/{$underController}",
                    "{$this->params['prefix']}/{$otherController}",
                        ], $target);
            }
            $reversedUrl = Router::url([
                        "controller" => $underController,
                        "action" => $this->_pureAction(),
                        "prefix" => $this->params['prefix'],
            ]);
            $reversedUrl = str_replace_first(Router::url("/"), "", $reversedUrl);
            $target[] = $reversedUrl;
            $bcSuggestion = array();
            $breadcrumb = ClassRegistry::init("ModuleContent")->find("first", array("conditions" => array("ModuleContent.alias" => $this->request->url)));
            if (!empty($breadcrumb)) {
                $bcSuggestion[] = array(
                    "label" => $breadcrumb['ModuleContent']['name'],
                    "alias" => $breadcrumb['ModuleContent']['alias'],
                );
                while (!is_null($breadcrumb['Parent']['id'])) {
                    $breadcrumb = ClassRegistry::init("ModuleContent")->find("first", array("conditions" => array("ModuleContent.id" => $breadcrumb['Parent']['id'])));
                    $bcSuggestion[] = array(
                        "label" => $breadcrumb['ModuleContent']['name'],
                        "alias" => $breadcrumb['ModuleContent']['alias'],
                    );
                }
                $bcSuggestion[] = array(
                    "label" => $breadcrumb['Module']['name'],
                    "alias" => $breadcrumb['Module']['alias'],
                    "icon" => $breadcrumb['Module']['class_icon'],
                );
            } else {
                $breadcrumb = ClassRegistry::init("Module")->find("first", array("conditions" => array("Module.alias" => $this->request->url)));
                if (!empty($breadcrumb)) {
                    $bcSuggestion[] = array(
                        "label" => $breadcrumb['Module']['name'],
                        "alias" => $breadcrumb['Module']['alias'],
                        "icon" => $breadcrumb['Module']['class_icon'],
                    );
                } else {
                    $breadcrumb = ClassRegistry::init("ModuleLink")->find("first", array("conditions" => array("ModuleLink.alias" => $target)));
                    if (!empty($breadcrumb)) {
                        $bcSuggestion[] = array(
                            "label" => $breadcrumb['ModuleLink']['name'],
                            "alias" => $breadcrumb['ModuleLink']['alias'],
                        );
                        if ($breadcrumb['ModuleContent']['id'] != null) {
                            $bcSuggestion = am($bcSuggestion, $this->_breadcrumbModuleContent($breadcrumb['ModuleContent']['id']));
                        } else if ($breadcrumb['Module']['id'] != null) {
                            $bcSuggestion = am($bcSuggestion, $this->_breadcrumbModule($breadcrumb));
                        }
                    }
                }
            }
            //end of breadcrumb system
            //For pageInfo system
            $pageInfo = isset($this->pageInfo[$this->params['action']]) ? $this->pageInfo[$this->params['action']] : $this->pageInfo["default"];
            //end of pageInfo system

            $template = $this->template;
            $frontTemplate = $this->frontTemplate;
            $controller = Inflector::camelize($this->params['controller']);
            $action = $this->params['action'];
            $URL = $url = trim(preg_replace('/limit:[0-9]*/', '', preg_replace('/page:[0-9]*/', '', $this->request->url, 1), 1), "/");
            $ACTION_URL = "{$this->params['prefix']}/{$controller}/{$this->_pureAction()}";
            $constantString = $this->constantString;
            $this->set(compact('bcSuggestion', 'template', 'frontTemplate', 'controller', 'action', 'url', 'pageInfo', 'constantString', "ACTION_URL"));
            if (isset($this->cetak)) {
                $this->view = "/Modules/admin_print";
            } else if ($this->params['admin']) {
                $this->view = "/Modules/admin_dispatcher";
            }
        }
    }

    function _breadcrumbModule($breadcrumb = array()) {
        $suggestion = array();
        $breadcrumb = ClassRegistry::init("Module")->find("first", array("conditions" => array("Module.id" => @$breadcrumb['Module']['id'])));
        if (!empty($breadcrumb)) {
            $suggestion[] = array(
                "label" => $breadcrumb['Module']['name'],
                "alias" => $breadcrumb['Module']['alias'],
                "icon" => $breadcrumb['Module']['class_icon'],
            );
        }
        return $suggestion;
    }

    function _breadcrumbModuleContent($id = null) {
        $suggestion = array();
        $breadcrumb = ClassRegistry::init("ModuleContent")->find("first", array("conditions" => array("ModuleContent.id" => $id)));
        if (!empty($breadcrumb)) {
            $suggestion[] = array(
                "label" => $breadcrumb['ModuleContent']['name'],
                "alias" => $breadcrumb['ModuleContent']['alias'],
            );
            if (!empty($breadcrumb['Parent']) && $breadcrumb['Parent']['id'] != null) {
                $suggestion = am($suggestion, $this->_breadcrumbModuleContent($breadcrumb['Parent']['id']));
            } else if (!empty($breadcrumb['Module']) && $breadcrumb['Module']['id'] != null) {
                $suggestion = am($suggestion, $this->_breadcrumbModule($breadcrumb));
            }
        }
        return $suggestion;
    }

    function __checkPremission() {
        $credential = $this->Session->read("credential.{$this->params['prefix']}");
        if ($this->params['prefix'] == "front" || $this->params['prefix'] == "mobile") {
            
        } else if (!empty($this->params['prefix']) && empty($credential)) {
            if ($this->params['prefix'] == "member") {
                $this->redirect('/', 401);
            } else {
                $this->redirect('/' . $this->params['prefix'], 401);
            }
        }
    }

    function _createLeftMenu() {
        $cond = array(
            'Role.user_group_id' => $this->Session->read("credential.admin.User.user_group_id"),
            'Role.modulePosition' => 'Left',
            'Module.name != ' => 'Setting'
        );
        $getRoleData = ClassRegistry::init('Role')->find('all', array(
            'recursive' => -1,
            'conditions' => $cond,
            'order' => array('Role.moduleOrder' => 'ASC'),
            'group' => array('Role.module_id'),
            'contain' => array(
                "Module" => array(
                    "ModuleLink",
                ),
            ),
        ));
        $roleData = array();


        foreach ($getRoleData as $role) {
            $box = array(
                "label" => $role['Module']['name'],
                "icon" => $role['Module']['class_icon'],
                "alias" => $role['Module']['alias'],
                "moduleLink" => $role['Module']['ModuleLink'],
                "content" => array(),
            );
            $submenu = ClassRegistry::init('ModuleContent')->find("all", array(
                "order" => "ModuleContent.ordering_number",
                "conditions" => array(
                    "ModuleContent.module_id" => $role['Module']['id'],
                    "OR" => array(
                        "ModuleContent.parent_id is null",
                        "ModuleContent.parent_id" => 0
                    )
                )
            ));
            foreach ($submenu as $mc) {
                $ml = [];
                foreach ($mc['ModuleLink'] as $moduleLink) {
                    $ml[] = $moduleLink['alias'];
                }
                $box['content'][] = array(
                    "label" => $mc['ModuleContent']['name'],
                    "alias" => $mc['ModuleContent']['alias'],
                    "moduleLink" => $ml,
                    "content" => $this->_subMenu($mc),
                );
            }
            $roleData[] = $box;
        }
        return $roleData;
    }

    function _subMenu($parent) {
        $result = array();
        $menu = ClassRegistry::init('ModuleContent')->find("all", array("conditions" => array("ModuleContent.parent_id" => $parent['ModuleContent']['id'])));
        if (!empty($menu)) {
            foreach ($menu as $subMenu) {
                $ml = [];
                foreach ($subMenu['ModuleLink'] as $moduleLink) {
                    $ml[] = $moduleLink['alias'];
                }
                $result[] = array(
                    'label' => $subMenu['ModuleContent']['name'],
                    'alias' => $subMenu['ModuleContent']['alias'],
                    "moduleLink" => $ml,
                    'content' => $this->_subMenu($subMenu),
                );
            }
        }
        return $result;
    }

    function _filter($get) {
        $paramCond = $this->filterCond;
        $cond = array();
        foreach ($get as $k => $v) {
            $key = preg_replace('/_/', '.', $k, 1);
            if (substr_count($key, 'select') == 1) {
                $key = preg_replace('/select./', '', $key, 1);
                $key = preg_replace('/_/', '.', $key, 1);
                if (!empty($v)) {
                    $cond[$paramCond][$key] = $v;
                }
            } elseif (substr_count($key, 'awal') == 1) {
                $key = preg_replace('/awal\./', '', $key, 1);
                $key = preg_replace('/_/', '.', $key, 1);
                if (!empty($v)) {
                    $cond[$paramCond]['DATE(' . $key . ') >= '] = $v;
                }
            } else if (substr_count($key, 'akhir') == 1) {
                $key = preg_replace('/akhir\./', '', $key, 1);
                $key = preg_replace('/_/', '.', $key, 1);
                if (!empty($v)) {
                    $cond[$paramCond]['DATE(' . $key . ') <= '] = $v;
                }
            } else {
                if (!empty($v)) {
                    $cond[$paramCond][$key . ' LIKE '] = '%' . $v . '%';
                }
            }
        }
        return $cond;
    }

    function _pureAction() {
        return ltrim(ltrim($this->params['action'], "/{$this->params['prefix']}/"), "_");
    }

    function _generateStatusCode($id, $message = null, $data = array()) {
        if (is_null($message)) {
            return array("status" => $id, "message" => $this->statusCode[$id], 'data' => $data);
        } else {
            return array("status" => $id, "message" => $message, 'data' => $data);
        }
    }

    function _checkFrontMobile() {
        $urleach = explode("/", $this->request->url);
        if ($this->params['prefix'] == "front" && $this->request->is("mobile") && $urleach[0] != "m") {
            if (!empty($this->request->url)) {
                $this->redirect("/m/" . $this->request->url);
            } else {
                $this->redirect("/m");
            }
        }
    }

    function _listLang() {
        $all = ClassRegistry::init("Language")->find("all");
        $lang = array();
        foreach ($all as $i) {
            $lang[$i['Language']['code']] = array(
                "icon" => $i['Language']['icon'],
                "name" => $i['Language']['name'],
            );
        }
        $this->set("langs", $lang);
    }

    function _setLang() {
        if ($this->Session->check("Config.language")) {
            Configure::write("Config.language", $this->Session->read("Config.language"));
        }
        $this->Session->write("wonomultilang.lang", Configure::read("Config.language"));
    }

    function _setCKConfig() {
        $this->Session->write("sck.baseUrl", Router::url("/", true));
        $this->Session->write("sck.root", WWW_ROOT);
        $this->Session->write("sck.folder", "upload" . DS);
    }

    //Start Main Basic CRUD Engine
    function _setPageInfo($action = null, $titlePage = "", $descriptionPage = "") {
        $this->pageInfo[$action] = array(
            'titlePage' => __($titlePage),
            'descriptionPage' => __($descriptionPage),
        );
    }

    function _activePrint($args = false, $filename = false, $layoutCetak = false) {
        if ($args === false) {
            $args = func_get_args();
        }
        if (!empty($args) && !empty($k = array_intersect(["print", "excel", "pdf"], $args))) {
            $jenis = array_shift($k);
            $this->cetak = $jenis;
            if ($layoutCetak !== false) {
                if (is_array($layoutCetak)) {
                    $this->layoutCetak = $layoutCetak[$jenis];
                } else {
                    $this->layoutCetak = $layoutCetak;
                }
            } else {
                $this->layoutCetak = $jenis;
            }
            $this->set("printfile", $filename);
            $this->set("jeniscetak", $jenis);
            $this->paginate["limit"] = 10000;
            $this->paginate["maxLimit"] = 10000;
        }
    }

    function admin_index() {
        $conds = $this->_filter($_GET, $this->filterCond);
        if (empty($conds)) {
            $conds = $this->defaultConds;
        }
        $conds['AND'] = am($conds, array(
                ), $this->conds);
        $this->Paginator->settings = array(
            Inflector::classify($this->name) => array(
                'conditions' => $conds,
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

    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
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
                    $this->{ Inflector::classify($this->name) }->save();
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
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

    function admin_multiple_delete() {
        $this->{ Inflector::classify($this->name) }->set($this->data);
        if (empty($this->data)) {
            $code = 203;
        } else {
            $allData = $this->data[Inflector::classify($this->name)]['checkbox'];
            foreach ($allData as $data) {
                if ($data != '' || $data != 0) {
                    $this->{ Inflector::classify($this->name) }->delete($data, true);
                }
            }
            $code = 204;
        }
        echo json_encode($this->_generateStatusCode($code));
        die();
    }

    function admin_delete($id = null) {
        if ($this->request->is("delete")) {
            if ($this->{ Inflector::classify($this->name) }->delete($id)) {
                $code = 204;
            } else {
                $code = 401;
            }
        } else {
            $code = 400;
        }
        echo json_encode($this->_generateStatusCode($code));
        die();
    }

    //End Main Basic CRUD Engine
    function _404() {
        die();
    }

    function _adminOnly() {
        if (!$this->_isAdmin()) {
            $this->redirect("/admin/restriction");
        }
    }

    function _isAdmin() {
        return $this->Session->read("credential.admin.User.user_group_id") == 1 ? true : false;
    }

    function _isGroupOf($group = []) {
        if (empty($group)) {
            return false;
        } else if (is_array($group)) {
            return array_search($this->Session->read("credential.admin.User.UserGroup.name"), $group) !== false;
        } else if (is_string($group)) {
            return $this->Session->read("credential.admin.User.UserGroup.name") == $group;
        }
        return false;
    }

    //hanya berlaku untuk default routing
    //TO-DO: custome routing
    function __checkRoleAccess() {
        $skippedAlias = [
            "admin/restriction",
            "admin/dashboard",
            "admin/accounts/change_password",
            "admin/accounts/edit_profile",
            "admin/events/upload_image",
            "admin/news/upload_image",
            "admin/eventImages/delete",
            "admin/seeAlsoFeatures/",
            "admin/seeAlsoFeatures/edit",
            "admin/seeAlsoFeatures/view",
            "admin/newsComments/edit",
            "admin/newsComments/view",
        ];
        $camelController = Inflector::camelize($this->params['controller']);
        $underController = Inflector::underscore($this->params['controller']);
        $otherController = Inflector::variable(Inflector::pluralize($camelController));
        $target = [
            "{$this->params['prefix']}/{$camelController}/{$this->_pureAction()}",
            "{$this->params['prefix']}/{$underController}/{$this->_pureAction()}",
            "{$this->params['prefix']}/{$otherController}/{$this->_pureAction()}",
        ];
        if ($this->_pureAction() == "index") {
            $target = am([
                "{$this->params['prefix']}/{$camelController}",
                "{$this->params['prefix']}/{$underController}",
                "{$this->params['prefix']}/{$otherController}",
                    ], $target);
        }
        $reversedUrl = Router::url([
                    "controller" => $underController,
                    "action" => $this->_pureAction(),
                    "prefix" => $this->params['prefix'],
        ]);
        $reversedUrl = str_replace_first(Router::url("/"), "", $reversedUrl);
        $target[] = $reversedUrl;
        if ($this->params['prefix'] == "admin" && !$this->_isAdmin() && !in_array($this->params->url, $skippedAlias) && empty(array_intersect($target, $skippedAlias))) {
            $userGroupId = $this->Session->read("credential.admin.User.user_group_id");
            $moduleContent = ClassRegistry::init("ModuleContent")->find("first", [
                "conditions" => [
                    "or" => [
                        "ModuleContent.alias" => $this->params->url,
                        "ModuleContent.alias" => $target,
                    ],
                ],
                "contain" => [
                    "Module"
                ],
                "recursive" => -1,
            ]);
            $moduleLink = ClassRegistry::init("ModuleLink")->find("first", [
                "conditions" => [
                    "or" => [
                        "ModuleLink.alias" => $this->params->url,
                        "ModuleLink.alias" => $target,
                    ],
                ],
                "contain" => [
                    "ModuleContent" => [
                        "Module",
                    ],
                    "Module",
                ],
                "recursive" => -1,
            ]);
            $module = ClassRegistry::init("Module")->find("first", [
                "conditions" => [
                    "or" => [
                        "Module.alias" => $this->params->url,
                        "Module.alias" => $target,
                    ],
                ],
                "recursive" => -1,
            ]);
            if (!empty($moduleContent['Module']['id'])) {
                $moduleId = $moduleContent['Module']['id'];
            } else if (!empty($moduleLink['ModuleContent']['Module']['id'])) {
                $moduleId = $moduleLink['ModuleContent']['Module']['id'];
            } else if (!empty($moduleLink['Module']['id'])) {
                $moduleId = $moduleLink['Module']['id'];
            } else if (!empty($module['Module']['id'])) {
                $moduleId = $module['Module']['id'];
            } else {
                $moduleId = -1;
            }
            $role = ClassRegistry::init("Role")->find("first", [
                "conditions" => [
                    "Role.user_group_id" => $userGroupId,
                    "Role.module_id" => $moduleId,
                ],
                "recursive" => -1
            ]);
            if (empty($role)) {
                $this->redirect("/admin/restriction");
            }
        }
    }

    function _hashPassword($plain) {
        $hashed = hash("sha512", $plain, false);
        return $hashed;
    }

}
