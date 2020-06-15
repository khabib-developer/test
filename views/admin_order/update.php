  
<?php include ROOT.'/views/layout/adminHeader.php';?>

<section>
    <div class="container pt-4">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Редактировать заказ</li>
                </ol>
            <h4>Редактировать заказ  "<?php echo $id; ?>"</h4>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <div class="pt-2 pb-2">Имя клиента</div>
                        <input type="text" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>">

                        <div class="pt-2 pb-2">Телефон клиента</div>
                        <input type="text" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>">

                        <div class="pt-2 pb-2">Дата оформления заказа</div>
                        <input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

                        <div class="pt-2 pb-2">Статус</div>
                        <select name="status">
                            <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                            <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                            <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                            <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                        </select>
                        <div class="pt-2 pb-2">
                           <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layout/adminFooter.php'; ?>