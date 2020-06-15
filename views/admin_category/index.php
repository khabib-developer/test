  
<?php include ROOT.'/views/layout/adminHeader.php';?>

<section>
    <div class="container pt-3">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="active">Управление категориями</li>
            </ol>
        </div>
        <a href="/category/create" class="btn btn-default back pb-2 pl-0"><i class="fas fa-plus"></i> Добавить категорию</a>
        <h4 class="pb-3">Список категорий</h4>
        <table class="table-bordered table-striped table">
             <tr>
                <th>ID категории</th>
                <th>Название категории</th>
                <th>Порядковый номер</th>
                <th>Статус</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($categoriesList as $category): ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['sort_order']; ?></td>
                    <td></td>  
                    <td><a href="/category/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>

<?php include ROOT.'/views/layout/adminFooter.php'; ?>  