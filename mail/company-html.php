<?php

/** @var $this \yii\web\View */
/** @var $link string */
/** @var $paramExample string */

?>

<h2>Получен заказ № ms-<?= $order_id ?> от <?= $order_date ?></h2>
<p><?= $client_name ?></p>
<p><?= $client_phone ?></p>
<p><?= $client_email ?></p>
<h3>Детали заказа № ms-<?= $order_id ?> от <?= $order_date ?></h3>
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
