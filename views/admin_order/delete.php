<?php include ROOT.'/views/layout/adminHeader.php';?>

<section>
    <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Удалить заказ</li>
                </ol>
            </div>
            <h4>Удалить заказ #<?php echo $id; ?></h4>
            <p>Вы действительно хотите удалить этот заказ?</p>
            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>
        </div>
   
</section>

<?php include ROOT.'/views/layout/adminFooter.php'; ?> 