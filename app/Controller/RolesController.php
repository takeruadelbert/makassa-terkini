<?php

App::uses('AppController', 'Controller');

class RolesController extends AppController {

    var $name = "Roles";
    var $disabledAction = array(
        "admin_add",
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Hak Akses");
        $this->_setPageInfo("admin_edit", "Ubah Hak Akses");
    }

    function admin_index() {
        $conds = $this->_filter($_GET, $this->filterCond);
        if (empty($conds)) {
            $conds = $this->defaultConds;
        }
        $conds['AND'] = am($conds, array(
                ), $this->conds);
        $this->Paginator->settings = array(
            "UserGroup" => array(
                'conditions' => $conds,
                'limit' => $this->paginate['limit'],
                'maxLimit' => $this->paginate['maxLimit'],
                'recursive' => -1,
                'contain' => [
                    "Role" => [
                        "Module"
                    ]
                ],
            )
        );
        $rows = $this->Paginator->paginate($this->Role->UserGroup);
        $data = array(
            'rows' => $rows,
        );
        $this->set(compact('data'));
    }

    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            if (!is_null($id)) {
                $this->Role->query("DELETE FROM roles WHERE user_group_id = " . $id);
                if (!empty($this->data['Module']['id'])) {
                    foreach ($this->data['Module']['id'] as $item) {
                        $this->Role->create();
                        $this->Role->save(array("user_group_id" => $id, "module_id" => $item));
                    }
                }
                $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                
            }
        } else {
            $row = $this->{ Inflector::classify($this->name) }->UserGroup->find("first", array('conditions' => array("UserGroup.id" => $id)));
            $dataModule = $this->Role->Module->find('all', [
                'order' => [
                    'Module.name' => 'ASC'],
                "recursive" => -1,
                "contain" => [
                    "Role" => [
                        "conditions" => [
                            "Role.user_group_id" => $id
                        ]
                    ]
                ]
            ]);
            $row['Role']['id']=$id;
            $this->data = $row;
            $this->set("dataModule", $dataModule);
        }
    }

}
