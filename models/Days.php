<?php

class Days
{
    // получение  даты
    public static function getDate()
    {
        $timeDays = time();
        date('N , Y,  m , j , H , i, s', $timeDays);
        $arr = explode(',', date('N , Y,  m , j , H , i, s', $timeDays));
        $arrClock = ['day', 'year', 'month', 'dayInt', 'hour', 'minutes', 'seconds'];
        return array_combine($arrClock, array_values($arr));
    }

    // время работы ресторана
    public static function getDays()
    {
        $bd = Db::getConection();
        $sql = 'SELECT * FROM  os_days';

        $checkOrder = $bd->prepare($sql);
        $checkOrder->execute();
        $resultCheck = $checkOrder->fetchAll();

        return $resultCheck;
    }

    public static function eweryDayss()
    {
        $bd = Db::getConection();
        $sql = 'SELECT name_day FROM os_days';

        $checkOrder = $bd->prepare($sql);
        $checkOrder->execute();
        $resultCheck = $checkOrder->fetchAll();

        return $resultCheck;
    }


    // получение даты рабочего дня
    public static function getDayWork($numderDay)
    {
        $bd = Db::getConection();
        $sql = "SELECT `name_day`, `startwork_day` ,`endwork_day` FROM  `os_days` WHERE `status_day` = '1' AND `id_day` = $numderDay";

        $checkOrder = $bd->prepare($sql);
        $checkOrder->execute();
        $resultCheck = $checkOrder->fetch(PDO::FETCH_ASSOC);

        return $resultCheck;
    }
    // получение всех дней
    public static function getallDay($numderDay)
    {
        $bd = Db::getConection();
        $sql = "SELECT `name_day`, `startwork_day` ,`endwork_day` FROM  `os_days` WHERE `id_day` = $numderDay";

        $checkOrder = $bd->prepare($sql);
        $checkOrder->execute();
        $resultCheck = $checkOrder->fetch(PDO::FETCH_ASSOC);

        return $resultCheck;
    }


    public static function getNumberDay($name)
    {
        switch ($name) {
            case "Понедельник":
                return 1;
            case "Вторник" :
                return 2;

            case "Среда":
                return 3;

            case "Четверг":
                return 4;

            case "Пятница" :
                return 5;

            case "Субота":
                return 6;

            case "Воскресенье":
                return 7;
        }
    }
    // получение даты по дню
    public static function getOffset($int,$date){
        return date($date,strtotime("$int day"));
    }
}