<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
?>

<main role="main" page-id="complex">

    <div id="breadcrumbs-container" class="container-fluid hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                        echo Breadcrumbs::widget([
                            'homeLink' => ['label' => 'Услуги', 'url' => '@web/#order'],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);
                    ?>
                </div>

            </div>	 <!-- end row -->
        </div> <!-- end container -->
    </div> <!-- end container-fluid -->
				
    <div class="container">
            <div class="row">
                    <div id="order" class="col-sm-12">	
                            <div id="recommended">
                                    <a id="go-recommended-checks" class="hidden" href="#"><i class="fa fa-chevron-left"></i> К выбору рекомендуемых проверок</a>
                                        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
                                    <hr>

                                    <div class="text-center">
                                        <div id="recommended-checks-regions" class="btn-group" data-toggle="buttons">
                                            <?php foreach ($regions as $key => $region): ?>                                                   
                                                    <?php if ( $region->id == 1 ): ?>
                                                        <label class="btn btn-lg active">
                                                            <input type="radio" name="recommended-checks-regions" id="region-<?= $region->id ?>" region="<?= $region->id ?>" regionName="<?= $region->name ?>" autocomplete="off" checked>
                                                            <span><?= $region->name ?></span>
                                                        </label>
                                                    <?php else : ?>
                                                        <label class="btn btn-lg">
                                                            <input type="radio" name="recommended-checks-regions" id="region-<?= $region->id ?>" region="<?= $region->id ?>" regionName="<?= $region->name ?>" autocomplete="off">
                                                            <span><?= $region->name ?></span>
                                                        </label>
                                                    <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    
                                    <?php foreach ($complexID as $key => $complex): ?>
                                        <?php if ($complex->complex->id == $id): ?>
                                            <div class="recommended-block" complex="<?= $id ?>" complexID="<?= $complex->complex_id ?>">
                                                <h3><?= $complex->complex->name ?></h3>
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>№</th>
                                                            <th>Наименование проверки</th>
                                                            <th>Цена, руб.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($servicesInComplex as $key => $service): ?>
                                                            <?php if ($service->complex_id == $complex->complex->id): ?>
                                                            <tr class="region-tr" region="<?= $service->region_id ?>">
                                                                <td class="text-center">
                                                                    <?= $service->counter ?>
                                                                </td>
                                                                <td>
                                                                    <span class="checkbox">
                                                                            <label>
                                                                                    <input type="checkbox" checked>
                                                                            </label>
                                                                    </span>
                                                                    <span class="service-name"><?= $service->service->name ?></span>
                                                                </td>
                                                                <td class="check-sum"><?= $service->price ?></td>
                                                            </tr>
                                                            <?php endif ?>
                                                        <?php endforeach ?>

                                                        <tr>
                                                            <td></td>
                                                            <td>Итого:</td>
                                                            <td class="text-center"><span class="check-sum-total"></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="check-order-btn-block text-left">
                                                    <p><?= $complex->complex->comment ?></p>
                                                    <!--<button class="btn btn-danger btn-lg">Выбрать</button>-->
                                                </div>
                                            </div> <!-- end recommended-block -->
                                        <?php endif ?>
                                    <?php endforeach ?>

                                    <div id="recommended-order-block" class="hidden1">                                                          
                                        <h2 class="text-center">Как с вами связаться:</h2>
                                        <hr>                                        
                                            <div class="row">
                                                <!--<form>-->
                                                <?php $form = ActiveForm::begin([
                                                        'id'  =>  'order-complex-form',
                                                ]); ?>
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-map-marker fa-2x"></i></div>
                                                                <input type="text" class="form-control input-lg" placeholder="Адрес объекта *" name="object-address" id="object-address" required />
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group">
                                                                <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-user fa-2x" aria-hidden="true"></i></div>
                                                                        <input type="text" class="form-control input-lg" placeholder="Ваше имя *" name="your-name" id="your-name" required />
                                                                </div>
                                                        </div>-->
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-user fa-2x"></i></div>
                                                                <?= $form->field($client, 'name')
                                                                    ->textInput(['type' => 'text', 'class' => 'form-control input-lg', 'placeholder' => 'Ваше имя *', 'id' => 'your-name', 'value' => $clientName, 'required' => 'required'])
                                                                    ->label('') ?>
                                                            </div>
                                                        </div> <!-- end form-group -->
                                                        
                                                        <!--<div class="form-group">
                                                                <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></div>
                                                                        <input type="text" class="form-control input-lg" placeholder="Электронный адрес: *" name="your-email" id="your-email" required />
                                                                </div>
                                                        </div>-->
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-envelope fa-2x"></i></div>
                                                                <?= $form->field($client, 'email')
                                                                    ->textInput(['type' => 'email', 'class' => 'form-control input-lg', 'placeholder' => 'Электронный адрес *', 'id' => 'your-email', 'value' => $clientEmail, 'required' => 'required'])
                                                                    ->label('') ?>
                                                            </div>
                                                        </div> <!-- end form-group -->
                                                        <!--<div class="form-group">
                                                                <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></div>
                                                                        <input type="text" class="form-control input-lg" placeholder="Контактный телефон *" name="your-phone" id="your-phone" required />
                                                                </div>
                                                        </div>-->
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-mobile fa-2x"></i></div>
                                                                <?= $form->field($client, 'phone')
                                                                    ->textInput(['type' => 'text', 'class' => 'form-control input-lg', 'placeholder' => 'Контактный телефон *', 'id' => 'your-phone', 'value' => $clientPhone, 'required' => 'required'])
                                                                    ->label('') ?>
                                                            </div>
                                                        </div> <!-- end form-group -->
                                                    </div> <!-- end col -->
                                                    <!--<div class="col-md-6">
                                                        <div class="form-group hidden">
                                                                <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i></div>
                                                                        <input type="text" class="form-control input-lg" placeholder="Адрес регистрации проверяемого" name="reg-address" id="reg-address" />
                                                                </div>
                                                        </div>
                                                        <div class="form-group hidden">
                                                                <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></div>
                                                                        <input type="text" class="form-control input-lg" placeholder="ФИО проверяемого" name="fio" id="fio" />
                                                                </div>
                                                        </div>
                                                        <div class="form-group hidden">
                                                                <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-calendar-o fa-2x" aria-hidden="true"></i></div>
                                                                        <input type="text" class="form-control input-lg" placeholder="Дата рождения проверяемого" name="birthday" id="birthday" />
                                                                </div>
                                                        </div>
                                                        <div class="form-group hidden">
                                                                <div class="input-group">
                                                                        <div class="input-group-addon"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i></div>
                                                                        <input type="text" class="form-control input-lg" placeholder="ИНН проверяемого" name="inn" id="inn" />
                                                                </div>
                                                        </div>
                                                    </div>--> <!-- end col -->
                                                    <div class="submit-block col-sm-12 text-center">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" checked> 
                                                                Согласен на обработку персональных данных в соответствии с <a href="<?= Yii::$app->urlManager->createUrl('policy') ?>" target="_blank">Политикой конфиденциальности</a>
                                                            </label>
                                                        </div>
                                                        <hr>
                                                        <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-danger btn-lg']) ?>
                                                    </div> <!-- end col -->
                                                <!--</form>-->
                                                <?php ActiveForm::end(); ?>
                                            </div>	<!-- end row -->
                                    </div>	<!-- end #recommended-order-block -->
                            </div>	<!-- end #recommended -->

                    </div> <!-- end col -->			

            </div> <!-- end row -->
    </div> <!-- end container -->
    
    <?php
        // subscribe form
        $subscribe = new \app\models\Subscribe();
        if(Yii::$app->request->post('subscribe-field')){
            $subscribe->email = Yii::$app->request->post('subscribe-field');
            $subscribe->save();
        }
        echo $this->render('_subscribe', [
            'subscribe' => $subscribe
        ]);
    ?>

</main> <!-- end main -->