<?php

class AccountsController extends AppController {

    var $disabledAction = array();

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Akun");
        $this->_setPageInfo("admin_add", "Tambah Akun");
        $this->_setPageInfo("admin_edit", "Edit Akun");
        $this->_setPageInfo("admin_edit_profile", "Edit Akun");
        $this->_setPageInfo("admin_restriction", "Terlarang");
        $this->_setPageInfo("admin_change_password", "Ganti password");
    }

    function admin_dashboard() {

    }

    function admin_index() {
        $this->_activePrint(func_get_args(), "data_user");
        $conds = $this->_filter($_GET);
        $conds['AND'] = am($conds, array(
        ));
        $this->Paginator->settings = array(
            Inflector::classify($this->name) => array(
                'conditions' => $conds,
                'limit' => $this->paginate['limit'],
                'maxLimit' => $this->paginate['maxLimit'],
                'order' => Inflector::classify($this->name) . '.created desc',
            )
        );
        $rows = $this->Paginator->paginate($this->{ Inflector::classify($this->name) });
        $data = array(
            'rows' => $rows,
        );
        $this->set("userGroups", ClassRegistry::init("UserGroup")->find("list", array("fields" => array("UserGroup.id", "UserGroup.label"))));
        $this->set(compact('data'));
        $args = func_get_args();
        if (isset($args[0])) {
            $jenis = $args[0];
            $this->cetak = $jenis;
            $this->render($jenis);
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

    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            $password = $this->{ Inflector::classify($this->name) }->data["User"]["password"];
            $salt = hash("sha224", uniqid(mt_rand(), true), false);
            $encrypt = hash("sha512", $password . $salt, false);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                unset($this->{ Inflector::classify($this->name) }->data["User"]["repeatPassword"]);
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data);
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
                    $this->Account->data['Account']['id'] = $id;
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
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id), "recursive" => 3));
            $this->data = $rows;
            $cityList = $this->Account->Biodata->City->find("all", [
                "conditions" => [
                    "state_id" => $rows['Biodata']['state_id'],
                ],
            ]);
            $this->set(compact("cityList"));
        }
    }
    
    function admin_view($id = null) {
        if (!$this->Account->exists($id)) {
            throw new NotFoundException(__('Data Not Found'));
        } else {
            $this->{ Inflector::classify($this->name) }->id = $id;
            $this->Account->data['Account']['id'] = $id;  
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('recursive' => 4,'conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
            $cityList = $this->Account->Biodata->City->find("all", [
                "conditions" => [
                    "state_id" => $rows['Biodata']['state_id'],
                ],
            ]);
            $this->set(compact("cityList"));
        }
    }

    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }

    function _options() {
        $this->set("accountStatuses", $this->{ Inflector::classify($this->name) }->AccountStatus->find("list", array("fields" => array("AccountStatus.id", "AccountStatus.name"))));
        $this->set("identityTypes", $this->{ Inflector::classify($this->name) }->Biodata->IdentityType->find("list", array("fields" => array("IdentityType.id", "IdentityType.name"))));
        $this->set("genders", $this->{ Inflector::classify($this->name) }->Biodata->Gender->find("list", array("fields" => array("Gender.id", "Gender.name"))));
        $this->set("countries", $this->{ Inflector::classify($this->name) }->Biodata->Country->find("list", array("fields" => array("Country.id", "Country.name"), "conditions" => array("Country.id" => 100))));
        $this->set("states", $this->{ Inflector::classify($this->name) }->Biodata->State->find("list", array("fields" => array("State.id", "State.name"))));
//        $this->set("cities", $this->{ Inflector::classify($this->name) }->Biodata->City->find("list", array("fields" => array("City.id", "City.name"))));
        $this->set("userGroups", $this->{ Inflector::classify($this->name) }->User->UserGroup->find("list", array("fields" => array("UserGroup.id", "UserGroup.label"))));
    }

    function admin_delete($id = null) {
        if ($this->request->is("delete")) {
            if ($this->{ Inflector::classify($this->name) }->delete($id)) {
                $code = 204;
            } else {
                $code = 400;
            }
        } else {
            $code = 400;
        }
        echo json_encode($this->_generateStatusCode($code));
        die();
    }

    function admin_edit_profile() {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->Account->data = $this->data;
            $this->Account->data['Account']['id'] = $this->Session->read("credential.admin.Account.id");
            $this->Account->data['Biodata']['id'] = $this->Session->read("credential.admin.Biodata.id");
            $this->Account->data['User']['id'] = $this->Session->read("credential.admin.User.id");
            App::import("Vendor", "qqUploader");
            $allowedExt = array("doc", "docx", "xls", "xlsx", "csv", "pdf", "ppt", "pptx", "jpg", "jpeg", "png", "zip");
            $size = 10 * 1024 * 1024;
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['Account']['profile_picture']);
            $result = $uploader->handleUpload("img" . DS . "profile_photos" . DS);
            unset($this->Account->data['Account']['profile_picture']);
            switch ($result['status']) {
                case 206:
                    $this->Account->data['User']['profile_picture'] = DS . "{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
            }
            $this->{ Inflector::classify($this->name) }->saveAll();
            $this->_update_admin_session();
        }
        $this->data = $this->Account->find("first", array(
            "conditions" => array(
                "Account.id" => $this->Session->read("credential.admin.Account.id")
            ),
            "recursive" => 2
        ));
        $this->set("accountStatuses", $this->{ Inflector::classify($this->name) }->AccountStatus->find("list", array("fields" => array("AccountStatus.id", "AccountStatus.name"))));
        $this->set("identityTypes", $this->{ Inflector::classify($this->name) }->Biodata->IdentityType->find("list", array("fields" => array("IdentityType.id", "IdentityType.name"))));
        $this->set("genders", $this->{ Inflector::classify($this->name) }->Biodata->Gender->find("list", array("fields" => array("Gender.id", "Gender.name"))));
        $this->set("countries", $this->{ Inflector::classify($this->name) }->Biodata->Country->find("list", array("fields" => array("Country.id", "Country.name"), "conditions" => array("Country.id" => 100))));
        $this->set("states", $this->{ Inflector::classify($this->name) }->Biodata->State->find("list", array("fields" => array("State.id", "State.name"))));
        $this->set("userGroups", $this->{ Inflector::classify($this->name) }->User->UserGroup->find("list", array("fields" => array("UserGroup.id", "UserGroup.name"), "conditions" => array("not" => array("UserGroup.id" => 1)))));
        $this->set("cities", $this->{ Inflector::classify($this->name) }->Biodata->City->find("list", array("conditions" => array("City.state_id" => $this->Session->read("credential.admin.Biodata.state_id")))));
    }

    function register() {
        if ($this->request->is("post")) {
            $this->Session->delete('redirect.register');
            $this->{ Inflector::classify($this->name) }->set($this->data);
            $password = $this->{ Inflector::classify($this->name) }->data["User"]["password"];
            $salt = hash("sha224", uniqid(mt_rand(), true), false);
            $encrypt = hash("sha512", $password . $salt, false);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                $this->{ Inflector::classify($this->name) }->data["Account"]["account_status_id"] = 2;
                $this->{ Inflector::classify($this->name) }->data["User"]["user_group_id"] = 2;
                unset($this->{ Inflector::classify($this->name) }->data["User"]["repeat_password"]);
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data);
                $lastId = $this->{ Inflector::classify($this->name) }->getLastInsertID();
                $this->_add_shipping_address($lastId);
                $this->Session->setFlash(__("Pendaftaran berhasil"), 'default', array(), 'success');
                $this->redirect('/register');
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->write("redirect.register", array("validationErrors" => $this->validationErrors, "data" => $this->data));
                $this->Session->setFlash(__("Mohon mengecek kembali data dibawah"), 'default', array(), 'danger');
                $this->redirect('/register');
            }
        } else {
            echo json_encode($this->_generateStatusCode(400));
        }
    }

    function login_admin() {
        if (!empty($this->Session->read("credential.admin"))) {
            $this->redirect("/admin/dashboard");
        }
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive"=>2,"conditions" => array("OR" => array("User.email" => $this->data['Account']['username'], "User.username" => $this->data['Account']['username']))));
            if (!empty($data)) {
                if ($this->_testPassword($this->data['Account']['password'], $data['User']['salt'], $data['User']['password'])) {
                    $this->Session->write("credential.admin", $data);
                    $this->redirect("/admin/dashboard");
                } else {
                    $this->Session->setFlash(__(""), 'default', array(), 'login-gagal');
                }
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'login-gagal');
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/admin_login";
    }

    function logout_admin() {
        $this->Session->delete("credential.admin");
        $this->redirect("/admin");
    }

    function login_member() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $code = 402;
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, "conditions" => array("OR" => array("User.email" => $this->request->data['username'], "User.username" => $this->request->data['username']), "User.user_group_id" => 2)));
            if (!empty($data)) {
                if ($this->_testPassword($this->request->data['password'], $data['User']['salt'], $data['User']['password'])) {
                    $this->Session->write("credential.member", $data);
                    $code = 201;
                }
            }
            echo json_encode($this->_generateStatusCode($code));
        }
    }

    function logout_member() {
        $this->Session->delete("credential.member");
        $this->Session->delete("cart");
        $this->Session->delete("compare");
        $this->Session->delete("pembelian-terakhir");
        $this->redirect("/");
    }

    function _hashPassword($plain) {
        $hashed = hash("sha512", $plain, false);
        return $hashed;
    }

    function _testPassword($password, $salt, $hashedPassword) {
        return $hashedPassword == $this->_hashPassword($password . $salt);
    }

    function admin_change_password() {
        if ($this->request->is("post")) {
            if ($this->_testPassword($this->data['Account']['password_lama'], $this->Session->read("credential.admin.User.salt"), $this->Session->read("credential.admin.User.password"))) {
                $this->{ Inflector::classify($this->name) }->data = $this->data;
                unset($this->{ Inflector::classify($this->name) }->data['Account']['password_lama']);
                $password = $this->{ Inflector::classify($this->name) }->data["User"]["password"];
                $salt = hash("sha224", uniqid(mt_rand(), true), false);
                $encrypt = $this->_hashPassword($password . $salt);
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                    $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                    $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                    unset($this->{ Inflector::classify($this->name) }->data["User"]["repeat_password"]);
                    $this->{ Inflector::classify($this->name) }->data['Account']['id'] = $this->Session->read("credential.admin.Account.id");
                    $this->{ Inflector::classify($this->name) }->data["User"]["id"] = $this->Session->read("credential.admin.User.id");
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data);
                    $this->_update_admin_session();
                    $this->data = array();
                    $this->Session->setFlash(__("Password berhasil diganti"), 'default', array(), 'success');
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
                }
            } else {
                $this->Session->setFlash(__("Password lama salah"), 'default', array(), 'danger');
            }
        }
    }

    function member_change_password() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            if ($this->_testPassword($this->data['Account']['password_lama'], $this->Session->read("credential.member.User.salt"), $this->Session->read("credential.member.User.password"))) {
                $this->{ Inflector::classify($this->name) }->data = $this->data;
                unset($this->{ Inflector::classify($this->name) }->data['Account']['password_lama']);
                $password = $this->{ Inflector::classify($this->name) }->data["User"]["password"];
                $salt = hash("sha224", uniqid(mt_rand(), true), false);
                $encrypt = $this->_hashPassword($password . $salt);
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                    $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                    $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                    unset($this->{ Inflector::classify($this->name) }->data["User"]["repeat_password"]);
                    $this->{ Inflector::classify($this->name) }->data["User"]["id"] = $this->Session->read("credential.member.User.id");
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data);
                    $this->_update_member_session();
                    $this->Session->setFlash(__("Password berhasil diganti"), 'default', array(), 'success');
                    $this->redirect("/profil");
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
                    $this->redirect("/profil");
                }
            } else {
                $this->Session->setFlash(__("Password lama salah"), 'default', array(), 'danger');
                $this->redirect("/profil");
            }
        }
    }


    function _update_member_session() {
        $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $this->Session->read("credential.member.Account.id"))));
        $this->Session->write("credential.member", $data);
    }

    function _update_admin_session() {
        $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $this->Session->read("credential.admin.Account.id"))));
        $this->Session->write("credential.admin", $data);
    }

    function admin_restriction() {
        
    }

    function admin_change_status() {
        $this->autoRender = false;
        if ($this->request->is("PUT")) {
            $this->Account->id = $this->request->data['id'];
            $this->Account->save(array("Account" => array("account_status_id" => $this->request->data['status'])));
            $data = $this->Account->find("first", array("conditions" => array("Account.id" => $this->request->data['id']), "recursive" => 1));
            echo json_encode($this->_generateStatusCode(207, null, array("status_label" => $data['AccountStatus']['name'])));
        } else {
            echo json_encode($this->_generateStatusCode(400));
        }
    }

    function front_registration() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if (!empty($this->data['User']['email'])) {
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                    $email = $this->data['User']['email'];
                    $password = $this->generate_password(8);
                    $salt = hash("sha224", uniqid(mt_rand(), true), false);
                    $encrypt = hash("sha512", $password . $salt, false);
                    $info = array(
                        "item" => array("email" => $email, "password" => $password),
                        "tujuan" => $email,
                        "acc" => "NoReply2",
                        "from" => "noreply@makassarterkini.com",
                        "subject" => "Registrasi Akun Makassar Terkini",
                    );
                    $success = true;
                    $this->{ Inflector::classify($this->name) }->data["User"]["user_group_id"] = 2;
                    $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
    //                $this->{ Inflector::classify($this->name) }->data["User"]["username"] = $email;
                    $this->{ Inflector::classify($this->name) }->data["User"]["email"] = $email;
                    $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                    $this->{ Inflector::classify($this->name) }->data["Biodata"]["created"] = date('Y-m-d h:i:s');
                    $this->{ Inflector::classify($this->name) }->data["Biodata"]["modified"] = date('Y-m-d h:i:s');
                    $this->{ Inflector::classify($this->name) }->data["Account"]["account_status_id"] = 1;
                    $this->{ Inflector::classify($this->name) }->data["Account"]["activation_date"] = date('Y-m-d h:i:s');
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));

                    try {
                        $this->_sentEmail("registrasi-akun-makassar-terkini", $info);
                    } catch (Exception $e) {
                        $success = false;
                        $this->Session->setFlash(__(""), 'default', array(), 'register-gagal2');
                    }
                    if ($success == true) {
                        $this->Session->setFlash(__(""), 'default', array(), 'register-sukses');
                    }
                } else {
                    $this->Session->setFlash(__(""), 'default', array(), 'register-gagal-email-sudah-terdaftar');
                }
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'register-gagal');
            }
            $this->redirect("/login-register");
        }
    }

    function generate_password($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }
    
    function front_login_member() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $code = 402;
            $data = $this->{ Inflector::classify($this->name) }->find("first", array(
                "recursive" => 2, 
                "conditions" => array(
                    "OR" => array(
                        "User.email" => $this->data['User']['email'], 
                        "User.username" => $this->data['User']['email']),
                    "User.user_group_id" => 2
                    )
                )
            );
            if (!empty($data)) {
                if ($data['Account']['account_status_id'] === '1') {
                    if ($this->_testPassword($this->data['User']['password'], $data['User']['salt'], $data['User']['password'])) {
                        $this->Session->write("credential.member", $data);
                        $code = 201;
                        $this->redirect('/profile_member');
                    } else {
                        $this->Session->setFlash(__(""), 'default', array(), 'login-gagal-password');
                        $this->redirect('/login-register');
                        echo json_encode($this->_generateStatusCode($code));
                    }
                } else {
                    $this->Session->setFlash(__(""), 'default', array(), 'login-gagal-akun-nonaktif');
                    $this->redirect('/login-register');
                }
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'login-gagal-email');
                $this->redirect('/login-register');
                echo json_encode($this->_generateStatusCode($code));
            }
        }
    }
    
    function front_edit_profile() {
        $this->autoRender = false;
        $user_id = $this->Session->read("credential.member.User.id");
        $account_id = $this->Session->read("credential.member.Account.id");
        $biodata_id = $this->Session->read("credential.member.Biodata.id");
        $password = $this->data['User']['password'];
        $current_password = $this->data['User']['current_password'];
        $retype_password = $this->data['User']['retype_password'];
        $current_salt = $this->Session->read("credential.member.User.salt");
        $salt = hash("sha224", uniqid(mt_rand(), true), false);
        $hashedPassword = $this->Session->read("credential.member.User.password");
        if ($this->request->is("post") || $this->request->is("put")) {
            if (!is_null($account_id)) {
                if(!empty($password) || !empty($current_password) || !empty($retype_password)) {
                    if($this->_testPassword($current_password, $current_salt, $hashedPassword)) {
                        if($this->data['User']['password'] == $this->data['User']['retype_password']) {
                            $this->{ Inflector::classify($this->name) }->id = $account_id;
                            $this->Account->data['Account']['id'] = $account_id;
                            $this->Account->data['User']['id'] = $user_id;
                            $this->Account->data['Biodata']['id'] = $biodata_id;
                            $this->{ Inflector::classify($this->name) }->data['User']['username'] = $this->data['User']['username'];
                            $this->{ Inflector::classify($this->name) }->data['User']['salt'] = $salt;
                            $this->{ Inflector::classify($this->name) }->data['User']['email'] = $this->data['User']['email'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['first_name'] = $this->data['Biodata']['first_name'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['last_name'] = $this->data['Biodata']['last_name'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['biography'] = $this->data['Biodata']['biography'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['gender_id'] = $this->data['Biodata']['gender_id'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['birth_date'] = $this->data['Biodata']['birth_date'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['phone'] = $this->data['Biodata']['phone'];
                            $encrypt = hash("sha512", $password . $salt, false);
                            $this->{ Inflector::classify($this->name) }->data['User']['password'] = $encrypt;
                            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));
                            $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $this->Session->read("credential.member.Account.id"))));
                            $this->Session->write("credential.member", $data);
                            $this->Session->setFlash(__(""), 'default', array(), 'edit-profile-sukses');
                        } else {
                            $this->Session->setFlash(__(""), 'default', array(), 'edit-profile-gagal-ketik-ulang-password');
                        }
                    } else {
                        $this->Session->setFlash(__(""), 'default', array(), 'edit-profile-gagal-password');
                    }
                } else {
                    $this->{ Inflector::classify($this->name) }->id = $account_id;
                    $this->Account->data['Account']['id'] = $account_id;
                    $this->Account->data['User']['id'] = $user_id;
                    $this->Account->data['Biodata']['id'] = $biodata_id;
                    $this->{ Inflector::classify($this->name) }->data['User']['username'] = $this->data['User']['username'];
                    $this->{ Inflector::classify($this->name) }->data['User']['email'] = $this->data['User']['email'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['first_name'] = $this->data['Biodata']['first_name'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['last_name'] = $this->data['Biodata']['last_name'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['biography'] = $this->data['Biodata']['biography'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['gender_id'] = $this->data['Biodata']['gender_id'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['birth_date'] = $this->data['Biodata']['birth_date'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['phone'] = $this->data['Biodata']['phone'];
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));
                    $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $this->Session->read("credential.member.Account.id"))));
                    $this->Session->write("credential.member", $data);
                    $this->Session->setFlash(__(""), 'default', array(), 'edit-profile-sukses');
                }
            } 
        }
        $this->redirect("/profile_member");
    }
    
    function front_lupa_password() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("contain" => array("PasswordReset", "User", "Biodata"), "conditions" => array("OR" => array("User.email" => $this->data['User']['email']))));
            if (!empty($data)) {
                $token = hash("sha256", uniqid(mt_rand(), true), false);
                $username = $data['User']['username'];
                $this->Account->data['Account']['id'] = $data['Account']['id'];
                $this->Account->data['PasswordReset']['id'] = $data['PasswordReset']['id'];
                $this->Account->data['PasswordReset']['token'] = $token;
                $this->Account->data['PasswordReset']['expire'] = date("Y-m-d H:i:s", time() + (24 * 3600));
                $this->Account->data['PasswordReset']['is_used'] = false;
                $this->Account->saveAll();
                $this->_sentEmail("lupa-password", [
                    "tujuan" => $this->data['User']['email'],
                    "subject" => "Makassar Terkini - Reset Password",
                    "from" => "noreply@makassarterkini.com",
                    "acc" => "NoReply2",
                    "item" => [
                        'token' => $token,
                        'username' => $username,
                    ],
                ]);
                $this->Session->setFlash(__(""), 'default', array(), 'lupa-password-kirim-email-sukses');
                $this->redirect("/lupa-password");
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'lupa-password-kirim-email-gagal');
                $this->redirect("/lupa-password");
            }
        }
    }
    
    function lupa_password_admin() {
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/admin_lupa_password";
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("contain" => array("PasswordReset", "User", "Biodata"), "conditions" => array("OR" => array("User.email" => $this->data['User']['email']))));
            if (!empty($data)) {
                $token = hash("sha256", uniqid(mt_rand(), true), false);
                $username = $data['User']['username'];
                $this->Account->data['Account']['id'] = $data['Account']['id'];
                $this->Account->data['PasswordReset']['id'] = $data['PasswordReset']['id'];
                $this->Account->data['PasswordReset']['token'] = $token;
                $this->Account->data['PasswordReset']['expire'] = date("Y-m-d H:i:s", time() + (24 * 3600));
                $this->Account->data['PasswordReset']['is_used'] = false;
                $this->Account->saveAll();
                $this->_sentEmail("admin-lupa-password", [
                    "tujuan" => $this->data['User']['email'],
                    "subject" => "Makassar Terkini - Reset Password",
                    "from" => "noreply@makassarterkini.com",
                    "acc" => "NoReply2",
                    "item" => [
                        'token' => $token,
                        'username' => $username,
                    ],
                ]);
                $this->Session->setFlash(__(""), 'default', array(), 'lupa-password-kirim-email-sukses');
                $this->redirect("/admin");
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'lupa-password-kirim-email-gagal');
                $this->redirect("/admin");
            }
        }
    }
    
    function ganti_password_admin($token = null) {
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/admin_lupa_password";
        date_default_timezone_set("Asia/Jakarta");
        $now = new DateTime();
        $data = $this->Account->PasswordReset->find("first",[
            "conditions" => [
                "PasswordReset.token" => $token,
            ],
            "contain" => [
                "Account" => [
                    "User",
                ]
            ]
        ]);
        $this->set("token", $token);
        if (is_null($token) || empty($data) || $data['PasswordReset']['is_used'] || $now > new DateTime($data['PasswordReset']['expire'])) {
            $this->Session->setFlash(__(""), 'default', array(), 'reset-password-gagal2');
            $this->redirect("/admin");
        }
        if ($this->request->is("post")) {
            if ($this->_testPassword($this->data['User']['oldPassword'], $data['Account']['User']['salt'], $data['Account']['User']['password'])) {
                if($this->data['User']['newPassword'] == $this->data['User']['repeatPassword']) {
                    $this->{ Inflector::classify($this->name) }->data = $this->data;
                    unset($this->{ Inflector::classify($this->name) }->data['User']['oldPassword']);
                    $password = $this->{ Inflector::classify($this->name) }->data["User"]["newPassword"];
                    $salt = hash("sha224", uniqid(mt_rand(), true), false);
                    $encrypt = $this->_hashPassword($password . $salt);
                    if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                        $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                        $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                        unset($this->{ Inflector::classify($this->name) }->data["User"]["repeatPassword"]);
                        $this->Account->data["Account"]["id"] = $data['Account']['id'];
                        $this->Account->data["User"]["id"] = $data['Account']['User']['id'];
                        $this->Account->data["PasswordReset"]["id"] = $data['PasswordReset']['id'];
                        $this->Account->data["PasswordReset"]["is_used"] = true;
                        $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data);
                        $this->_update_member_session();
                        $this->Session->setFlash(__(""), 'default', array(), 'reset-password-sukses');
                        $this->redirect("/admin");
                    } else {
                        $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                        $this->Session->setFlash(__(""), 'default', array(), 'reset-password-gagal3');
                        $this->redirect("/admin");
                    }
                } else {
                    $this->Session->setFlash(__(""), 'default', array(), 'reset-password-gagal4');
                    $this->redirect("/admin");
                }
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'reset-password-gagal');
                $this->redirect("/admin");
            }
        }
    }
    
    function mobile_registration() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if (!empty($this->data['User']['email'])) {
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                    $email = $this->data['User']['email'];
                    $password = $this->generate_password(8);
                    $salt = hash("sha224", uniqid(mt_rand(), true), false);
                    $encrypt = hash("sha512", $password . $salt, false);
                    $info = array(
                        "item" => array("email" => $email, "password" => $password),
                        "tujuan" => $email,
                        "acc" => "NoReply2",
                        "from" => "noreply@makassarterkini.com",
                        "subject" => "Registrasi Akun Makassar Terkini",
                    );
                    $success = true;
                    $this->{ Inflector::classify($this->name) }->data["User"]["user_group_id"] = 2;
                    $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
    //                $this->{ Inflector::classify($this->name) }->data["User"]["username"] = $email;
                    $this->{ Inflector::classify($this->name) }->data["User"]["email"] = $email;
                    $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                    $this->{ Inflector::classify($this->name) }->data["Biodata"]["created"] = date('Y-m-d h:i:s');
                    $this->{ Inflector::classify($this->name) }->data["Biodata"]["modified"] = date('Y-m-d h:i:s');
                    $this->{ Inflector::classify($this->name) }->data["Account"]["account_status_id"] = 1;
                    $this->{ Inflector::classify($this->name) }->data["Account"]["activation_date"] = date('Y-m-d h:i:s');
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));

                    try {
                        $this->_sentEmail("registrasi-akun-makassar-terkini", $info);
                    } catch (Exception $e) {
                        $success = false;
                        $this->Session->setFlash(__("Terdapat kesalahan saat mengirimkan email konfirmasi penggantian password Anda."), 'default', array(), 'danger');
                    }
                    if ($success == true) {
                        $this->Session->setFlash(__(""), 'default', array(), 'register-sukses');
                    }
                } else {
                    $this->Session->setFlash(__(""), 'default', array(), 'register-gagal-email-sudah-terdaftar');
                }
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'register-gagal');
            }
            $this->redirect("/m/register");
        }
    }
    
    function mobile_lupa_password() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("contain" => array("PasswordReset", "User", "Biodata"), "conditions" => array("OR" => array("User.email" => $this->data['User']['email'])))); 
            if (!empty($data)) {
                $token = hash("sha256", uniqid(mt_rand(), true), false);
                if(empty($data['User']['username'])) {
                    $username = $this->data['User']['email'];
                } else {
                    $username = $data['User']['username'];
                }
                $this->Account->data['Account']['id'] = $data['Account']['id'];
                $this->Account->data['PasswordReset']['id'] = $data['PasswordReset']['id'];
                $this->Account->data['PasswordReset']['token'] = $token;
                $this->Account->data['PasswordReset']['expire'] = date("Y-m-d H:i:s", time() + (24 * 3600));
                $this->Account->data['PasswordReset']['is_used'] = false;
                $this->Account->saveAll();
                $this->_sentEmail("mobile-lupa-password", [
                    "tujuan" => $this->data['User']['email'],
                    "subject" => "Makassar Terkini - Reset Password",
                    "from" => "noreply@makassarterkini.com",
                    "acc" => "NoReply2",
                    "item" => [
                        'token' => $token,
                        'username' => $username,
                    ],
                ]);
                $this->Session->setFlash(__(""), 'default', array(), 'lupa-password-kirim-email-sukses');
                $this->redirect("/m/forgot-password");
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'lupa-password-kirim-email-gagal');
                $this->redirect("/m/forgot-password");
            }
        }
    }
    
    function mobile_login_member() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $code = 402;
            $data = $this->{ Inflector::classify($this->name) }->find("first", array(
                "recursive" => 2, 
                "conditions" => array(
                    "OR" => array(
                        "User.email" => $this->data['User']['email'], 
                        "User.username" => $this->data['User']['email']),
                        "User.user_group_id" => 2
                    )
                )
            );
            if (!empty($data)) {
                if ($data['Account']['account_status_id'] === '1') {
                    if ($this->_testPassword($this->data['User']['password'], $data['User']['salt'], $data['User']['password'])) {
                        $this->Session->write("credential.member", $data);
                        $code = 201;
                        $this->redirect('/m/profile');
                    } else {
                        $this->Session->setFlash(__(""), 'default', array(), 'login-gagal-password');
                        $this->redirect('/m/login');
                        echo json_encode($this->_generateStatusCode($code));
                    }
                } else {
                    $this->Session->setFlash(__(""), 'default', array(), 'login-gagal-akun-nonaktif');
                    $this->redirect('/m/login');
                }
            } else {
                $this->Session->setFlash(__(""), 'default', array(), 'login-gagal-email');
                $this->redirect('/m/login');
                echo json_encode($this->_generateStatusCode($code));
            }
        }
    }
    
    function mobile_edit_profile() {
        $this->autoRender = false;
        $user_id = $this->Session->read("credential.member.User.id");
        $account_id = $this->Session->read("credential.member.Account.id");
        $biodata_id = $this->Session->read("credential.member.Biodata.id");
        $password = $this->data['User']['password'];
        $current_password = $this->data['User']['current_password'];
        $retype_password = $this->data['User']['retype_password'];
        $current_salt = $this->Session->read("credential.member.User.salt");
        $salt = hash("sha224", uniqid(mt_rand(), true), false);
        $hashedPassword = $this->Session->read("credential.member.User.password");
        if ($this->request->is("post") || $this->request->is("put")) {
            if (!is_null($account_id)) {
                if(!empty($password) || !empty($current_password) || !empty($retype_password)) {
                    if($this->_testPassword($current_password, $current_salt, $hashedPassword)) {
                        if($this->data['User']['password'] == $this->data['User']['retype_password']) {
                            $this->{ Inflector::classify($this->name) }->id = $account_id;
                            $this->Account->data['Account']['id'] = $account_id;
                            $this->Account->data['User']['id'] = $user_id;
                            $this->Account->data['Biodata']['id'] = $biodata_id;
                            $this->{ Inflector::classify($this->name) }->data['User']['username'] = $this->data['User']['username'];
                            $this->{ Inflector::classify($this->name) }->data['User']['salt'] = $salt;
                            $this->{ Inflector::classify($this->name) }->data['User']['email'] = $this->data['User']['email'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['first_name'] = $this->data['Biodata']['first_name'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['last_name'] = $this->data['Biodata']['last_name'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['biography'] = $this->data['Biodata']['biography'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['gender_id'] = $this->data['Biodata']['gender_id'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['birth_date'] = $this->data['Biodata']['birth_date'];
                            $this->{ Inflector::classify($this->name) }->data['Biodata']['phone'] = $this->data['Biodata']['phone'];
                            $encrypt = hash("sha512", $password . $salt, false);
                            $this->{ Inflector::classify($this->name) }->data['User']['password'] = $encrypt;
                            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));
                            $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $account_id)));
                            $this->Session->write("credential.member", $data);
//                            $this->Session->setFlash(__(""), 'default', array(), 'edit-profile-sukses');
                        } else {
//                            $this->Session->setFlash(__(""), 'default', array(), 'edit-profile-gagal-ketik-ulang-password');
                        }
                    } else {
//                        $this->Session->setFlash(__(""), 'default', array(), 'edit-profile-gagal-password');
                    }
                } else {
                    $this->{ Inflector::classify($this->name) }->id = $account_id;
                    $this->Account->data['Account']['id'] = $account_id;
                    $this->Account->data['User']['id'] = $user_id;
                    $this->Account->data['Biodata']['id'] = $biodata_id;
                    $this->{ Inflector::classify($this->name) }->data['User']['username'] = $this->data['User']['username'];
                    $this->{ Inflector::classify($this->name) }->data['User']['email'] = $this->data['User']['email'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['first_name'] = $this->data['Biodata']['first_name'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['last_name'] = $this->data['Biodata']['last_name'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['biography'] = $this->data['Biodata']['biography'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['gender_id'] = $this->data['Biodata']['gender_id'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['birth_date'] = $this->data['Biodata']['birth_date'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['phone'] = $this->data['Biodata']['phone'];
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));
                    $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $account_id)));
                    $this->Session->write("credential.member", $data);
//                    $this->Session->setFlash(__(""), 'default', array(), 'edit-profile-sukses');
                }
            }
        }
        $this->redirect("/m/profile");
    }  
    
    function admin_list() {
        $this->autoRender = false;
        if (isset($this->request->query['q'])) {
            $q = $this->request->query['q'];
            $conds = array(
                "or" => array(
                    "Biodata.first_name like" => "%$q%",
                    "Biodata.last_name like" => "%$q%",
            ));
        } else {
            $conds = array();
        }
        $suggestions = ClassRegistry::init("Biodata")->find("all", array(
            "conditions" => $conds,
        ));
        $result = [];
        foreach ($suggestions as $item) {
            if (!empty($item['Account'])) {
                $result[] = [
                    "id" => $item['Account']['id'],
                    "full_name" => $item['Biodata']['full_name'],
                ];
            }
        }
        echo json_encode($result);
    }
}