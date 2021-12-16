<?php
    $cat = \R::findOne('catalog', 'id = ?', [$this->route['alias']]);
?>

<h1><?php __('catalog'); ?>, <?php echo $cat['name'] ?></h1>

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

//<script>
 //   $(function() {
//        $('#send').click(function() {
 //           $.ajax({
 //               url: '/blog',
 //               type: 'post',
  //              data: {'id': 2},
 ///               success: function(res) {
  //                  let data = JSON.parse(res);
    //                $('.ajax').html(data['title']);
    //            },
    //            error: function() {
 //                  alert('Error!');
 //               }
    //        });
 //       })
 //   });
//</script>