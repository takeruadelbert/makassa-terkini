<?php

/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class EchoHelper extends HtmlHelper {

    function empty_strip($s) {
        if (empty($s)) {
            return '-';
        }
        return $s;
    }
    
    function fullName($biodata=false){
        if ($biodata){
            return $biodata['first_name']." ".$biodata['last_name'];
        }
        return "";
    }
    
    function userGroup($user_group_id=false){
        $userGroupName=ClassRegistry::init("UserGroup")->find("list", array("fields" => array("UserGroup.id", "UserGroup.label")));
        if ($user_group_id){
            return $userGroupName[$user_group_id];
        }
        return "";
    }
    
    function gender($gender_id = false) {
        $gender = ClassRegistry::init("Gender")->find("list", array("fields" => array("Gender.id", "Gender.name")));
        if($gender) {
            return $gender[$gender_id];
        }
        return "";
    }
}
