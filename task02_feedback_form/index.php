<?php

session_start();

$username = '';
$mobile = '';
$email = '';
$address = '';
$subject = '';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
if (isset($_SESSION['mobile'])) {
    $mobile = $_SESSION['mobile'];
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if (isset($_SESSION['address'])) {
    $address = $_SESSION['address'];
}
if (isset($_SESSION['subject'])) {
    $subject = $_SESSION['subject'];
}

$error_username = $_SESSION['error_username'];
$error_mobile = $_SESSION['error_mobile'];
$error_email = $_SESSION['error_email'];

$success_mail = $_SESSION['success_mail'];

$title = "Форма обратной связи";

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php
        echo $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>
<body>
<div class="container" mt-5>
    <h1 class="mt-5"><?= $title ?></h1>
    <div class="text-success"><?= $success_mail ?></div>

    <form id="vueForm" @submit="checkForm" action="main.php" method="post">
        <p v-if="errors.length">
            <b>Пожалуйста исправьте указанные ошибки:</b>
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
        </p>

        <input v-model="username" type="text" name="username" placeholder="Введите Ваше ФИО" value="<?= $username ?>" class="form-control">
        <div class="text-danger"><?= $error_username ?></div>
        <br>

        <input v-model="mobile" type="text" name="mobile" placeholder="Введите Ваш мобильный телефон" value="<?= $mobile ?>" class="form-control">
        <div class="text-danger"><?= $error_mobile ?></div>
        <br>

        <input v-model="email" type="email" name="email" value="<?= $email ?>" placeholder="Введите вашу эл. почту" class="form-control">
        <div class="text-danger"><?= $error_email ?></div>
        <br>

        <input v-model="address" type="text" name="address" placeholder="Введите Ваш адрес" value="<?= $address ?>" class="form-control">
        <br>

        <input type="file" name="file" placeholder="Выберите файл" class="form-control"><br>

        <textarea v-model="subject" name="subject" placeholder="Оставьте комментарий" class="form-control"><?= $subject ?></textarea><br>

        <button type="submit" class="btn btn-success">ОТПРАВИТЬ</button>
    </form>

    <script>
        const app = new Vue({
            el     : '#vueForm',
            data   : {
                errors  : [],
                username: null,
                mobile  : null,
                email   : null,
                address : null,
                subject : null
            },
            methods: {
                checkForm     : function (e) {
                    this.errors = [];

                    if (!this.username) {
                        this.errors.push('Укажите имя.');
                    }

                    if (!this.email) {
                        this.errors.push('Укажите электронную почту.');
                    } else if (!this.validEmail(this.email)) {
                        this.errors.push('Укажите корректный адрес электронной почты.');
                    } else if (!this.isGmailDomain(this.email)) {
                        this.errors.push('Регистрация с доменом gmail.com запрещена.');
                    }

                    if (!this.mobile) {
                        this.errors.push('Укажите номер телефона.');
                    } else if (this.isPhoneNumeric(this.mobile)) {
                        this.errors.push('Номер телефона может состоять только из цифр.');
                    }

                    if (!this.address) {
                        this.errors.push('Вы не указали адрес.');
                    }

                    if (!this.subject) {
                        this.errors.push('Вы не указали комментарий.');
                    }

                    if (!this.errors.length) {
                        return true;
                    }

                    e.preventDefault();
                },
                validEmail    : function (email) {
                    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(email);
                },
                isPhoneNumeric: function (mobile) {
                    return isNaN(mobile);
                },
                isGmailDomain : function (email) {
                    let arrayEmail = email.split('@');
                    return arrayEmail[1] !== "gmail.com";
                }
            }
        })
    </script>
    <footer class="mt-5"> Все права защищены :) &copy; 2021</footer>
</div>
</body>
</html>