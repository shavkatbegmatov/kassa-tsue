<?php

namespace app\controllers;

use app\models\User;
use framework\core\base\View;

class UserController extends AppController {
    public $layout = 'login';

    public function indexAction() {
        $this->layout = 'def';

        if (!isset($_SESSION['user'])) {
            redirect('/kassa/user/log');
        }

        View::setMeta('Профиль');
    }

    public function regAction() {
        if (!empty($_POST)) {
            $user = new User;
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['fdata'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);

            if ($user->save('user')) {
                $_SESSION['success'] = 'Успешно зарегистрирован';
                redirect('/kassa/user/log');
            } else {
                $_SESSION['error'] = 'Ошибка! попробуйте позже';
            }
        }

        View::setMeta('Регистрация');
    }

    public function logAction() {
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login()) {
                $_SESSION['success'] = 'Успешно авторизован';
            } else {
                $_SESSION['error'] = 'Ник/пароль введены неверно!';
                redirect();
            }
            redirect('/kassa/');
        }

        View::setMeta('Авторизация');
    }

    public function logoutAction() {
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/kassa/user/log');
    }
}
