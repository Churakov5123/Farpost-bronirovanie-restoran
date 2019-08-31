<?php include("template/header.php"); ?>

<link rel="stylesheet" type="text/css" href="/template/css/forform.css"/>
.<br>
.<br>
.<br>

<div class="wrapper fadeInDown">
    <div id="formContent">

        <div class="fadeIn first">

            <?php if ($result): ?>
                <p>Вы зарегистрированы!</p>
            <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <H3> Регистрация администратора</H3>
        </div>

        <form action="#" method="POST">

            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Введите e-mail"
                   value="<?php echo $email; ?>"/>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                   placeholder="Создайте пароль" value="<?php echo $password; ?>"/>
            <input type="submit" name="submit" class="btn btn-ligh" value="Регистрация"/>
            <div class="row">
                <div class="col-12">
                    <a href="/singin">Вход</a>

                </div>
            </div>
        </form>
        <?php endif; ?>

    </div>
</div>

<?php include("template/footer.php"); ?>

