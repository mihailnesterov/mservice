<?php

/*
 * service page
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

use app\models\ServiceAlsoOrder;
?>

<main role="main">

    <div id="breadcrumbs-container" class="container-fluid hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                        echo Breadcrumbs::widget([
                            'homeLink' => ['label' => 'Услуги', 'url' => '@web'],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);
                    ?>
                </div>

            </div>	 <!-- end row -->
        </div> <!-- end container -->
    </div> <!-- end container-fluid -->

    <div class="container">
        
        <header id="page-header">
                <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
                <hr class="hidden-xs">
        </header>
        
        <div class="row">
                <div id="order" class="col-sm-12">
                        <!-- Вкладки панелей -->  
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="select-services">
                                    <div id="order-select-services">
                                        <h2 class="text-center">Выберите регион (<span id="region-name-step1">Москва</span>)</h2>
                                        <hr>
                                        <div class="text-center">
                                            <div id="services-checks-regions" class="btn-group" data-toggle="buttons">
                                                <?php foreach ($regions as $key => $region): ?>
                                                    <?php if ( $region->id): ?>
                                                        <?php if ( $region->id == 1 ): ?>
                                                            <label class="btn btn-lg active">
                                                                <input type="radio" name="services-checks-regions" id="region-<?= $region->id ?>" region="<?= $region->id ?>" region-name="<?= $region->name ?>" autocomplete="off" checked>
                                                                <?= $region->name ?>
                                                            </label>
                                                        <?php else : ?>
                                                            <label class="btn btn-lg">
                                                                <input type="radio" name="services-checks-regions" id="region-<?= $region->id ?>" region="<?= $region->id ?>" region-name="<?= $region->name ?>" autocomplete="off">
                                                                <?= $region->name ?>
                                                            </label>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <!--<h2 class="text-center">Выберите услуги (<span id="region-name-step2"></span>)</h2>
                                        <hr>-->
                                            <div class="service-block row">
                                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                                                               
                                                        <?php foreach ($servicesInRegion as $key => $service): ?>
                                                            <?php if ( $service->service->id == $model->id ): ?>
                                                            <div class="panel panel-default row" region="<?= $service->region_id ?>">
                                                                <div class="col-xs-12 col-sm-8">
                                                                    <div class="panel-heading" role="tab" id="heading<?= $service->id ?>">
                                                                        <h4 class="panel-title">
                                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $service->id ?>" aria-expanded="true" aria-controls="collapse<?= $service->id ?>"><?= $service->service->name ?></a>
                                                                        </h4>
                                                                    </div>
                                                                        <div id="collapse<?= $service->id ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?= $service->id ?>">
                                                                            <div class="panel-body">
                                                                                <p><?= $service->service->description ?></p>
                                                                                <div class="row scan-block">
                                                                                        <h4 class="col-xs-12">Образец:</h4>
                                                                                        <?php $imgCounter = 1; ?> 
                                                                                            <?php foreach ($scans as $key => $scan): ?>      
                                                                                                <?php if ( $scan->service->id == $service->service->id): ?>
                                                                                                    <div class="scan col-xs-12 col-sm-6 col-md-4" data-scan-region="<?= $scan->region_id ?>">
                                                                                                        <a href="images/<?= $scan->img_path ?>" data-lightbox="image-<?= $imgCounter ?>" data-title="<?= $scan->description ?>"><img src="images/<?= $scan->img_path ?>" alt="Образец <?= $scan->id ?>" class="img-responsive"></a>
                                                                                                        <p class="text-center"><?= $scan->description ?></p>
                                                                                                    </div>
                                                                                                <?php endif ?>
                                                                                            <?php $imgCounter++; ?>
                                                                                        <?php endforeach ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>	<!-- end col -->  
                                                                    <div class="col-xs-12 col-sm-4">
                                                                            <select class="select-price form-control input-lg" service="<?= $service->service->id ?>">
                                                                                <option>выбрать сроки и стоимость</option>
                                                                                <?php foreach ($prices as $key => $price): ?>
                                                                                    <?php if ( $price->serv_in_reg_id == $price->servInReg->id && $price->serv_in_reg_id == $service->id ): ?>
                                                                                        <?php if ( $price->id === 42 ): ?>
                                                                                            <option 
                                                                                            value="" 
                                                                                            data-speed="цена договорная" 
                                                                                            data-region="<?= $price->servInReg->region_id ?>" 
                                                                                            data-region-name="<?= $region->name ?>"
                                                                                            >
                                                                                                цена договорная
                                                                                            </option>
                                                                                        <?php else: ?>
                                                                                            <option 
                                                                                            value="<?= $price->price ?>" 
                                                                                            data-speed="<?= $price->speed ?>" 
                                                                                            data-region="<?= $price->servInReg->region_id ?>" 
                                                                                            data-region-name="<?= $region->name ?>"
                                                                                            >
                                                                                                <?= $price->speed ?> <?= $price->price ?> руб.
                                                                                            </option>
                                                                                        <?php endif ?>
                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                    </div>	<!-- end col -->
                                                                </div>	<!-- end panel -->
                                                            <?php endif ?>
                                                        <?php endforeach ?> 
                                                    </div>	<!-- end panel group -->
                                            </div>	<!-- end service-block -->
                                    </div>	<!-- order-select-services -->

                            </div>	<!-- end tabpanel -->

                                <div role="tabpanel" class="tab-pane" id="step3">

                                        <div id="order-payment">
                                            <div class="go-back-block">
                                                <a id="go-back-step2" href="#select-services" data-toggle="tab"><i class="fa fa-chevron-left"></i> К выбору услуг</a>
                                            </div>
                                            <h2 class="text-center">Оформить заказ</h2>
                                            <hr>

                                                <div class="panel-group" id="order-step3" role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab" id="heading-order-step3">
                                                                        <div class="row">
                                                                                <div class="hidden-xs col-sm-8">
                                                                                        <h4>Общая стоимость: <span class="step3-sum">0</span> <i class="fa fa-rub"></i> (<span id="region-name-step3"></span>)</h4>
                                                                                </div>
                                                                                <h4 class="panel-title col-sm-4 text-right">
                                                                                        <a role="button" data-toggle="collapse" data-parent="#order-step3" href="#collapse-order-table" aria-expanded="true" aria-controls="collapse-order-table">
                                                                                          Подробности заказа
                                                                                        </a> 
                                                                                        <i class="fa fa-shopping-basket"></i>
                                                                                </h4>
                                                                        </div>	<!-- end row -->
                                                                </div>	<!-- end panel-heading -->
                                                                <div id="collapse-order-table" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-order-step3">
                                                                        <div class="panel-body">
                                                                            <table id="table-order-step3" class="table table-responsive table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="text-center">№</th>
                                                                                        <th class="text-center">Услуга</th>
                                                                                        <th class="text-center">Цена, руб.</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr id="total-tr">
                                                                                        <td></td>
                                                                                        <td>Итого:</td>
                                                                                        <td><span class="step3-sum">0</span> <i class="fa fa-rub"></i></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>	<!-- end panel-body -->
                                                                </div>	<!-- end panel-collapse -->
                                                        </div>	<!-- end panel -->
                                                </div>	<!-- end panel-group -->


                                                <h2 class="text-center">Как с Вами связаться:</h2>
                                                <hr>
                                                <div class="row">
                                                    <!--<form>-->
                                                    <?php $form = ActiveForm::begin([
                                                        'id'  =>  'order-service-form',
                                                    ]); ?>
                                                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></div>
                                                                    <input type="text" class="form-control input-lg" placeholder="Адрес объекта *" name="object-address" id="object-address" required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-user fa-2x" aria-hidden="true"></i></div>
                                                                    <?php if ( $clientName != '' ): ?>
                                                                        <input type="text" class="form-control input-lg" placeholder="Ваше имя *" name="client-name" id="client-name" value=<?= $clientName?> required />
                                                                    <?php else: ?>
                                                                        <input type="text" class="form-control input-lg" placeholder="Ваше имя *" name="client-name" id="client-name" required />
                                                                    <?php endif ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></div>
                                                                    <?php if ( $clientEmail != '' ): ?>
                                                                        <input type="text" class="form-control input-lg" placeholder="Электронный адрес: *" name="client-email" id="client-email" value=<?= $clientEmail?> required />
                                                                    <?php else: ?>
                                                                        <input type="text" class="form-control input-lg" placeholder="Электронный адрес: *" name="client-email" id="client-email" required />
                                                                    <?php endif ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i></div>
                                                                    <?php if ( $clientPhone != '' ): ?>
                                                                        <input type="text" class="form-control input-lg" placeholder="Контактный телефон *" name="client-phone" id="client-phone" value=<?= $clientPhone?> required />
                                                                    <?php else: ?>
                                                                        <input type="text" class="form-control input-lg" placeholder="Контактный телефон *" name="client-phone" id="client-phone" required />
                                                                    <?php endif ?>
                                                                </div>
                                                            </div>
                                                        <!--</div>--> <!-- end col -->
                                                        <!--<div class="col-md-6">-->
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
                                                        </div> <!-- end col -->
                                                        <div class="submit-block col-sm-12 text-center">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" checked> 
                                                                    Согласен на обработку персональных данных в соответствии с <a href="<?= Yii::$app->urlManager->createUrl('policy') ?>" target="_blank">Политикой конфиденциальности</a>
                                                                </label>
                                                            </div>
                                                            <hr>
                                                            <!--<button type="submit" class="btn btn-danger btn-lg">Оформить заказ</button>-->
                                                            <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-danger btn-lg']) ?>
                                                        </div> <!-- end col -->
                                                    <?php ActiveForm::end(); ?>
                                                    <!--</form>-->
                                                </div>	<!-- end row -->
                                        </div>	<!-- end #order-payment -->
                                </div>	<!-- end tabpanel -->
                        </div>	<!-- end tab-content -->
                </div> <!-- end #order col -->

        </div> <!-- end row -->
    </div> <!-- end container -->

    <?php
        // service page content output
        /*$url=$_SERVER['REQUEST_URI'];
        $serviceID = explode('=', $url);*/
        if($model) {
            echo $this->render('_service'.$model->id, [
                'serviceAlsoOrder' => $serviceAlsoOrder,
                'model' => $model,
            ]);
        }        
    ?>
    
    <div id="recommended-order-banner" class="hidden-xs hidden-sm animated bounceInRight text-center">
            <p>Комплексная проверка объекта недвижимости</p>
            <?= Html::a('<i class="fa fa-arrow-circle-right"></i> Заказать', '@web/complexes') ?>
    </div>

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
</main>