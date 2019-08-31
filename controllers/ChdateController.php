<?php


class ChdateController
{

    public function actionIndex()
    {
        if ($_POST)
            {

                $name_day = $_POST['name_day'];
                $status_day = $_POST['status_day'];

                //проверка если $_POST ['delet"]не пустая то запускать метод на удаление


                Chdate::putnewDate($name_day, $status_day);
                header('Location: /admin');;

            } else
            {
                echo 'Изменения неуспешны';
            }
            return true;

    }

}