<?php include ROOT.'/views/layout/adminHeader.php';?>

<section>
    <div class="container pt-4">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>
            <h4>Добавить новую категорию</h4>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <div class="pt-2 pb-2">Название</div>
                        <input type="text" name="name" placeholder="" value="">

                        <div class="pt-2 pb-2">Порядковый номер</div>
                        <input type="text" name="sort_order" placeholder="" value="">

                        <div class="pt-2 pb-2">Статус</div>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>
                        <div class="pt-4">
                           <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layout/adminFooter.php'; ?>  