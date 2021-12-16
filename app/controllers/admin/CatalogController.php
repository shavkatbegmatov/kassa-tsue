<?php

namespace app\controllers\admin;

use Valitron\Validator;

class CatalogController extends AppController {

    public function indexAction() {

    }

    public function createAction() {
        $rules = [
            'required' => [
                ['title'],
            ],
        ];

        if (!empty($_POST)) {
            $v = new Validator($_POST);
            $v->rules($rules);
            if ($v->validate()) {
                $catalog = \R::dispense('catalog');
                $catalog['name'] = $_POST['title'];
                if (\R::store($catalog)) {
                    $_SESSION['success'] = 'Успешно!';
                } else {
                    $_SESSION['error'] = 'Ошибка!';
                }
            } else {
                $_SESSION['error'] = 'Все поля обязательны для заполнения';
            }
        }
    }

}