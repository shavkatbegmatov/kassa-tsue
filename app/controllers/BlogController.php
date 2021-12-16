<?php

namespace app\controllers;

use app\models\Main;
use framework\core\App;
use framework\core\base\View;

class BlogController extends AppController {
    public function indexAction() {
        if ($this->isAjax()) {
            $model = new Main;
            // $this->loadView('test', compact('post'));
            $post = \R::findOne('blog', 'id = ?', [$_POST['id']]);
            echo json_encode($post);
            die;
        }
        echo 222;
    }

    public function showAction() {
        $id = $this->route['alias'];
        $blog = \R::findOne('blog', 'id = ?', [$id]);

        if (!$blog) {
            throw new \Exception('Пост не найден');
        }

        $blogId = $blog['id'];

        if (!isset($_COOKIE[$blogId])) {
            $blog['views'] = $blog['views'] + 1;
            \R::store($blog);
            setcookie($blogId, 3600);
        }

        $this->set(compact('blog'));
        View::setMeta($blog['title']);
    }
}