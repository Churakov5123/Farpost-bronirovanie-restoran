<?php


class Chord
{

    public static function getorders()
    {
        $bd = Db::getConection();
        $sql = 'SELECT `name`, `tel`, `stol`, `start_order`, `end_order`, `status_order` FROM `os_order` ';

        $result = $bd->prepare($sql);

        $result->execute();
        $resCheck = $result->fetchAll();

        return $resCheck;
    }

    public static function uporderstatus($status_order, $tel)
    {

        $bd = Db::getConection();

        $sql = 'UPDATE `os_order` SET `status_order`=:status_order WHERE `tel`=:tel';
        $result = $bd->prepare($sql);

        $result->bindParam(':status_order', $status_order, PDO::PARAM_INT);
        $result->bindParam(':tel', $tel, PDO::PARAM_STR);


        if ($result->execute()) {
            return true;
        }else{
            echo "небыло изменения брони";}

    }

    public static function delet($delet, $tel)
    {
        if($delet>0)

        {

            $bd = Db::getConection();
            $sql = "DELETE FROM `os_order` WHERE `tel`=:tel";
            $result = $bd->prepare($sql);
            $result->bindParam(':tel', $tel, PDO::PARAM_INT);


            if ($result->execute()) return true;

        }


    }




}