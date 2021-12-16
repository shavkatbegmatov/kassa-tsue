<div class="panel panel-default">
    <div class="panel-heading">Касса</div>
    <?php
        $treatments = \R::findAll('treatment', 'status = ?', ['unpaid']);
    ?>
    <div class="panel-body">
        <form action="kassa/" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="inputCheck">ID Пациента</label>
                            <input type="text" name="patient" class="form-control" id="inputCheck">
                        </div>
                        <div class="ajax"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Проверить состояние</label>
                            <button type="button" id="check" class="btn btn-default">Проверить</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">ID Лечения</label>
                    <input type="text" name="treatment" class="form-control" id="">
                </div>
            </div>
            <!-- /.card-body -->

            <button type="submit" class="btn btn-primary">Уже оплатил</button>
        </form>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Неоплаченное лечение</div>
    <?php
        $treatments = \R::findAll('treatment', 'status = ?', ['unpaid']);
    ?>

    <div class="list-group">
        <?php foreach ($treatments as $treatment): ?>
            <?php
            $user = \R::findOne('patients', 'id = ?', [$treatment['patient_id']]);
            ?>
            <a class="list-group-item list-group-item-action" href=""><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?> <?php echo $user['middle_name']; ?> - Сумма <span class="text-danger"><?php echo $treatment['sum']; ?></span></a>
        <?php endforeach; ?>
    </div>
</div>

<script>
    let checkInput = document.getElementById('checkInput');
    $(function() {
        $('#check').click(function() {
            alert(checkInput + 'asdasd');
            $.ajax({
                url: '/kassa/check',
                type: 'post',
                data: {'id': checkInput.value},
                success: function(res) {
                    alert(res);
                },
                error: function() {
                    alert('Error!');
                }
            });
        })
    });
</script>