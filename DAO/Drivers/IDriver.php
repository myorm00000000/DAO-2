<?php

namespace Ruddy\DAO\Drivers;

/**
 * Ruddy Framework Data Access Objects IDriver
 *
 * @author Nick Vlug <nick@ruddy.nl>
 */

interface IDriver
{
    public function connect($host, $database, $username, $password, $port = null);
    public function disconnect();
    public function prepare($query);
    public function bind();
    public function execute();
    public function close();
    public function fetch();
    public function fetchAll();
    public function fetchColumn();
    public function fetchObject();
}
