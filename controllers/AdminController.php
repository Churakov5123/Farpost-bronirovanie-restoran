<?php


class AdminController
{

    public function actionIndex()

    {

        // Получаем идентификатор пользователя из сессии
        $userId = Registr::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = Registr::getUserById($userId);

        require_once(ROOT . '/views/admin.php');

        return true;
    }


}