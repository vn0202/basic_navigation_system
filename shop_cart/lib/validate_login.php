<?php


session_start();

if (isset($_POST["btn_login"])) {
    $errors = [];
    if (empty($_POST["userName"])) {
        $errors["userName"] = "Bạn không được để trống userName";
    } else {
        $pattern = "/^[A-z0-9_\.]{6,32}$/";
        if (!preg_match($pattern, $_POST["userName"])) {
            $errors['userName'] = "Tài khoản không đúng định dạng";
        }
    }
    if (empty($_POST["password"])) {
        $errors["password"] = "Bạn không được để trống password";
    } else {
        $pattern = "/^[A-z0-9_!@#$%^&()]{6,32}$/";
        if (!preg_match($pattern, $_POST["password"])) {
            $errors["password"] = "Mật khẩu không đúng định dạng";
        }
    }
    if (empty($errors)) {
        $flag = check_login();
        if ($flag === -1) {
            $errors["login"] = "Thông tin tài khoản không tồn tại";
        } else {
            $_SESSION["is_login"] = true;
            $_SESSION["id"] = $flag;
            if (!empty($_POST["remember"])) {
                // setcookie("userName", $_POST["userName"], time() + 3600, "/");
                setcookie("id", $flag, time() + 60, "/");
            }
            header("Location: ?module=home&act=main");
        }
    }
}
function emit_error($error)
{
    global $errors;
    if (isset($_POST['btn_login'])) {

        if (!empty($errors[$error])) {
            echo "<p class='error'> {$errors[$error]}</p>";
        }
    }
}
