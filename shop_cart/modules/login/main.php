<?php 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/styles/login.css">


</head>

<body>
    <div id="wrapper-login">
        <div id="content-login" class="form-login">
            <section>
                <h1 class="heading-login">Đăng nhập</h1>
                <?php emit_error("login") ?>
                <form action="" method="POST">
                    <div class="form-group">

                        <label for="userName">Tên đăng nhập:</label>

                        
                        <input class="pd-10" type="text" name="userName" placeholder="Tên đăng nhập" value="" id="userName">
                    <?php  emit_error("userName")?>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="password">
                            Mật khẩu:
                        </label>

                        <input class="pd-10" type="password" name="password" placeholder="Nhập mật khẩu" id="password">
                        <?php  emit_error("password")?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember"> Ghi nhớ mật khẩu</label>
                    </div>
                    <br></br>
                    <input type="submit" name="btn_login" value="Login">
                </form>
                <a href="" class="forget_pass">Quên mật khẩu?</a>
            </section>
        </div>
    </div>
</body>

</html>