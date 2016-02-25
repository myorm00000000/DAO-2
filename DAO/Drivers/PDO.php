<?php

namespace Ruddy\DAO\Drivers;

/**
 * Ruddy Framework Data Access Objects Driver
 *
 * @author Gil Nimer <gil@ruddy.nl>
 */

class PDO {

    protected $driver = false;

    protected $drivers = array('MySQL', 'PostgreSQL', 'MSSQL', 'SQLSRV');

    private $_db = false;

    private $_query = null;

    public function connect($driver, $host, $database, $username, $password, $port = null)
    {
        if(in_array($driver, $this->drivers)){
            $driver = "Ruddy\\DAO\\Drivers\\PDO\\{$driver}";
            $this->driver = new $driver($host, $database, $username, $password, $port);
        } else {
            throw new \Exception("PDO driver does not exists", "500");
        }

        return $this->_db = $this->driver->getConn();
    }

    public function disconnect()
    {
        $this->driver = false;
        $this->_db = false;
        return true;
    }

    public function prepare($query)
    {
        return $this->_query = $this->_db->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if ($type == null) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }
        return $this->_query->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->_query->execute();
    }

    public function close()
    {
        $this->_query = null;
        return true;
    }

    public function fetch($fetch_style = \PDO::FETCH_ASSOC)
    {
        return $this->_query->fetch($fetch_style);
    }

    public function fetchAll($fetch_style = \PDO::FETCH_ASSOC)
    {
        return $this->_query->fetchAll($fetch_style);
    }

    public function fetchColumn($class_name, $ctor_args = null)
    {
        if($ctor_args == null) {
            return $this->_query->fetchObject($class_name);
        }
        return $this->_query->fetchObject($class_name, $ctor_args);
    }

    public function fetchObject($column_number = 0)
    {
        return $this->_query->fetchColumn($column_number);
    }
} 