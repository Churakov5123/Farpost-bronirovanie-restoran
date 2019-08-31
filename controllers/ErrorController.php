<?php

class ErrorController
{
    public function actionIndex()
    {
        // views content url index
        require_once ROOT . '/views/error.php';
        return true;
    }
}