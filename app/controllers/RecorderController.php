<?php

namespace app\controllers;

class RecorderController extends AppController {

    public function indexAction() {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == 'recorder') {
                if (!empty($_POST)) {
                    $patient = \R::dispense('patients');
                    $patient['first_name'] = $_POST['first_name'];
                    $patient['last_name'] = $_POST['last_name'];
                    $patient['middle_name'] = $_POST['middle_name'];
                    $patient['birth_date'] = $_POST['birth_date'];
                    $patient['address'] = $_POST['address'];
                    $patient['infl'] = $_POST['infl'];
                    $patient['passport'] = $_POST['passport'];
                    \R::store($patient);
                }
            } else {
                redirect('/kassa/');
            }
        } else {
            redirect('/kassa/');
        }
    }

}