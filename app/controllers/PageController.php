<?php

namespace app\controllers;

class PageController extends AppController {

    public function showAction() {
        debug($this->route);
        echo 'Page:Code';
    }

}