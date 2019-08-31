<?php

class Order
{
    public static function setOrderTable($name, $tel, $stol, $data_order, $data_time, $data_minutes, $period, $start_order, $end_order)
    {

        $bd = Db::getConection();
        $sql = 'INSERT INTO `os_order` (name, tel, stol, data_order, data_time, data_minutes, period, start_order , end_order)  VALUES   (:name, :tel, :stol, :data_order, :data_time, :data_minutes, :period, :start_order, :end_order) ';

        $result = $bd->prepare($sql);

        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':tel', $tel, PDO::PARAM_STR);
        $result->bindParam(':stol', $stol, PDO::PARAM_STR);
        $result->bindParam(':data_order', $data_order, PDO::PARAM_STR);
        $result->bindParam(':data_time', $data_time, PDO::PARAM_STR);
        $result->bindParam(':data_minutes', $data_minutes, PDO::PARAM_STR);
        $result->bindParam(':period', $period, PDO::PARAM_STR);
        $result->bindParam(':start_order', $start_order, PDO::PARAM_STR);
        $result->bindParam(':end_order', $end_order, PDO::PARAM_STR);

        if ($result->execute()) return true;
    }

    public static function checkStol($stol, $start_order, $end_order)
    {
        $bd = Db::getConection();
        $sql = 'SELECT `stol`, `start_order`, `end_order`  FROM `os_order` WHERE `stol` = :stol  AND  `start_order` BETWEEN :start_order  AND  :end_order  OR  `end_order` BETWEEN :start_order  AND  :end_order';

        $result = $bd->prepare($sql);
        $result->bindParam(':stol', $stol, PDO::PARAM_STR);
        $result->bindParam(':start_order', $start_order, PDO::PARAM_STR);
        $result->bindParam(':end_order', $end_order, PDO::PARAM_STR);

        $result->execute();
        $resCheck = $result->fetch(PDO::FETCH_BOUND);
        return $resCheck;
    }



}