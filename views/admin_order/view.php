<?php include ROOT.'/views/layout/adminHeader.php';?>
<section>
    <div class="container pt-4">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Просмотр заказа</li>
                </ol>
            </div>
            <h4>Просмотр заказа #<?php echo $order['id']; ?></h4>
            <br/>
            <h5>Информация о заказе</h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Номер заказа</td>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td><?php echo $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <td>Место</td>
                    <td>
                        Улица <?php echo $order['street'];?>, 
                        <?php if ($order['position'] == 1) {
                            echo 'Дом '.$order['home_number'].', кв '.$order['flat_number'];
                        }else {
                            echo 'Жилище '.$order['homestead'];
                        }
                        ?>   
                    </td>
                </tr>
                <?php if ($order['user_id'] != 0): ?>
                    <tr>
                        <td>ID клиента</td>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Статус заказа</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>
            <h5>Товары в заказе</h5>
            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td><?php echo $productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/order" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>
</section>
<?php include ROOT.'/views/layout/adminFooter.php'; ?> 