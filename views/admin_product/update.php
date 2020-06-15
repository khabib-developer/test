<?php include ROOT.'/views/layout/adminHeader.php';?>

<section>
    <div class="container pt-4">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>
            <h4>Редактировать товар #<?php echo $id; ?></h4>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">

                        <div class="pb-2 pt-2">Артикул</div>
                        <input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

                        <div class="pb-2 pt-2">Стоимость, сум</div>
                        <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

                        <div class="pt-2 pb-2">Категория</div>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div class="pt-2 pb-2">тип</div>
                        <select name="type_id">
                            <?php if (is_array($types)): ?>
                                <?php foreach ($types as $type): ?>
                                    <option value="<?php echo $type['type_id']; ?>" 
                                        <?php if ($product['type_id'] == $type['type_id']) echo ' selected="selected"'; ?>>
                                        <?php echo $type['category_id'].'.'.$type['type_id'].' '.$type['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div class="pt-2 pb-2">Изображение товара</div>
                        <img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $product['image']; ?>">
                        <div class="pt-2 pb-2">Детальное описание</div>
                        <textarea name="description"><?php echo $product['description']; ?></textarea>
                        
                        <div class="pt-2 pb-2">Акция</div>
                        <select name="is_discount">
                            <option value="1" <?php if ($product['is_discount'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_discount'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        <div class="pt-2 pb-2">Акция</div>
                        <input type="text" name="action" placeholder="" value="<?php echo $product['action']; ?>">
                        <div class="pt-2">Рекомендуемые</div>
                        <select name="is_recommended">
                            <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        <p class="pt-2">Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                        <div class="pt-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">    
                        </div>  
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT.'/views/layout/adminFooter.php'; ?>  