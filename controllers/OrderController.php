<?php

class OrderController
{

    /**
     * @return bool
     */
    public function actionIndex()
    {
//        print_r($_POST);
        if ($_POST) {
            {
                $name = htmlspecialchars($_POST['name']);
                $tel = htmlspecialchars($_POST['tel']);
                $stol = $_POST['stol'];
                $data_order = $_POST['data_order'];
                $data_time = $_POST['data_time'];
                $data_minutes = $_POST['data_minutes'];
                $period = $_POST['period'];

                $strStart = $data_order . " " . $data_time . ":" . $data_minutes . ":00";
                $start_order = date("Y-m-d H:i:s", strtotime($strStart));
                $per = $data_time + $period;

                switch ($per) {
                    case 8 :
                        $per = '08';
                        break;
                    case 9 :
                        $per = '09';
                        break;
                }
                $strEnd = $data_order . " " . $per . ":" . $data_minutes . ":00";
                $end_order = date("Y-m-d H:i:s", strtotime($strEnd));

                //проверка даты и времени по столу
                $resultCheck = Order::checkStol($stol, $start_order, $end_order);
                if ($resultCheck == false){
                    Order::setOrderTable($name, $tel, $stol, $data_order, $data_time, $data_minutes, $period, $start_order, $end_order);
                    header('Location: /spasibo');
                } else echo 'Этот стол занят на это время, попробуйте выбрать другой стол или изменить время';
            }
            return true;
        }

    }
}