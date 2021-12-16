<div class="row">
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">Аккаунт</div>
            <div class="panel-body">
                <div style="font-size: 3rem; font-weight: bold"><?php echo $_SESSION['user']['name']; ?></div>
                <div><?php echo $_SESSION['user']['email']; ?></div>
                <br>
                <a href="<?php echo $_SESSION['user']['role']; ?>" class="btn btn-primary">В кабинет</a>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        Salom
    </div>
</div>