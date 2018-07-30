<?php

class UsersController extends AppController {

    var $disabledAction = array();
    var $uses = array('User', 'SocialProfile');

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Data User");
        $this->_setPageInfo("admin_add", "Tambah User");
        $this->_setPageInfo("admin_edit", "Edit User");
    }

    function front_logout_member() {
        $this->Session->delete("credential.member");
        $this->Session->delete("Message");
        $this->redirect("/");
    }

    function mobile_logout_member() {
        $this->Session->delete("credential.member");
        $this->Session->delete("Message");
        $this->redirect("/m/");
    }

    /* social login functionality */

    public function social_login($provider) {
        if ($this->Hybridauth->connect($provider)) {
            $this->_successfulHybridauth($provider, $this->Hybridauth->user_profile);
        } else {
            // error
            $this->Session->setFlash($this->Hybridauth->error);
            $this->redirect("/");
        }
    }

    public function mobile_social_login($provider) {
        if ($this->Hybridauth->connect($provider)) {
            $this->_successfulHybridauth($provider, $this->Hybridauth->user_profile, "mobile");
        } else {
            // error
            $this->Session->setFlash($this->Hybridauth->error);
            $this->redirect("/m/");
        }
    }

    public function social_endpoint($provider = null) {
        $this->Hybridauth->processEndpoint();
    }

    public function mobile_social_endpoint($provider = null) {
        $this->Hybridauth->processEndpoint();
    }

    private function _successfulHybridauth($provider, $incomingProfile, $from = "desktop") {
        // #1 - check if user already authenticated using this provider before
        $this->SocialProfile->recursive = -1;
        $existingProfile = $this->SocialProfile->find('first', array(
            'conditions' => array('social_network_id' => $incomingProfile['SocialProfile']['social_network_id'], 'social_network_name' => $provider)
        ));

        if ($existingProfile) {
            // #2 - if an existing profile is available, then we set the user as connected and log them in
            $user = $this->User->find('first', array(
                'conditions' => array('User.id' => $existingProfile['SocialProfile']['user_id']),
                "recursive" => 2
            ));

            $this->_doSocialLogin($user, true, $from);
        } else {
            // New profile.
            if ($this->Session->check("credential.member")) {
                // user is already logged-in , attach profile to logged in user.
                // create social profile linked to current user
                $dataLogin = $this->Session->read("credential.member");
                $incomingProfile['SocialProfile']['user_id'] = $dataLogin['User']['id'];
                $this->SocialProfile->saveAll($incomingProfile);

                $this->Session->setFlash('Your ' . $incomingProfile['SocialProfile']['social_network_name'] . ' account is now linked to your account.');
                $this->redirect("/profile_member");
            } else {
                // no-one logged and no profile, must be a registration.
                $user = $this->User->Account->createFromSocialProfile($incomingProfile);
                $incomingProfile['SocialProfile']['user_id'] = $user['User']['id'];
                $this->SocialProfile->saveAll($incomingProfile);

                // log in with the newly created user
                $this->_doSocialLogin($user, true, $from);
            }
        }
    }

    private function mobile_successfulHybridauth($provider, $incomingProfile) {
        // #1 - check if user already authenticated using this provider before
        $this->SocialProfile->recursive = -1;
        $existingProfile = $this->SocialProfile->find('first', array(
            'conditions' => array('social_network_id' => $incomingProfile['SocialProfile']['social_network_id'], 'social_network_name' => $provider)
        ));

        if ($existingProfile) {
            // #2 - if an existing profile is available, then we set the user as connected and log them in
            $user = $this->User->find('first', array(
                'conditions' => array('User.id' => $existingProfile['SocialProfile']['user_id']),
                "recursive" => 2
            ));

            $this->_doSocialLogin($user, true);
        } else {
            // New profile.
            if ($this->Session->check("credential.member")) {
                // user is already logged-in , attach profile to logged in user.
                // create social profile linked to current user
                $dataLogin = $this->Session->read("credential.member");
                $incomingProfile['SocialProfile']['user_id'] = $dataLogin['User']['id'];
                $this->SocialProfile->saveAll($incomingProfile);

                $this->Session->setFlash('Your ' . $incomingProfile['SocialProfile']['social_network_name'] . ' account is now linked to your account.');
                $this->redirect("/m/profile");
            } else {
                // no-one logged and no profile, must be a registration.
                $user = $this->User->Account->createFromSocialProfile($incomingProfile);
                $incomingProfile['SocialProfile']['user_id'] = $user['User']['id'];
                $this->SocialProfile->saveAll($incomingProfile);

                // log in with the newly created user
                $this->_doSocialLogin($user, true);
            }
        }
    }

    private function _doSocialLogin($user, $returning = false, $from = "desktop") {
        if ($this->Session->write("credential.member", $user)) {
            if ($returning) {
//                    $this->Session->setFlash(__('Welcome back, '. $this->Auth->user('username')));
                $this->Session->setFlash("Berhasil Login!");
            } else {
//                    $this->Session->setFlash(__('Welcome to our community, '. $this->Auth->user('username')));
                $this->Session->setFlash("Gagal Login!");
            }
            switch ($from) {
                case "desktop":
                    $this->redirect("/profile_member");
                    break;
                case "mobile":
                    $this->redirect("/m/profile");
                    break;
            }
        } else {
            $this->Session->setFlash(__('Unknown Error could not verify the user.'));
        }
    }

    function front_change_cover() {
        if ($this->request->is("post")) {
            $user_id = $this->Session->read("credential.member.User.id");
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024; // max file 10MB
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['User'][0]['cover']);
            $result = $uploader->handleUpload("front_file" . DS . "makassar-terkini" . DS . "img" . DS . "background-cover" . DS);
            unset($this->User->data['User'][0]['cover']);
            switch ($result['status']) {
                case 206:
                    $this->User->data['User']['id'] = $user_id;
                    $path = $this->User->data['User']['cover_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
            }
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
            $this->Session->setFlash(__(""), 'default', array(), 'ubah-background-cover-sukses');
            $this->Session->write("credential.member.User.cover_path", $path);
            $this->redirect("/profile_member");
        }
    }

    function front_change_profile_picture() {
        if ($this->request->is("post")) {
            $user_id = $this->Session->read("credential.member.User.id");
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024; // max file 10MB
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['User'][0]['profile_picture']);
            $result = $uploader->handleUpload("front_file" . DS . "makassar-terkini" . DS . "img" . DS . "profile-picture" . DS);
            unset($this->User->data['User'][0]['profile_picture']);
            switch ($result['status']) {
                case 206:
                    $this->User->data['User']['id'] = $user_id;
                    $this->User->data['User']['profile_picture_thumbnail'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    $path = $this->User->data['User']['profile_picture'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
            }
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
            $this->Session->setFlash(__(""), 'default', array(), 'ubah-profile-picture-sukses');
            $this->Session->write("credential.member.User.profile_picture", $path);
            $this->redirect("/profile_member");
        }
    }
    
    function mobile_change_cover() {
        if ($this->request->is("post")) {
            $user_id = $this->Session->read("credential.member.User.id");
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024; // max file 10MB
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['User'][0]['cover']);
            $result = $uploader->handleUpload("front_file" . DS . "makassar-terkini" . DS . "img" . DS . "background-cover" . DS);
            unset($this->User->data['User'][0]['cover']);
            switch ($result['status']) {
                case 206:
                    $this->User->data['User']['id'] = $user_id;
                    $path = $this->User->data['User']['cover_path'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
            }
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
//            $this->Session->setFlash(__(""), 'default', array(), 'ubah-background-cover-sukses');
            $this->Session->write("credential.member.User.cover_path", $path);
            $this->redirect("/m/profile");
        }
    }
    
    function mobile_change_profile_picture() {
        if ($this->request->is("post")) {
            $user_id = $this->Session->read("credential.member.User.id");
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024; // max file 10MB
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['User'][0]['profile_picture']);
            $result = $uploader->handleUpload("front_file" . DS . "makassar-terkini" . DS . "img" . DS . "profile-picture" . DS);
            unset($this->User->data['User'][0]['profile_picture']);
            switch ($result['status']) {
                case 206:
                    $this->User->data['User']['id'] = $user_id;
                    $this->User->data['User']['profile_picture_thumbnail'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    $path = $this->User->data['User']['profile_picture'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
            }
            $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
//            $this->Session->setFlash(__(""), 'default', array(), 'ubah-profile-picture-sukses');
            $this->Session->write("credential.member.User.profile_picture", $path);
            $this->Session->write("credential.member.User.profile_picture_thumbnail", $path);
            $this->redirect("/m/profile");
        }
    }
}
