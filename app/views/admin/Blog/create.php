<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Опубликования нового поста</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="admin/blog/create" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Название поста</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="content">Контент поста</label>
                <textarea style="resize: none" type="text" name="content" class="form-control" id="content"></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="lang">Язык поста</label>
                    <select name="lang" class="selectpicker">
                        <?php
                        $langs = \R::findAll('lang');
                        ?>
                        <?php foreach ($langs as $lang): ?>
                            <?php if (isset($_COOKIE['lang'])): ?>
                                <?php if ($lang['code'] == $_COOKIE['lang']): ?>
                                    <option value="<?php echo $lang['code'] ?>" selected><?php echo $lang['name'] ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $lang['code'] ?>"><?php echo $lang['name'] ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="lang">Каталог поста</label>
                    <select name="cat" class="selectpicker">
                        <?php
                        $cats = \R::findAll('catalog');
                        ?>
                        <?php foreach ($cats as $cat): ?>
                            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </div>
    </form>
</div>