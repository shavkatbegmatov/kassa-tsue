<li>
    <a href="?id=<?php echo $id; ?>"><?php echo $menu['name']; ?></a>
    <?php if (isset($menu['childs'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($menu['childs']); ?>
        </ul>
    <?php endif; ?>
</li>