<?php

namespace app\controllers;

class ManagerController extends AppController {

    public function indexAction() {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == 'manager') {

            } else {
                redirect('/kassa/');
            }
        } else {
            redirect('/kassa/');
        }
    }

}