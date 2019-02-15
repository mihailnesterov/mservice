<?php

/*
 * add order item form
 */

use yii\helpers\Html;

?>

<main role="main">
				
        <div class="container">
                <div class="row">					
                        <header id="page-header">
                                <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
                                <hr>
                        </header>
                        <div class="content-block col-xs-12">
                                <p>добавление пункта заказа в заказ...</p>
                                
                                <?php $form = ActiveForm::begin([
                                                        'id'  =>  'add-order-item-form',
                                ]); ?>
                                        <div class="col-md-6">
                                        
                                                <div class="form-group">
                                                        <?= $form->field($orderItem, 'order_id')
                                                                ->textInput(['type' => 'text', 'class' => 'form-control input-lg', 'placeholder' => 'id заказа', 'id' => 'service-id', 'required' => 'required'])
                                                                ->label('') ?>
                                                </div> <!-- end form-group -->

                                                <div class="form-group">
                                                        <?= $form->field($orderItem, 'name')
                                                                ->textInput(['type' => 'text', 'class' => 'form-control input-lg', 'placeholder' => 'Услуга', 'id' => 'service-name', 'required' => 'required'])
                                                                ->label('') ?>
                                                </div> <!-- end form-group -->
                                                <div class="form-group">
                                                        <?= $form->field($orderItem, 'price')
                                                                ->textInput(['type' => 'text', 'class' => 'form-control input-lg', 'placeholder' => 'Цена', 'id' => 'service-price', 'required' => 'required'])
                                                                ->label('') ?>
                                                </div> <!-- end form-group -->
                                                
                                        </div> <!-- end col -->
                                        
                                        <div class="col-sm-12 text-center">
                                                <?= Html::submitButton('Добавить услугу', ['class' => 'btn btn-danger btn-lg']) ?>
                                        </div> <!-- end col -->
                                <?php ActiveForm::end(); ?>

                        </div> <!-- end col -->
                </div> <!-- end row -->
        </div> <!-- end container -->

</main> <!-- end main -->