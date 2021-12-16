<?php

use framework\core\App;

$user = new \app\models\User();

?>

<?php if ($user::isAdmin()): ?>
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="list-group">
            <a href="admin/" class="list-group-item list-group-item-action">Dashboard</a>
        </div>
    </div>
<?php endif; ?>

<div class="panel panel-default">
    <div class="panel-heading"><?php __('acc'); ?></div>
    <div class="list-group">
        <?php if (!isset($_SESSION['user'])): ?>
            <a href="user/reg" class="list-group-item list-group-item-action"><?php __('reg'); ?></a>
            <a href="user/log" class="list-group-item list-group-item-action"><?php __('log'); ?></a>
        <?php else: ?>
            <a href="user/" class="list-group-item list-group-item-action"><?php __('cabinet'); ?></a>
            <a href="user/logout" class="list-group-item list-group-item-action"><?php __('logout'); ?></a>
        <?php endif; ?>
    </div>
</div>





<?php new \framework\widgets\language\Language(); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php __('catalog'); ?></div>
    <div class="list-group">
        <?php
            $catalog = \R::findAll('catalog');
        ?>
        <?php foreach ($catalog as $catalogItem): ?>
            <a href="product/<?php echo $catalogItem['id']; ?>" class="list-group-item list-group-item-action"><?php echo $catalogItem['name']; ?></a>
        <?php endforeach; ?>
    </div>
</div>

<?php
    $lang = App::$app->getProperty('lang')['code'];
    $recentBlog = \R::findAll('blog', 'lang = ?', [$lang]);
    $recentArray = array_reverse($recentBlog);
    $recent = array_slice($recentArray,0,4);
?>

<?php if (!empty($recentBlog)): ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?php __('recent-posts'); ?></div>
        <div class="list-group">
            <?php foreach ($recent as $recentItem): ?>
                <a href="#" class="list-group-item list-group-item-action"><?php echo $recentItem['title']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>