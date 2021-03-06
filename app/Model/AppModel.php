<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    var $actsAs = array(
        'Containable',
        'WonoMultiLang' => array(
            "Module" => array(
                "name",
            ),
            "ModuleContent" => array(
                "name",
            ),
            "Bowl" => array(
                'name'
            ),
            "Fruit" => array(
                "name"
            )
        ),
    );
    
    var $deleteableHasmany = [
        "CatalogDetail" => [
            "relationField" => "catalog_id",
        ],
    ];

    public function saveData() {
        $this->saveAll($this->data, array("deep" => true));
    }
    
    public function _deleteableHasmany() {
        $tosaveModel = array_keys($this->data);
        $deleteableModels = array_intersect($tosaveModel, array_keys($this->deleteableHasmany));
        foreach ($deleteableModels as $deleteableModel) {
            $relationId = @$this->data[Inflector::classify(rtrim($this->deleteableHasmany[$deleteableModel]["relationField"], "_id"))]["id"];
            if (!empty($relationId)) {
                $currentModel = ClassRegistry::init($deleteableModel);
                $tosaveIds = array_column($this->data[$deleteableModel], "id");
                $recordedIds = $currentModel->find("list", [
                    "fields" => [
                        "$deleteableModel.id",
                    ],
                    "conditions" => [
                        "$deleteableModel.{$this->deleteableHasmany[$deleteableModel]["relationField"]}" => $relationId,
                    ]
                ]);
                $todeleteIds = array_diff($recordedIds, $tosaveIds);
                $currentModel->deleteAll(["$deleteableModel.id" => $todeleteIds]);
            }
        }
    }
}
