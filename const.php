<?php

// Подключение файлов системы
define('ROOT', dirname(__FILE__));

// Data Time
//date_default_timezone_set('Asia/Vladivostok');
//$time = time();
//echo '<br />Получившееся дата и время Владивосток: '.date('d.m.Y H:i:s', $time).'<br />';



// Функция для получения даты
//function getDateRus(){
//    $monthes = array(
//        1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
//        5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
//        9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
//    );
//    return ( (int)date('d') . ' ' . $monthes[(date('n'))] . date(' Y'));
//}
// И функция для получения дня недели
//function getDayRus(){
//    $days = array(
//        'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
//        'Четверг', 'Пятница', 'Суббота'
//    );
//    return $days[(date('w'))];
//}
//echo '<br>' . getDateRus(date('d.m.Y H:i:s', $time));
//echo '<br>' . getDayRus(date('d.m.Y H:i:s', $time));