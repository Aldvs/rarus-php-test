<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['mobile']);
unset($_SESSION['email']);
unset($_SESSION['address']);
unset($_SESSION['subject']);

unset($_SESSION['error_username']);
unset($_SESSION['error_email']);
unset($_SESSION['error_mobile']);
unset($_SESSION['success_mail']);


function redirect() {
    header("Location: index.php");
    exit;
}
$username = htmlspecialchars(trim($_POST['username']));
$mobile = htmlspecialchars(trim($_POST['mobile']));
$email = htmlspecialchars(trim($_POST['email']));
$address = htmlspecialchars(trim($_POST['address']));
$subject = htmlspecialchars(trim($_POST['subject']));


$_SESSION['username'] = $username;
$_SESSION['mobile'] = $mobile;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['subject'] = $subject;

if ($username == "") {
    $_SESSION['error_username'] = "Поле обязательно к заполнению";
    redirect();
}
else if (strpos($email,"@gmail.com") == true){
    $_SESSION['error_email'] = "Регистрация пользователей с доменом @gmail.com невозможна!";
    redirect();
}
else if ($mobile == "") {
    $_SESSION['error_mobile'] = "Поле обязательно к заполению";
    redirect();
}
else {
    $_SESSION['success_mail'] = "Успешно!";
    redirect();
}

