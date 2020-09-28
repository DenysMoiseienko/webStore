<?php

namespace app\models;

use RedBeanPHP\R;
use store\base\Model;

class AppModel extends Model {

    public static function createAlias($table, $field, $str, $id) {
        $str = self::str2url($str);
        $res = R::findOne($table, "$field = ?", [$str]);
        if ($res) {
            $str = "{$str}-{$id}";
            $res = R::count($table, "$field = ?", [$str]);
            if ($res > 0) {
                self::createAlias($table, $field, $str, $id);
            }
        }
        return $str;
    }

    public static function str2url($str) {

        $str = strtolower($str);
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        $str= trim($str, "-");

        return $str;
    }

}