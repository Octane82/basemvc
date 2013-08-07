<h1>Request test GET or POST</h1>

<?php echo HTML::beginForm(); ?>
    <span>Отправить запрос методом GET</span><br />
    <?php echo HTML::textField('testpost'); ?>
    <br />
    <?php echo HTML::submitButton('Отправить'); ?>


<?php echo HTML::endForm(); ?>


<?php echo $msg.' = '.$datapost; ?>