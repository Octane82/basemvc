<h1 style="color: darkblue">Вывод товаров</h1>

<?php foreach($data as $item):?>

    <?php echo $item['name'].'<br />'; ?>
    <?php echo $item['description'].'______'; ?>
    <?php echo '<b>'.$item['price'].'</b><hr />'; ?>

<?php endforeach; ?>



<?php //var_dump($data); ?>