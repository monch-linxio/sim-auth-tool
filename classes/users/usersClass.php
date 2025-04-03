<?php

use myDatabaseClass\myDatabaseClass;

require 'db/databaseClass.php';


/**
 * Users Class
 */
class usersClass extends myDatabaseClass
{
    /**
     * @var string $table
     */
    protected string $table = 'users';

    /**
     * Product DB Constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function login(array $details): ?array
    {
        return parent::query("SELECT * FROM ".$this->table." WHERE login = ? AND password = ?",$details)->fetchArray();
    }
}