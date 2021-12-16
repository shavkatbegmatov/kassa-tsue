<?php if (!empty($blog)): ?>
    <?php foreach ($blog as $one): ?>
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo $one['title']; ?></div>
            <div class="panel-body">
                <?php echo $one['content']; ?>
            </div>
            <div class="panel-footer">
                <a href="blog/<?php echo $one['id']; ?>" class="btn btn-default"><?php __('read'); ?></a>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="text-center">
        <p>Постов: <?php echo count($blog); ?> из <?php echo $total; ?></p>
        <?php if ($pag->countPages > 1): ?>
            <?php echo $pag; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>