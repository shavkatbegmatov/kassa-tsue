<?php

namespace app\controllers;

use app\models\Main;
use framework\core\App;
use framework\core\base\View;
use framework\libs\Pagination;

class MainController extends AppController {
    public function indexAction() {

        $model = new Main;

        // \R::fancyDebug(true);

        // $blog = App::$app->cache->get('blog');

        // if (!$blog) {

        $lang = App::$app->getProperty('lang')['code'];

        $total = \R::count('blog', 'lang = ?', [$lang]);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perpage = 10;

        $pag = new Pagination($page, $perpage, $total);
        $start = $pag->getStart();

        $blog = \R::findAll('blog', "lang = ? LIMIT $start, $perpage", [$lang]);

        // App::$app->cache->set('blog', $blog, 20);
            
        // }

        $menu = $this->menu;
        // $this->setMeta('Главная страница', 'Описания', 'Keywords');
        // $meta = $this->meta;
        View::setMeta('Главная страница', 'Описания', 'Keywords');
        $this->set(compact('blog', 'menu', 'pag', 'total'));
    }
}