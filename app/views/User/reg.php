<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Med</b></a>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> <?php __('error'); ?></h5>
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <form action="user/reg" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="login" class="form-control" placeholder="<?php __('login'); ?>" value="<?php echo isset($_SESSION['fdata']['login']) ? h($_SESSION['fdata']['login']) : '' ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="<?php __('password'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="<?php __('name'); ?>" value="<?php echo isset($_SESSION['fdata']['name']) ? h($_SESSION['fdata']['name']) : '' ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="far fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="<?php __('mail'); ?>" value="<?php echo isset($_SESSION['fdata']['email']) ? h($_SESSION['fdata']['email']) : '' ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block"><?php __('reg'); ?></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <?php if (isset($_SESSION['fdata'])) unset($_SESSION['fdata']); ?>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->