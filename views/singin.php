<?php include("template/header.php"); ?>

<link rel="stylesheet" type="text/css" href="/template/css/forform.css"/>
.<br>
.<br>
.<br>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first">

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <H3> Вход в кабинет администратора</H3>
        </div>

        <form action="#" method="POST">
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Введите e-mail" value=""/>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                   placeholder="Введите пароль" value=""/>
            <input type="submit" name="submit" class="btn btn-default" value="Вход"/>
            <div class="row">
                <div class="col-12">
                    <a href="/regist">регистрация</a>
                </div>
            </div>

        </form>

    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include("template/footer.php"); ?>
