<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<main role="main">			
    <div id="banner-on-main-container" class="container-fluid">
        <div class="row">
            <div id="banner-on-main" class="col-sm-12">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <header>
                                <h1><?= Html::encode($this->title) ?></h1>
                                <a href="#order" class="scrolling-links btn btn-warning btn-lg">Заказать проверку</a>
                            </header>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end container-fluid -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container-fluid -->

    <div class="container">
         <div class="for-whom row">
            <div class="col-xs-12 col-sm-6 col-md-3">
               <div class="for-whom-block text-center">
                  <div class="for-whom-header">
                     <img src="images/apartment.png" alt="Покупка квартиры" class="img-responsive">
                     <!--<h3><p>Квартира</p> <p>Комната</p> <p>Доля в праве</p></h3>-->
                     <h3>Квартира Комната Доля в праве</h3>
                  </div>
                  <p>Срочная подготовка документов перед покупкой квартиры</p>
               </div>
            </div> <!-- end col -->
            <div class="col-xs-12 col-sm-6 col-md-3">
               <div class="for-whom-block text-center">
                  <div class="for-whom-header">
                     <img src="images/loan.png" alt="Документы для ипотеки" class="img-responsive">
                     <h3>Документы для ипотеки</h3>
                  </div>
                  <p>Срочная подготовка документов для ипотечной сделки</p>
               </div>
            </div> <!-- end col -->
            <div class="col-xs-12 col-sm-6 col-md-3">
               <div class="for-whom-block text-center">
                  <div class="for-whom-header">
                     <img src="images/interior.png" alt="Перепланировка" class="img-responsive">
                     <h3>Перепланировки помещений</h3>
                  </div>
                  <p>Срочная проверка несанкционированных перепланировок помещений</p>
               </div>
            </div> <!-- end col -->
            <div class="col-xs-12 col-sm-6 col-md-3">
               <div class="for-whom-block text-center">
                  <div class="for-whom-header">
                     <img src="images/commercial.png" alt="Коммерческая недвижимость" class="img-responsive">
                     <h3>Коммерческая недвижимость</h3>
                  </div>
                  <p>Срочная проверка документов перед покупкой коммерческой недвижимости</p>
               </div>
            </div> <!-- end col -->
         </div> <!-- end for-whom -->

                

        <div id="order" class="row">
                <!-- Вкладки панелей -->  
                <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="select-services">
                                <div id="order-select-services">
                                <header class="relative">
                                        <h2 class="text-center">Выберите регион (<span id="region-name-step1">Москва</span>)</h2>
                                        <hr>
                                        <div class="order-steps-left">
                                                <p>Шаг 1</p>
                                        </div>
                                </header>
                                <div class="text-center">
                                        <div id="services-checks-regions" class="btn-group" data-toggle="buttons">
                                        <?php foreach ($regions as $key => $region): ?>                                                   
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
                                        <?php endforeach ?>
                                        </div>
                                </div>
                                <hr>
                                <header class="relative">
                                        <h2 class="text-center">Выберите услуги:</h2>
                                        <div class="order-steps-left">
                                                <p>Шаг 2</p>
                                        </div>
                                </header>
                                
                                        <div class="service-block relative row">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <?php foreach ($servicesInRegion as $key => $service): ?>
                                                    <div class="panel panel-default row" region="<?= $service->region_id ?>">
                                                        <div class="col-xs-12 col-sm-8">
                                                                <div class="panel-heading" role="tab" id="heading<?= $service->id ?>">
                                                                <h4 class="panel-title">
                                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $service->id ?>" aria-expanded="true" aria-controls="collapse<?= $service->id ?>">
                                                                        <?= $service->service->name ?>
                                                                    </a>
                                                                </h4>
                                                                </div>
                                                                <div id="collapse<?= $service->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $service->id ?>">
                                                                    <div class="panel-body">
                                                                            <p><?= $service->service->description ?></p>
                                                                            <div class="row">
                                                                                    <h4 class="col-xs-12">Образцы:</h4>
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
                                                                <select class="select-price form-control input-lg" tabindex="<?=  $service->service->sort ?>" service="<?= $service->service->id ?>">
                                                                        <option>выбрать сроки и стоимость</option>
                                                                        <?php foreach ($prices as $key => $price): ?>
                                                                                <?php if ( $price->serv_in_reg_id == $price->servInReg->id && $price->serv_in_reg_id == $service->id ): ?>
                                                                                <option value="<?= $price->price ?>"><?= $price->speed ?> <?= $price->price ?> руб.</option>
                                                                                <?php endif ?>
                                                                        <?php endforeach ?>
                                                                </select>
                                                        </div>	<!-- end col -->
                                                    </div>	<!-- end panel -->                                                                   
                                                <?php endforeach ?> 
                                                </div>	<!-- end panel group -->
                                        <div class="order-steps-right">
                                                <p>Шаг 3</p>
                                        </div>
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
                                                                        <div class="panel-title col-sm-4 text-right">
                                                                                <h4>
                                                                                        <a role="button" data-toggle="collapse" data-parent="#order-step3" href="#collapse-order-table" aria-expanded="true" aria-controls="collapse-order-table">
                                                                                                Подробности заказа
                                                                                        </a> 
                                                                                        <i class="fa fa-shopping-basket"></i>
                                                                                </h4>
                                                                        </div>
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
        </div> <!-- end row -->


        <div id="about-on-main" class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                        <div id="about-on-main-left">
                                <h2>О компании</h2>
                                <div class="img-block-left">
                                        <img src="images/green-line.png" alt="line 1">
                                </div>
                                <p>Компания "МService" - является надежным<br>
                                партнером при проведении сделок <br>
                                с недвижимостью в Москве и<br>
                                Московской области<br>
                                Благодаря постоянному развитию и<br>
                                открытому подходу к решению новых задач,<br>
                                услуги MService становятся более<br>
                                оптимизированными, исходя из потребностей<br>
                                наших клиентов и особенностей российского<br>
                                рынка недвижимости
                                </p>

                                <p>Миссия MService - максимально точная<br>
                                проверка объектов недвижимости и исполнение <br>
                                заказов в короткие сроки
                                </p>
                                <div class="img-block-left">
                                        <img src="images/green-line.png" alt="line 2">
                                </div>
                                <?= Html::a('Узнать подробнее','@web/complexes') ?>
                        </div>
                </div> <!-- end col -->
                <div class="col-xs-12 col-sm-12 col-md-6">
                        
                        <div id="about-on-main-right">
                                <div class="about-services row">
                                        <div class="col-xs-12 col-sm-3 text-center">
                                                <div class="img-block">
                                                <?= Html::a(
                                                        Html::img(
                                                                '@web/images/ur_zakluchenie.png',
                                                                [
                                                                        'alt' => 'Юридическое заключение'
                                                                ]
                                                        ),
                                                        '@web/services?id=13'
                                                )?>
                                                </div>
                                        </div>
                                        <div class="text-block col-xs-12 col-sm-9">
                                                <?= Html::a('<h3>ЮРИДИЧЕСКОЕ ЗАКЛЮЧЕНИЕ</h3>','@web/services?id=13') ?>
                                                <p>Заключение по объектам недвижимости, составленное аккредитованным сотрудником</p>
                                        </div>
                                </div>
                                <div class="about-services row">
                                        <div class="col-xs-12 col-sm-3 text-center">
                                                <div class="img-block">
                                                        <?= Html::a(
                                                                Html::img(
                                                                        '@web/images/complex.png',
                                                                        [
                                                                                'alt' => 'Комплексная проверка документов'
                                                                        ]
                                                                ),
                                                                '@web/complexes'
                                                        )?>
                                                </div>
                                        </div>
                                        <div class="text-block col-xs-12 col-sm-9">
                                                <?= Html::a('<h3>КОМПЛЕКСНАЯ ПРОВЕРКА ДОКУМЕНТОВ</h3>','@web/complexes') ?>
                                                <p>Комплект необходимых справок и документов для проведения сделок с недвижимостью</p>
                                        </div>
                                </div>
                                <div class="about-services row">
                                        <div class="col-xs-12 col-sm-3 text-center">
                                                <div class="img-block">
                                                        <img src="images/check.png" alt="Проверка подлинности документов">
                                                </div>
                                        </div>
                                        <div class="text-block col-xs-12 col-sm-9">
                                                <h3>ПРОВЕРКА ПОДЛИННОСТИ ДОКУМЕНТОВ</h3>
                                                <p>Проверка официальных документов, нотариально заверенных документов, предоставленных справок</p>
                                        </div>
                                </div>
                                <div class="about-services row">
                                        <div class="col-xs-12 col-sm-3 text-center">
                                                <div class="img-block">
                                                        <?= Html::a(
                                                                Html::img(
                                                                        '@web/images/archive.png',
                                                                        [
                                                                                'alt' => 'Подготовка документов'
                                                                        ]
                                                                ),
                                                                '@web/services?id=11'
                                                        )?>
                                                </div>
                                        </div>
                                        <div class="text-block col-xs-12 col-sm-9">
                                                <?= Html::a('<h3>ПОДГОТОВКА АРХИВНЫХ ДОКУМЕНТОВ</h3>','@web/services?id=11') ?>
                                                <p>Срочная подготовка документов из Архива Росреестра</p>
                                        </div>
                                </div>
                                <div class="about-services row">
                                        <div class="col-xs-12 col-sm-3 text-center">
                                                <div class="img-block">
                                                        <img src="images/registration.png" alt="Регистрация договоров">
                                                </div>
                                        </div>
                                        <div class="text-block col-xs-12 col-sm-9">
                                                <h3>РЕГИСТРАЦИЯ ДОГОВОРОВ В РОСРЕЕСТРЕ</h3>
                                                <p>Регистрация договоров без задержек и очередей</p>
                                        </div>
                                </div>
                                <div class="about-services row">
                                        <div class="col-xs-12 col-sm-3 text-center">
                                                <div class="img-block">
                                                        <img src="images/capacity.png" alt="Проверка дееспособности лиц">
                                                </div>
                                        </div>
                                        <div class="text-block col-xs-12 col-sm-9">
                                                <h3>ПРОВЕРКА ДЕЕСПОСОБНОСТИ ЛИЦ</h3>
                                                <p>Проверка физических лиц на возможность осуществления сделок с недвижимостью</p>
                                        </div>
                                </div>
                        </div>
                </div> <!-- end col -->
        </div> <!-- end about-on-main -->

      <div class="advance row">
         <div class="col-xs-12 col-sm-4">
            <div class="advance-block">
               <div class="advance-header">
                  <img src="images/advance1.png" alt="Экспертность" class="img-responsive">
                  <h2>Экспертность</h2>
               </div>
               <p>Мы являемся экспертами в области срочных юридических проверок недвижимости</p>
            </div>
         </div> <!-- end col -->
         <div class="col-xs-12 col-sm-4">
            <div class="advance-block">
               <div class="advance-header">
                  <img src="images/advance2.png" alt="Опыт" class="img-responsive">
                  <h2>Опыт</h2>
               </div>
               <p>Более 10 лет мы реализуем срочную подготовку документов в сегменте недвижимости</p>
            </div>
         </div> <!-- end col -->
         <div class="col-xs-12 col-sm-4">
            <div class="advance-block">
               <div class="advance-header">
                  <img src="images/advance3.png" alt="Надежность" class="img-responsive">
                  <h2>Надежность</h2>
               </div>
               <p>Мы всегда находим компромисс при сложных проверках</p>
            </div>	
         </div> <!-- end col -->
      </div> <!-- end advance -->

      <div id="banners-on-main" class="row">
         <div class="col-sm-7">
            <a href="#"><img src="images/bg.png" alt="Баннер 1" width="100%" height="200"></a>
         </div> <!-- end col -->
         <div class="col-sm-5">
            <a href="#"><img src="images/bg.png" alt="Баннер 2" width="100%" height="200"></a>
         </div> <!-- end col -->
      </div> <!-- end banners-on-main -->
   </div> <!-- end container -->

   <div id="testimonials-on-main" class="container-fluid hidden">
            <div class="row">
                    <div class="col-sm-12 text-center">
                            Отзывы
                    </div> <!-- end col -->
            </div> <!-- end row -->
    </div> <!-- end container-fluid -->

    <div id="our-clients-on-main" class="container">
            <div class="row">
                    <div class="col-sm-12 text-center">
                        <header>
                                <h2>Наши клиенты<h2>
                                <hr>
                        </header>
                        <ul>
                                <li><img src="images/our-clients1.png" alt="Инком-недвижимость" class="img-responsive"></li>
                                <li><img src="images/our-clients2.png" alt="Миэль" class="img-responsive"></li>
                                <li><img src="images/our-clients3.png" alt="hirsh" class="img-responsive"></li>
                                <li><img src="images/our-clients4.png" alt="Триумфальная арка" class="img-responsive"></li>
                                <li><img src="images/our-clients5.png" alt="Этажи" class="img-responsive"></li>
                        </ul>
                    </div> <!-- end col -->
            </div> <!-- end row -->
    </div> <!-- end container -->

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
</main> <!-- end main -->