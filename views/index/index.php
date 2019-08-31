<?php include("template/header.php"); ?>
<link rel="stylesheet" href="template/css/custom.css">
<style>
    body {
        background-image: url('template/images/fon.png');
    }
</style>
<div class="container">
    <div class="row">
        <div class="container-fluid" id="foform">
            <div class="row">
                <div class="col3">

                <div class="alert alert-primary col-12 col-lg-8">
                    <h4>Бронирование столов</h4><br>

                    <?php if (false): ?>
                        <p>Стол забронирован!</p>
                    <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <!--            <form method="post" action="action">  -->
                    <form id="form" method="post" action="order">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input id="name" type="text" name="name" class="form-control" aria-describedby="name"
                                       placeholder="Имя" maxlength="40"
                                       required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input id="tel" type="tel" name="tel" class="form-control" placeholder="Номер телефона"
                                       maxlength="16"
                                       required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>Стол</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <select name="stol" class="form-control">
                                    <option>Маленький(2 чел)</option>
                                    <option>Средний(4 чел)</option>
                                    <option>Большой(8 чел)</option>
                                    <option>Пати-тайм(16 чел)</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>День брони</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <select id="days" name="data_order" class="form-control">
                                    <?php
                                    for ($i = 0; $i <= 7; ++$i) {
                                        $set = Days::getOffset($i, 'N');
                                        $day = (Days::getDayWork($set));
                                        if ($day['name_day']) { ?>
                                            <option value="<?= Days::getOffset($i, ' j-m-Y ') ?>"
                                                    data-start="<?= substr($day['startwork_day'], 0, 5); ?>"
                                                    data-end="<?= substr($day['endwork_day'], 0, 5); ?>">
                                                <?= $day['name_day'] . Days::getOffset($i, ' j.m.Y ') . " открытие  " . substr($day['startwork_day'], 0, 5)
                                                . " закрытие  " . substr($day['endwork_day'], 0, 5); ?>
                                            </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <br><h5>Время брони</h5>
                            </div>
                            <div class="col-4">
                                <label>Часы брони</label>
                                <select id="hour" name="data_time" class="form-control">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Минуты брони</label>
                                <select id="minutes" name="data_minutes" class="form-control">
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                            <div class="input-group col-4">
                                <label>Продолжительность в часах</label>
                                <button id="minus" class="clock btn btn-outline-secondary" type="button"
                                        onclick="this.nextElementSibling.stepDown()"> -
                                </button>
                                <input id="raz" name="period" type="number" min="1" max="1" value="1" readonly
                                       class="raz">
                                <button id="plus" class="clock btn btn-outline-secondary" type="button"
                                        onclick="this.previousElementSibling.stepUp()"> +
                                </button>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input id="send" type="submit" name="submit" class="btn btn-success btn-block"
                                       value="Забронировать"/>
                            </div>
                        </div>
                        <?php endif; ?>

                    </form>
                </div>
                <!--        <div class="alert alert-primary col-12 col-lg-4">-->
                <!--            <h5>Время работы ресторана</h5>-->
                <!--            <ul class="list-group">-->
                <!--                --><?php
                //                $arrD = Days::getDays();
                //                foreach ($arrD as $listD) { ?>
                <!--                    <li class="list-group-item">--><?php //echo $listD['name_day'] . '<br>';
                //                        if ($listD['status_day']) {
                //                            echo 'Работаем ' . substr($listD['startwork_day'], 0, 5) . ' до ' . substr($listD['endwork_day'], 0, 5);
                //                        }  else echo ' <font  color="red" >*** Неработаем</font>'; ?>
                <!--                    </li>-->
                <!--                --><?php //} ?>
                <!--            </ul>-->
                <!--        </div>-->
                </div>
            </div>
        </div>



        <?php include("template/footer.php"); ?>
