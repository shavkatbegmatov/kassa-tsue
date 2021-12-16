<?php

namespace app\controllers\admin;

use app\models\Main;
use app\models\User;
use framework\core\base\Controller;

class AppController extends Controller {
    public $layout = 'dashboard';

    public function __construct($route) {
        parent::__construct($route);

        if (!User::isAdmin() && $route['action'] != 'login') {
            redirect(ADMIN . '/user/login');
        }

        new Main();
    }
}