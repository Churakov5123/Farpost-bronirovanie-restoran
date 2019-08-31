<?php

class Db
{
    public static function getConection()
    {
        $bdParametPath = ROOT . '/config/db_param.php';
        $params = include($bdParametPath);


        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['pass']);
        $db->exec("set names utf8");


        return $db;
    }

}
