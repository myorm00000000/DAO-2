<?php

namespace Ruddy\DAO\Drivers\PDO;

/**
 * Ruddy Framework Data Access Objects Driver
 *
 * @author Gil Nimer <gil@ruddy.nl>
 */

class SQLSRV {
    private $_conn = null;

    public function __construct($host, $database, $username, $password, $port = null)
    {
        $strPort = ($port != null) ? "port={$port};" : '';
        try {
            $this->_conn = new \PDO("sqlsrv:Server={$host};{$strPort}Database={$database}", $username, $password);
        } catch(\PDOException $e) {
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    public function getConn()
    {
        return $this->_conn;
    }
} 