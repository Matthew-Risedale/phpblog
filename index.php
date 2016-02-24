<?php

//старт сессии
session_start();

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('SITE_URL', 'http://phpblog/index.php');
//фаил с функциями
require 'functions.php';
//подключаем базу данных
$connection = new PDO('mysql:host=localhost;dbname=phpblog','root', 'shkvarki', array(
    PDO::ATTR_PERSISTENT => true
));
//берем стили из cookie
function style($user_style)
{
    switch ((int)$user_style) {
        case 1:
            return 'black';
            break;
        case 2:
            return 'blue';
            break;
    }
    return 'white';
}

$style = style(empty($_COOKIE['style']) ? 0 : $_COOKIE['style']);

//создаём переменную user, которая хранит залогинненого пользователя всю сессию
function user(PDO $connection = null, $login = null, $password = null)
{
    if (!empty($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    if (empty($login)) {
        return null;
    }
    $query = $connection->prepare('SELECT * FROM `users` WHERE `login`=:login AND `password`=:password');
    $query->execute([
        ':login' => $login,
        ':password' => $password,
    ]);
    $user = $query->fetch();
    if (!empty($user)) {
        $_SESSION['user'] = $user;
    }
    return $user;
}
$user = user();

//token
function token()
{
    $token = uniqid();
    $_SESSION['token'] = $token;
    return $token;
}

$posts_per_page=5;
$all_posts_count=$connection->query('SELECT count(*) FROM `messages`')->fetch();
$all_posts_count=$all_posts_count[0];

$page_count=ceil($all_posts_count/$posts_per_page);

$action = empty($_GET['action']) ? 'home' : $_GET['action'];
switch ($action) {
    case 'login':
        //перенаправление с логина
        if (!empty($user)) {
            header('Location:' . sprintf('%s?action=home', SITE_URL));
        }
        $login = empty($_POST['login']) ? null : $_POST['login'];
        $password = empty($_POST['password']) ? null : $_POST['password'];

        if (!empty($_POST['token']) && valid_token($_POST['token'])) {
            $user = user($connection, $login, $password);
            if (!empty($user)) {
                header('Location:' . sprintf('%s?action=home', SITE_URL));
            }
        }

        echo template('templates/login.php', [
            'token' => token(),
            'login' => $login,
            'site_url' => SITE_URL,
            'style' => $style,
            'password'=> $password,
        ]);
        break;
    case 'profile':
        if (empty($user)) {
            header('Location:' . sprintf('%s?action=login', SITE_URL));
        }

        if (isset($_POST['style'])) {
            setcookie('style', $_POST['style'], 0, '/');
            $style = style($_POST['style']);
        }

        echo template('templates/profile.php', [
            'site_url' => SITE_URL,
            'style' => $style,
            'user' => $user,
        ]);
        break;
    case 'save':
        if (empty($user)) {
            header('Location:' . sprintf('%s?action=login', SITE_URL));
        }

        $message_ID = empty($_POST['message_ID']) ? null : (int)$_POST['message_ID'];
        $message_title = empty($_POST['message_title']) ? null : $_POST['message_title'];
        $message = empty($_POST['message']) ? null : $_POST['message'];

        if (!empty($message) && valid_token($_POST['token'])) {
            isset($message_ID)
                ? update_message($connection, $message, $message_ID, $message_title)
                : insert_message($connection, $message, $user['user_ID'], $message_title);
        }

        header('Location:' . sprintf('%s?action=home&message_ID=%d', SITE_URL, $message_ID));
        break;
    case 'delete':
        if (empty($user)) {
            header('Location:' . sprintf('%s?action=login', SITE_URL));
        }
        $message_ID = empty($_POST['message_ID']) ? null : (int)$_POST['message_ID'];
        $message_title = empty($_POST['message_title']) ? null : $_POST['message_title'];
        $message = empty($_POST['message']) ? null : $_POST['message'];
        delete_messages($connection, $message_ID);
        insert_message($connection, $message, $user['user_ID'], $message_title);
        header('Location:' . sprintf('%s?action=home', SITE_URL, $message_ID));
    break;

    default:
        if (empty($user)) {
            header('Location:' . sprintf('%s?action=login', SITE_URL));
        }
        $message_ID = empty($_GET['message_ID']) ? null : (int)$_GET['message_ID'];
        $page=empty($_GET['page']) ? 1 : (int)$_GET['page'];
            $messages = load_messages($connection, $message_ID, $posts_per_page, $page);
            $login = empty($_POST['login']) ? null : $_POST['login'];

            echo template('templates/home.php', [
                'messages' => $messages,
                'token' => token(),
                'style' => $style,
                'site_url' => SITE_URL,
                'message_ID' => $message_ID,
                'user' => $user,
                'page_count'=> $page_count,
            ]);


}