<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php \framework\core\base\View::getMeta(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
    <base href="http://code.tsue.uz/kassa">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        * {
            outline: none !important;
        }

        body .bootstrap-select .dropdown-toggle:focus {
            outline: none !important;
        }

        .nav-link, .nav-active a {
            display: flex;
            width: 45px;
            height: 45px;
            justify-content: center;
            align-items: center;
            background: #0c84ff;
            color: #fff;
        }

        .selectpicker {
            outline: none;
        }

        .bootstrap-select {
            width: 100% !important;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">   <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/admin/blog/create">Блог</a></li>
                <li><a href="/admin/catalog/create">Каталог</a></li>
            </ul>
        </div>
        <!-- /.nav-collapse -->
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->getPart('parts/dashboard/aside'); ?>
        </div>
        <div class="col-md-9">

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <?php
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['role'] == '3') {
                    echo 'You are Admin';
                }
            }
            ?>

            <?php echo $content; ?>

            <!-- <pre>Hello, RedBeanPHP</pre> -->
        </div>
    </div>
</div>

<?php
//        debug(\framework\core\base\Lang::$langData);
?>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<?php
foreach ($scripts as $script) {
    echo $script;
}
?>
</body>

</html>