<?php

namespace app\controllers\admin;

use app\models\User;
use framework\core\base\View;

class UserController extends AppController {

    public function indexAction() {
        $test = 'The Best Lang Is PHP';
        View::setMeta('Dash - Главная страница', 'Desc', 'Keys');
        $this->set(compact('test'));
    }

    public function loginAction() {
        if (!empty($_POST)) {
            $user = new User();
            if (!$user->login(true)) {
                $_SESSION['error'] = 'Ник/пароль введены неверно!';
            }
            if (User::isAdmin()) {
                redirect(ADMIN);
            } else {

            }
        }

        if (User::isAdmin()) {
            redirect(ADMIN);
        }

        $this->layout = 'login';
    }

}