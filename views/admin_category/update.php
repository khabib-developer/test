<?php include ROOT.'/views/layout/adminHeader.php';?>

<section>
    <div class="container pt-3">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>
            <h4 style="font-weight: 400;">Редактировать категорию "<?php echo $category[$id-1]['name']; ?>"</h4>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">
                        <div class="pt-2 pb-2">Название</div>
                        <input type="text" name="name" placeholder="" value="<?php echo $category[$id-1]['name']; ?>">
                        <div class="pt-2 pb-2">Порядковый номер</div>
                        <input type="text" name="sort_order" placeholder="" value="<?php echo $category[$id-1]['sort_order']; ?>">   
                        <div class="pt-2 pb-2">Статус</div>
                        <select name="status">
                            <option value="1" <?php if ($category[$id-1]['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($category[$id-1]['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
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