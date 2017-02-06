<?php
/*
 *  Abstract Factory classes
 */

abstract class DB_Abstraction_Factory {
    protected $settings = array();
    protected function __construct() {
        $this->settings = Settings::getInstance();
    }

    abstract public function createInstance();
}

class DB_Abstraction_Factory_ADODB extends DB_Abstraction_Factory {
    public function __construct() {
        parent::__construct();
    }
    public function createInstance() {
        require_once('/path/to/adodb_lite/adodb.inc.php');
        $dsn = $this->settings['db.dsn'];
        $db = ADONewConnection($dsn);
        return $db;
    }
}

class DB_Abstraction_Factory_MDB2 extends DB_Abstraction_Factory {
    public function __construct() {
        parent::__construct();
    }
    public function createInstance() {
        require_once 'MDB2.php';
        $dsn = $this->settings['db.dsn'];
        $db = MDB2::factory($dsn);
        return $db;
    }
}

class DB_Abstraction_AbstractFactory {
    public static function getFactory() {
        $settings = Settings::getInstance();
        switch($settings['db.library'])
        {
            case 'adodblite':
                $factory = new DB_Abstraction_Factory_ADODBLITE();
                break;
            case 'mdb2';
                $factory = new DB_Abstraction_Factory_MDB2();
                break;
        }
        return $factory;
    }
}

/*
 *  Client's code
 */

// instantiate Abstract Factory
$abstractfactory = new DB_Abstraction_AbstractFactory();

// fetch a concrete Factory (decision handled in Abstract Factory static method)
$factory = $abstractfactory::getFactory();

// use concrete Factory to create a database connection object from
// the selected database abstraction library
$db = $factory->createInstance();
?>