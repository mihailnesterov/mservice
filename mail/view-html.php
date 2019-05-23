<?php

/** @var $this \yii\web\View */
/** @var $link string */
/** @var $paramExample string */

?>

<h2>Здравствуйте, <?= $client_name ?>!</h2>
<p>Ваш заказ получен и находится в обработке. </p>
<p>В ближайшее время наш менеджер свяжется с Вами для уточнения деталей заказа.</p>

<h3>Ваш заказ № ms-<?= $order_id ?> от <?= $order_date ?></h3>
<table>
    <tr>
        <th>№</th>
        <th>Наименование услуги</th>
        <th>Сумма, руб</th>
    </tr>
    <?php $itemCount = $total = 0; ?>
    <?php foreach ( $orderItems as $key => $item ): ?>
        <?php 
            $itemCount++;
            $total += $item['sum'];
        ?>
        <tr>
            <td><?= $itemCount ?></td>
            <td class="text-left"><?= $item['name'] ?></td>
            <td><?= $item['sum'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
    if(strpos($total, '.')) {
        if(substr($total, -3, 1) != '.') {
            $total = round($total,2).'0';
        }
    }
    if(!strpos($total, '.')) {
        $total = $total.'.00';
    } else
    $total = round($total,2);
?>
<h4>Всего наименований <?= $itemCount ?> на сумму <?= $total ?> руб.</h4>