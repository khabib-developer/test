<?php include ROOT.'/views/layout/adminHeader.php';?>
<section>
    <div class="container pt-4">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="active">Редактировать товар</li>
            </ol>
        </div>
            <h4>Добавить новый товар</h4>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-md-4">
                <div class="login-form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="pt-2 pb-2">ID</div>
                        <input type="number" name="id" placeholder=" id.." value="">
                        <div class="pt-2 pb-2">Название товара</div>
                        <input type="text" name="name" placeholder="" value="">
                        <div class="pt-2 pb-2">Артикул</div>
                        <input type="text" name="code" placeholder="" value="">
                        <div class="pt-2 pb-2">Стоимость, сум</div>
                        <input type="text" name="price" placeholder="" value="">
                        <div class="pt-2 pb-2">Категория</div>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div class="pt-2 pb-2">Тип</div>
                        <select name="type_id">
                            <?php if (is_array($types)): ?>
                                <?php foreach ($types as $type): ?>
                                    <option value="<?php echo $type['type_id']; ?>">
                                        <?php echo $type['category_id'].'.'.$type['type_id'].' '.$type['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div class="pt-2 pb-2">Изображение товара</div>
                        <input type="file" name="image" placeholder="" value="">
                        <div class="pt-2 pb-2">Детальное описание</div>
                        <textarea name="description"></textarea>
                        <div class="pt-2 pb-2">Акция</div>
                        <select name="is_discount">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <div class="pt-2 pb-2">Акция</div>
                        <input type="text" name="action" placeholder="" value="">
                        <div class="pt-2 pb-2">Рекомендуемые</div>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <div class="pt-2 pb-2">Статус</div>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>
                        <div class="pt-3 pb-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
    </div>
</section>
<?php include ROOT.'/views/layout/adminFooter.php'; ?>  