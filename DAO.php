<?php

namespace Ruddy\DAO;

/**
 * Ruddy Framework Data Access Objects
 *
 * @author Gil Nimer <gil@ruddy.nl>
 */

class DAO {
    /**
     * @var null
     */
    protected $driver = null;

    /**
     * @var array
     */
    protected $drivers = array('PDO', 'MySQL', 'MySQLi', 'MSSQL', 'PostgreSQL');

    /**
     * Construct class and set driver
     *
     * @param $string
     * @throws \Exception
     */
    public function __construct($string)
    {
        if(in_array($string, $this->drivers)){
            $driver = "\\Ruddy\\DAO\\Drivers\\{$string}";
            $this->driver = new $driver();
        } else {
            throw new \Exception("DAO driver does not exists", "500");
        }
    }

    /**
     * Set driver
     *
     * @param $string
     * @throws \Exception
     */
    public function setDriver($string)
    {
        if(in_array($string, $this->drivers)){
            $driver = "\\Ruddy\\DAO\\Drivers\\{$string}";
            $this->driver = new $driver();
        } else {
            throw new \Exception("DAO driver does not exists", "500");
        }
    }

    /**
     * Connect to Database
     *
     * @param $driver
     * @param $host
     * @param $database
     * @param $username
     * @param $password
     * @param null $port
     * @return bool
     */
    public function connect($driver, $host, $database, $username, $password, $port = null)
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->connect($driver, $host, $database, $username, $password, $port);
    }

    /**
     * Disconnect database
     *
     * @return bool
     */
    public function disconnect()
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->disconnect();
    }

    /**
     * Prepare a query
     *
     * @param $query
     * @return bool
     */
    public function prepare($query)
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->prepare($query);
    }

    /**
     * Bind parameters to a query
     *
     * @param $param
     * @param $value
     * @param null $type
     * @return bool
     */
    public function bind($param, $value, $type = null)
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->bind($param, $value, $type);
    }

    /**
     * Execute query
     *
     * @return bool
     */
    public function execute()
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->execute();
    }

    /**
     * Close Query
     *
     * @return bool
     */
    public function close()
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->close();
    }

    /**
     * Fetch a single row
     *
     * @param int $fetch_style
     * @return bool
     */
    public function fetch($fetch_style = \PDO::FETCH_ASSOC)
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->fetch($fetch_style);
    }

    /**
     * Fetch all rows
     *
     * @param int $fetch_style
     * @return mixed
     */
    public function fetchAll($fetch_style = \PDO::FETCH_ASSOC)
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->fetchAll($fetch_style);
    }

    /**
     * Fetch column
     *
     * @param $column_number
     * @return bool
     */
    public function fetchColumn($column_number = 0)
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->fetchColumn($column_number);
    }

    /**
     * Fetch as an Object
     *
     * @param $class_name
     * @param null $ctor_args
     * @return bool
     */
    public function fetchObject($class_name, $ctor_args = null)
    {
        if(is_null($this->driver))
            return false;
        return $this->driver->fetchObject($class_name, $ctor_args);
    }
} 