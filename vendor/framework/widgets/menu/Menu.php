<?php

namespace framework\widgets\menu;

use framework\libs\Cache;

class Menu {
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'menu';
    protected $cache = 3600;
    protected $cacheKey = 'menu';

    public function __construct($options) {
        $this->tpl = __DIR__ . '/theme/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options) {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function output() {
        echo "<{$this->container} class='{$this->class}'>";
            echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    protected function run() {
        $cache = new Cache();
        $this->menuHtml = $cache->get('menu');
        if (!$this->menuHtml) {
            $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            $cache->set('menu', $this->menuHtml, $this->cache);
        }
        $this->output();
    }

    protected function getTree() {
        $tree = [];
        $data = $this->data;

        foreach ($data as $id => &$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }

        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '') {
        $str = '';

        foreach ($tree as $id => $menu) {
            $str .= $this->menuToTemplate($menu, $tab, $id);
        }

        return $str;
    }

    protected function menuToTemplate($menu, $tab, $id) {
        ob_start();

        require $this->tpl;

        return ob_get_clean();
    }
}