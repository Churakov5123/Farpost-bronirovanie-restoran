<?php

class SpasiboController
{
    public function actionIndex()
    {
        require_once ROOT . '/views/spasibo.php';
        return true;
    }
}