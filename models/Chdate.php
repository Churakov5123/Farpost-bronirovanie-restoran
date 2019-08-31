<?php


class Chdate
{
    public static function putnewDate($name_day, $status_day)
    {

        $bd = Db::getConection();
        $sql = 'UPDATE `os_days` SET status_day=:status_day WHERE name_day=:name_day ';
        $result = $bd->prepare($sql);

        $result->bindParam(':name_day', $name_day, PDO::PARAM_STR);
        $result->bindParam(':status_day', $status_day, PDO::PARAM_INT);


        if ($result->execute()) return true;
    }




}