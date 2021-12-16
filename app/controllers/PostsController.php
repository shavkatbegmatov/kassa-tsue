<?php

namespace app\controllers;

use app\models\Main;

class PostsController extends AppController {
    public function indexAction() {
        $model = new Main;
        $blog = \R::findAll('blog');
        $menu = $this->menu;
        $this->setMeta('Блог', 'Описания', 'Keywords');
        $meta = $this->meta;
        $this->set(compact('var1', 'blog', 'menu', 'meta'));
    }
}