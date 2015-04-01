<body>
    <div id="wrapper">
        <?php echo $navigation; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Последние 20 накладных СМГС</h3>
                </div>
                <div class="col-lg-12">
                    <?php if(!empty($smgs_list)) { ?>
                    <table class="table table-smgs table-hover">
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th style="width: 200px;">Дата создания</th>
                                <th style="width: 260px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($smgs_list as $k=>$v) { ?>
                            <tr>
                                <td><?php echo $v->name; ?></td>
                                <td><?php echo mdate('%d-%m-%Y %H:%i:%s',$v->created); ?></td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm">Скачать</button>
                                    <a href="/add/<?php echo $v->id; ?>" class="btn btn-info btn-sm">Клонировать</a>
                                    <button type="button" data-id="<?php echo $v->id; ?>" class="btn btn-danger btn-sm deleteWB">Удалить</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } else { ?>
                    <div class='nofound'>Список пуст</div>
                    <?php } ?>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>