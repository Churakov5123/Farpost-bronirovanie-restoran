<?php


class ChordController
{

    public function actionIndex()
    {


        if ($_POST) {

            $tel = $_POST['tel'];
            $status_order = $_POST['status_order'];
            $delet=$_POST['delet'];

            Chord::delet($delet,$tel); // метод который удаляет бронь

            Chord::uporderstatus($status_order, $tel);// метод который изменяет  стутус брони

            header('Location: /admin');


        }

        return true;

    }
}