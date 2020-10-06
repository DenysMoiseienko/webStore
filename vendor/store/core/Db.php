<?php

namespace store;

use RedBeanPHP\R;

class Db {

    use TSingleton;

    protected function __construct() {
        $db = require_once CONF . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['pass']);

        if (!R::testConnection()) {
            throw new \Exception("No database connection", 500);
        }
        R::freeze(true);
        if (DEBUG) {
            R::debug(true, 1);
        }

        R::ext('xdispense', function ($type) {
            return R::getRedBean()->dispense($type);
        });
    }
}