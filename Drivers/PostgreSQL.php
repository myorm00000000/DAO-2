<?php

namespace Ruddy\DAO\Drivers;

/**
 * Ruddy Framework Data Access Objects Driver
 *
 * @author Nick Vlug <nick@ruddy.nl>
 */

class PostgreSQL implements IDriver {

    /**
     * Connect to Database
     *
     * @param $host
     * @param $database
     * @param $username
     * @param $password
     * @param $driver
     * @param $port
     * @return mixed
     * @throws \Exception
     */
    public function connect($host, $database, $username, $password, $driver, $port)
    {
        return true;
    }

    /**
     * Disconnect database
     *
     * @return bool
     */
    public function disconnect()
    {
        return true;
    }

    /**
     * Prepare a query
     *
     * @param $query
     * @return mixed
     */
    public function prepare($query)
    {
        return true;
    }

    /**
     * Bind parameters to a query
     *
     * @param $param
     * @param $value
     * @param $type
     * @return mixed
     */
    public function bind($param, $value, $type)
    {
        return true;
    }

    /**
     * Execute query
     *
     * @return mixed
     */
    public function execute()
    {
        return true;
    }

    /**
     * Close Query
     *
     * @return bool
     */
    public function close()
    {
        return true;
    }

    /**
     * Fetch a single row
     *
     * @param $fetch_style
     * @return mixed
     */
    public function fetch($fetch_style)
    {
        return true;
    }

    /**
     * Fetch all rows
     *
     * @param $fetch_style
     * @return mixed
     */
    public function fetchAll($fetch_style)
    {
        return true;
    }

    /**
     * Fetch column
     *
     * @param $column_number
     * @return mixed
     */
    public function fetchColumn($column_number)
    {
        return true;
    }

    /**
     * Fetch as an Object
     *
     * @param $class_name
     * @param $ctor_args
     * @return mixed
     */
    public function fetchObject($class_name, $ctor_args)
    {
        return true;
    }

} 