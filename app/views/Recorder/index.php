<div class="panel panel-default">
    <div class="panel-heading">Регистратор</div>
    <div class="panel-body">
        <form action="recorder/" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Имя</label>
                    <input type="text" name="first_name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Фамилия</label>
                    <input type="text" name="last_name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Имя Отца</label>
                    <input type="text" name="middle_name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Дата Рождения</label>
                    <input type="text" name="birth_date" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Манзил</label>
                    <input type="text" name="address" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">ИНФЛ</label>
                    <input type="number" name="infl" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Паспорт Серия</label>
                    <input type="text" name="passport" class="form-control" id="">
                </div>
            </div>
            <!-- /.card-body -->

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Пациенты</div>
    <?php
        $patients = \R::findAll('patients');
        $patients = array_reverse($patients);
    ?>

    <div class="list-group">
        <?php foreach ($patients as $patient): ?>
            <a class="list-group-item list-group-item-action" href=""><?php echo $patient['first_name']; ?> <?php echo $patient['last_name']; ?> <?php echo $patient['middle_name']; ?></span></a>
        <?php endforeach; ?>
    </div>
</div>