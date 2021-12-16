<?php

namespace app\controllers\admin;

use Valitron\Validator;

class BlogController extends AppController {

    public function indexAction() {

    }

    public function createAction() {
        $rules = [
            'required' => [
                ['title'],
                ['lang'],
                ['cat'],
                ['content'],
            ],
        ];
        if (!empty($_POST)) {
            $v = new Validator($_POST);
            $v->rules($rules);
            if ($v->validate()) {
                $blog = \R::dispense('blog');
                $blog['title'] = $_POST['title'];
                $blog['lang'] = $_POST['lang'];
                $blog['content'] = $_POST['content'];
                $blog['cat'] = $_POST['cat'];
                \R::store($blog);
            } else {
                $_SESSION['error'] = 'Все поля обязательны для заполнения';
            }
        }
    }

}