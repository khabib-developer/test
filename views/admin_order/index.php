  
<?php include ROOT.'/views/layout/adminHeader.php';?>

<section>
    <div class="container pt-4">      
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Управление заказами</li>
                </ol>
            </div>
            <h4 class="pt-2">Список заказов</h4>
            <table class="table-bordered table-striped table mt-4">
                <tr>
                    <th>ID заказа</th>
                    <th>Имя покупателя</th>
                    <th>Телефон покупателя</th>
                    <th>Дата оформления</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td>
                            <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                <?php echo $order['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php echo Order::getStatusText($order['status']); ?></td>    
                        <td><a href="/order/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil"></i></a></td>
                        <td><a href="/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
    </div>
</section>

<?php include ROOT.'/views/layout/adminFooter.php'; ?>  