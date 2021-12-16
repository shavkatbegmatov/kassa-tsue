<?php

namespace app\controllers;

use app\models\Main;
use framework\core\App;
use framework\core\base\View;
use framework\libs\Pagination;

class ProductController extends AppController {
    public function showAction() {

        $model = new Main();

        $lang = App::$app->getProperty('lang')['code'];

        if (isset($this->route['alias'])) {
            $cat = $this->route['alias'];
        } else {
            $cat = null;
        }

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perpage = 10;

        if ($cat != null) {
            $total = \R::count('blog', "lang = ? AND cat = ?", [$lang, $cat]);
        } else {
            $total = \R::count('blog', "lang = ?", [$lang]);
        }

        $pag = new Pagination($page, $perpage, $total);
        $start = $pag->getStart();



        if ($cat != null) {
            $blog = \R::findAll('blog', "lang = ? AND cat = ? LIMIT $start, $perpage", [$lang, $cat]);
        } else {
            $blog = \R::findAll('blog', "lang = ? LIMIT $start, $perpage", [$lang]);
        }

        View::setMeta('Товары');
        $this->set(compact('blog',  'pag', 'total'));
    }
}