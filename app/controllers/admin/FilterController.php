<?php

namespace app\controllers\admin;

use app\models\admin\FilterAttr;
use app\models\admin\FilterGroup;
use RedBeanPHP\R;

class FilterController extends AppController {

    public function attributeGroupAction() {
        $attrs_group = R::findAll('attribute_group');
        $this->setMeta('Filter groups');
        $this->set(compact('attrs_group'));
    }

    public function attributeAction() {
        $attrs = R::getAssoc(
            "SELECT attribute_value.*, attribute_group.title
            FROM attribute_value JOIN attribute_group 
            ON attribute_group.id = attribute_value.attr_group_id");
        $this->setMeta('Filters');
        $this->set(compact('attrs'));
    }

    public function groupDeleteAction() {
        $id =  $this->getRequestID();
        $count = R::count('attribute_value', 'attr_group_id = ?', [$id]);
        if ($count) {
            $_SESSION['error'] = 'Deletion is not possible the group has attributes';
            redirect();
        }
        R::exec('DELETE FROM attribute_group WHERE id = ?', [$id]);
        $_SESSION['success'] = 'Group was deleted';
        redirect();
    }

    public function attributeDeleteAction() {
        $id = $this->getRequestID();
        R::exec('DELETE FROM attribute_product WHERE attr_id = ?' , [$id]);
        R::exec('DELETE FROM attribute_value WHERE id = ?', [$id]);
        $_SESSION['success'] = 'Filter was deleted';
        redirect();
    }

    public function groupEditAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $group= new FilterGroup();
            $data = $_POST;
            $group->load($data);
            if (!$group->validate($data)) {
                $group->getErrors();
                redirect();
            }
            if ($group->update('attribute_group', $id)) {
                $_SESSION['success'] = 'Changes saved';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $group = R::load('attribute_group', $id);
        $this->setMeta("Edit group {$group->title}");
        $this->set(compact('group'));
    }

    public function attributeEditAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $attr = new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if (!$attr->validate($data)) {
                $attr->getErrors();
                redirect();
            }
            if ($attr->update('attribute_value', $id)) {
                $_SESSION['success'] = 'Changes saved';
                redirect();
            }
        }
        $id = $this->getRequestID();
        $attr = R::load('attribute_value', $id);
        $groups = R::findAll('attribute_group');
        $this->setMeta("Edit filter {$attr->value}");
        $this->set(compact('attr', 'groups'));
    }

    public function attributeAddAction() {
        if (!empty($_POST)) {
            $attr= new FilterAttr();
            $data = $_POST;
            $attr->load($data);
            if (!$attr->validate($data)) {
                $attr->getErrors();
                redirect();
            }
            if ($attr->save('attribute_value', false)) {
                $_SESSION['success'] = 'Filter added';
                redirect();
            }
        }
        $groups = R::findAll('attribute_group');
        $this->setMeta('New filter');
        $this->set(compact('groups'));
    }


    public function groupAddAction() {
        if (!empty($_POST)) {
            $group = new FilterGroup();
            $data = $_POST;
            $group->load($data);
            if (!$group->validate($data)) {
                $group->getErrors();
                redirect();
            }
            if ($group->save('attribute_group', false)) {
                $_SESSION['success'] = 'Group added';
                redirect();
            }
        }
        $this->setMeta('New filter group');
    }

}