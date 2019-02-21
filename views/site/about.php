<?php

/*
 * about page
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$company = Yii::$app->controller->getCompany('company');
$services = Yii::$app->controller->getServices('services');
?>

<main role="main">

        <div id="breadcrumbs-container" class="container-fluid hidden-xs">
                <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                        <?php
                                echo Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ]);
                        ?>
                        </div>

                </div>	 <!-- end row -->
                </div> <!-- end container -->
        </div> <!-- end container-fluid -->
				
        <div class="container">
                <div class="row">					
                        <header id="page-header">
                                <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
                                <hr>
                        </header>
                        
                        <div class="content-block col-xs-12">
                                <p><strong>MService</strong> является надёжным партнёром при проведении сделок с недвижимостью по Москве и Московской области. Благодаря постоянному развитию и открытому подходу к решению новых задач, услуги MService становятся более оптимизированными, исходя из потребностей наших клиентов и особенностей российского рынка недвижимости.</p>
                                <p><i>Миссия MService — максимально точная проверка объектов недвижимости и исполнение заказов в короткие сроки.</i></p>
                        </div> <!-- end col -->

                        <div class="content-block col-xs-12">
                                <h4>Услуги по ускоренной подготовке документов и справок по объектам недвижимости:</h4>
                                <hr>
                                <ul>
                                        <?php foreach ($services as $key => $service): ?>
                                                <?php if ($service->description != ''): ?>
                                                        <li><?= Html::a($service->name, '@web/services?id='.$service->id) ?></li>
                                                <?php endif ?>
                                        <?php endforeach ?>
                                </ul>
                        </div> <!-- end col -->

                        <div class="content-block col-xs-12">
                                <h4>Составление договоров для сделок с недвижимостью:</h4>
                                <hr>
                                <ul>
                                        <li>Подача на государственную регистрацию договоров купли продажи и документов по объектам недвижимости</li>
                                        <li>Оказание содействия по «приостановке» государственной регистрации права на недвижимое имущество</li>
                                </ul>
                        </div> <!-- end col -->

                        <div class="content-block col-xs-12">
                                <h4>Дополнительные услуги:</h4>
                                <hr>
                                <ul>
                                        <li>Помощь в составлении договоров купли-продажи, мены, дарения, договоров покупки недвижимости с привлечением кредитных средств</li>
                                        <li>Помощь в приобретении жилых и нежилых объектов недвижимости, земельных участков в Москве и Московской области</li>
                                        <li>Помощь в постановке на кадастровый учёт любых объектов недвижимости по Москве и Московской области</li>
                                        <li>Внесение изменений в базу ГКН (Государственный кадастр недвижимости)</li>
                                        <li>Помощь в присоединении чердаков и подвала к существующим объектам недвижимости</li>
                                </ul>
                        </div> <!-- end col -->

                        <div class="content-block col-xs-12">
                                <h4>Преимущества работы с MService:</h4>
                                <hr>
                                <ul>
                                        <li>Персональный подход к клиентам</li>
                                        <li>Взаимодействие со службами Росреестра, Кадастровой палатой, БТИ</li>
                                        <li>Осуществление профессиональной деятельности по Москве, Московской области и в ряде регионов России</li>
                                        <li>Высокое качество предоставляемых услуг по юридическим проверкам объектов недвижимости</li>
                                        <li>Подготовка пакета документов с доставкой из рук в руки</li>
                                </ul>
                        </div> <!-- end col -->

                        <div id="contacts-in-about" class="content-block col-xs-12">
                                <h4>Контакты:</h4>
                                <hr>
                                <ul>
                                        <li><i class="fa fa-phone"></i> <?= $company->phone1 ?></li>
                                        <li><i class="fa fa-mobile"></i> <?= $company->phone2 ?></li>
                                        <li class="mailto"><i class="fa fa-envelope-o"></i> <a href="mailto: <?= $company->email ?>"><?= $company->email ?></a></li>
                                        <li class="mailto"><i class="fa fa-envelope-o"></i> <a href="mailto: support@mservice.pro">support@mservice.pro</a> (техническая поддержка)</li>
                                        <li><i class="fa fa-map-marker"></i> <a href="<?= Yii::$app->urlManager->createUrl('contacts#map') ?>"><?= $company->address ?></a></li>
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