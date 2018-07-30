<?php

class Account extends AppModel {

    public $belongsTo = array(
        'AccountStatus',
        'PasswordReset',
    );
    public $hasOne = array(
        'Biodata' => array(
            'dependent' => true
        ),
        'User' => array(
            'dependent' => true
        ),
    );
    
    public function createFromSocialProfile($incomingProfile) {
        // check to ensure that we are not using an email that already exists
        $existingUser = $this->find('first', array("recursive" => 2, 'conditions' => array('email' => $incomingProfile['SocialProfile']['email'])));

        if ($existingUser) {
            // this email address is already associated to a member
            return $existingUser;
        }
        
        // brand new user
        $socialUser['User']['email'] = $incomingProfile['SocialProfile']['email'];
//        $socialUser['User']['username'] = $incomingProfile['SocialProfile']['social_network_id'];
        $socialUser['User']['user_email'] = $incomingProfile['SocialProfile']['social_network_name'] . "_" . $incomingProfile['SocialProfile']['email'];
        $socialUser['User']['user_group_id'] = 2; // by default all social logins will have a role of member
        $socialUser['User']['password'] = date('Y-m-d h:i:s'); // although it technically means nothing, we still need a password for social. setting it to something random like the current time..
        $password = $socialUser['User']['password'];
        $salt = hash("sha224", uniqid(mt_rand(), true), false);
        $encrypt = hash("sha512", $password . $salt, false);
        $socialUser['User']['salt'] = $salt;
        $socialUser['User']['created'] = date('Y-m-d h:i:s');
        $socialUser['User']['modified'] = date('Y-m-d h:i:s');
        $socialUser['User']['profile_picture'] = $incomingProfile['SocialProfile']['picture'];
        $socialUser['User']['profile_picture_thumbnail'] = $incomingProfile['SocialProfile']['picture'];
        
        $socialUser['Biodata']['first_name'] = $incomingProfile['SocialProfile']['first_name'];
        $socialUser['Biodata']['last_name'] = $incomingProfile['SocialProfile']['last_name'];
        
        $socialUser['Account']['account_status_id'] = 1;    
                                
        // save and store our ID
        $this->saveAll($socialUser);

        $newUser = $this->find('first', array("recursive" => 2, 'conditions' => array('Account.id' => $this->getLastInsertID())));
        return $newUser;
    }
}
