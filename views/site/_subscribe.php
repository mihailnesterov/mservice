<?php

/* 
 * subscribe form
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div id="subscribe-container" class="container-fluid">
    <div class="row">
        <div id="subscribe" class="container">
            <div class="row">
                <div class="col-xs-6 col-md-3 text-left">
                    <h3><i class="fa fa-envelope-o"></i> <span>Подписка</span></h3>
                </div> <!-- end col -->
                <div class="col-xs-6 col-md-4 text-right">
                    <p>Получить скидку <i class="fa fa-angle-double-right"></i></p>
                </div> <!-- end col -->
                <div class="col-xs-12 col-md-5 text-center">
                    <?php $form = ActiveForm::begin([
                            'id'  =>  'subscribe-form',
                    ]); ?>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control input-lg" placeholder="Введите E-mail" name="subscribe-field" id="subscribe-field" required='required' />
                                <div class="input-group-addon">
                                    <?= Html::submitButton('<i class="fa fa-check"></i>', ['id' => 'btn-subscribe-submit']) ?>
                                </div>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                    
                    

                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div> <!-- end row -->
</div> <!-- end container-fluid -->