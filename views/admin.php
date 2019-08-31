<?php



?>

    <!-- Шапка сайта  -->
    <!doctype html>

    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="template/css/admin.css"/>
    </head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar navbar-dark bg-dark">

    <a class="navbar-brand" href="#">

        <img src="template/images/logo-vl-eda@2x.png" width="50" height="50" class="d-inline-block align-top"
             alt="">

    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item ">

                <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>

            </li>


        </ul>


        <button class="btn btn-outline-primary my-2 my-sm-0"><a href='/' target="_blank">Выход</a>
        </button>

    </div>

</nav>
<br/><br/><br/><br/>
<center>
    <h3>Добрый день <?= $user['email']; ?> вы можете редактировать бронь<h3/>
</center>

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h5> 1. Установка режима работы ресторана</h5>
        </div>
    </div>
</div>
<br>
<br>


<div class="container" id="foform">
    <div class="row justify-content-center">
        <div class="alert alert-primary col-12 col-lg-8">
            <h4> Отредактируйте рабочие/выходные дни</h4><br>

            <form id="form" method="post" action="chdate">
                <div class="form-row">
                    <div class="form-group col-12">
                        <select id="days" name="name_day" class="form-control">
                            <option selected>Выбери день</option>
                            <?php
                            $arrdays=Days::eweryDayss();
                            foreach ($arrdays as $oneday)
                            {
                                echo '<option> ' . $oneday['name_day']  . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">

                        <select id="status" name="status_day" class="form-control">
                            <option selected>Включить/выключить</option>
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input id="send" type="submit" name="submit" class="btn btn-success btn-block"
                               value="Изменить"/>
                    </div>
                </div>
            </form>
        </div>

        <div class="alert alert-primary col-12 col-lg-4">
            <h5>Время работы ресторана</h5>
            <ul class="list-group">
                <?php
                $arrD = Days::getDays();
                foreach ($arrD as $listD) { ?>
                    <li class="list-group-item"><?php echo $listD['name_day'] . '<br>';
                        if ($listD['status_day']) {
                            echo 'Работаем ' . substr($listD['startwork_day'], 0, 5) . ' до ' . substr($listD['endwork_day'], 0, 5);
                        } else echo ' <font  color="red" >*** Неработаем</font>'; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h5> 2. Редактирование  забронированных столов</h5>
        </div>
    </div>
</div>

<div class="container" id="foform">
    <div class="row justify-content-center">
        <div class="alert alert-primary col-12 col-lg-8">
            <h4> Отредактируйте саму бронь</h4><br>

            <form id="form" method="post" action="chord">
                <div class="form-row">
                    <div class="form-group col-12">
                        <select id="days" name="tel" class="form-control">
                            <option selected>Выберите  номер номер клиента</option>
                            <?php
                            $arrord=Chord::getorders();
                            foreach ($arrord as $order)
                            {

                                echo '<option>  ' . $order['tel']  . ' </option>';
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">

                        <select id="status" name="status_order" class="form-control">
                            <option selected>Подтвердить/Отклонить</option>
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">

                        <select id="status" name="delet" class="form-control">
                            <option selected>Удалить</option>
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input id="send" type="submit" name="submit" class="btn btn-success btn-block"
                               value="Изменить"/>
                    </div>
                </div>
            </form>
        </div>

        <div class="alert alert-primary col-12 col-lg-4">
            <h5> Список и статус брони</h5>
            <ul class="list-group">
                <?php
                $arrord=Chord::getorders();
                foreach ($arrord as $order){ ?>
                    <li class="list-group-item"><?php echo   $order['name'],''.' '.'<b>'.$order['tel'].'</b>',' ' ,$order['stol'],' ' ,$order['start_order'],' ',$order['end_order'].'<br>';
                        if ($order['status_order']) {
                            echo 'Забронирован';}
                        else echo ' <font  color="red" >Бронь не подтверждена</font>'; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>





<?php include("template/footer.php"); ?>