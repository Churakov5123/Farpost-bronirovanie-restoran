<?php

class Table
{
    // insert order
    public static function insertTable($name, $tel, $stol, $data_order, $data_time, $period)
    {
        if (Table::checkTable($stol, $data_order, $data_time, $period)) {
            $bd = Db::getConection();
            $sql = 'INSERT INTO table_order (name, tel, stol, data_order, data_time, period)  VALUES   (:name, :tel, :stol, :data_order, :data_time, :period) ';

            $result = $bd->prepare($sql);

            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':tel', $tel, PDO::PARAM_STR);
            $result->bindParam(':stol', $stol, PDO::PARAM_STR);
            $result->bindParam(':data_order', $data_order, PDO::PARAM_STR);
            $result->bindParam(':data_time', $data_time, PDO::PARAM_STR);
            $result->bindParam(':period', $period, PDO::PARAM_STR);

            if ($result->execute()) return true;
        } else return false;
    }

    private static function checkTable($stol, $data_order, $data_time, $period)
    {
        $bd = Db::getConection();
        $sql = 'SELECT * FROM table_order WHERE stol = \'' . $stol . '\'' .  ' AND ' .  ' data_order = \'' . $data_order  . '\'' .  ' AND ' .  ' data_time = \'' . $data_time . '\'' .  ' AND ' . ' period = \'' . $period . '\'' ;

        $checkOrder = $bd->prepare($sql);
        $checkOrder->execute();
        $resultCheck = $checkOrder->fetchAll();
        if ($resultCheck) return false;
        else return true;
    }


    // get order
    public static function getTable()
    {
        $bd = Db::getConection();
        $result = $bd->query('SELECT * FROM table_order');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $resultOrder = $result->fetchAll();
        if ($resultOrder) return $resultOrder;
        return false;
    }

}