<div class="panel panel-default">
    <div class="panel-heading"><?php echo $blog['title']; ?></div>
    <div class="panel-body">
        <?php
            $catId = $blog['cat'];
            $cat = \R::findOne('catalog', 'id = ?', [$catId]);
        ?>
        <?php echo $blog['content']; ?>
    </div>
    <div class="panel-footer">
        <?php

            $number = $blog['views'];

            if ($number < 1000) {
                $format = number_format($number);
            } else if ($number < 1000000) {
                $format = number_format($number / 1000, 0) . ' тысяча';
            } else if ($number < 1000000000) {
                $format = number_format($number / 1000000, 0) . ' миллион';
            } else {
                $format = number_format($number / 1000000000, 0) . ' миллиард';
            }

        ?>
        <?php if ($format > 1): ?>
            <?php echo $format; ?> просмотров
        <?php else: ?>
            <?php echo $format; ?> просмотр
        <?php endif; ?>
    </div>
</div>
