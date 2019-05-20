<?php

/* 
 * Выписка из домовой книги
 */
?>

<div class="container text-justify">
    <div class="row">
        
        <div class="content-block col-sm-12">
            <h2 class="text-center bg-success">Выписка из домовой книги</h2>
            <p>Архивная выписка из домовой книги - документ, которой может находиться в районом паспортном столе, МФЦ или в обслуживающей организации.</p>
            <p>Выписка из домовой книги показывает, кто в данный момент зарегистрирован по запрашиваемому адресу.</p>
            <p>* - Окончательная цена может измениться в зависимости от удаленности объекта от МКАД.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2>Расширенная (архивная) выписка</h2>
            <p>Расширенная (архивная) выписка из паспортного стола требуется для снижения рисков при сделках с жилой недвижимостью. Поскольку архивная выписка содержит данные о раннее зарегистрированных людях, можно проанализировать и выяснить воспользовались ли зарегистрированные правом на приватизацию или отказался от нее.</p>
            <p>Возможной типовой ситуацией при нарушении права на приватизацию являются следующие случаи:</p>
            <ul>                  
                <li>Зарегистрированное раннее лицо по данному адресу выбыло в места лишения свободы</li>
                <li>Зарегистрированное раннее лицо по данному адресу призвано на военную службу РФ</li>
                <li>Зарегистрированное раннее лицо по данному адресу, не выписывалось, отсутствовало или отсутствует по причине командировки</li>
                <li>Зарегистрированное раннее лицо по домашнему адресу являются несовершеннолетним</li>
            </ul>
            <p>В данном случае дети должны быть учтены при приватизации квартиры.</p>
        </div> <!-- end content-block col -->

        <div class="content-block col-sm-12">
            <h2 class="text-center">Сколько стоит выписка из домовой книги?</h2>
            <div id="service-price-block" class="row text-center">
                
            </div>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12 hidden">
            <h2 class="text-center">Сколько стоит выписка из домовой книги?</h2>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th width="30%" class="text-center">Сроки</th>
                    <th width="30%" class="text-center">Москва</th>
                    <th class="text-center">Московская область</th>
                </tr>
                <tr>
                    <td class="text-center">1 день</td>
                    <td class="text-center">4000 руб. (без печати)</td>
                    <td class="text-center">-</td>
                </tr>
                <tr>
                    <td class="text-center">3-5 рабочих дней</td>
                    <td class="text-center">6500 руб. (с печатью)</td>
                    <td class="text-center">от 5999 руб. (без печати) <br> от 7500 руб. (с печатью)</td>
                </tr>
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Для чего нужна выписка из домовой книги?</h2>
            <p>Необходимость в получении выписки из домовой книги объясняется следующими обстоятельствами - перед любой сделкой с квартирой данная выписка обязательна для предъявления покупателю или его представителю для понимания о количестве зарегистрированных, о присутствии несовершеннолетних.</p>
            <p>Расширенная выписка из домой книги называется иначе - Архивная выписка из домовой книги. Структурно расширенная выписка из домовой книги совпадает с обычной выпиской.</p>
            <p>Принципиальное отличие - Расширенная выписка из домовой книги содержит в себе сведения о зарегистрированных и выбывших ранее людях, адресах выбытия.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Дополнительные сведения, содержащиеся в выписке:</h2>
            <ul>                  
                <li>ФИО зарегистрированного</li>
                <li>Дата регистрации</li>
                <li>Откуда прибыл</li>
                <li>Адрес текущей регистрации</li>
                <li>Гражданство</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">С этой услугой также заказывают:</h2>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th width="5%" class="text-center">№</th>
                    <th width="65%" class="text-center">Название услуги</th>
                    <th class="text-center">Цена</th>
                </tr>
                <?php if($serviceAlsoOrder): ?>
                    <?php $serviceAlsoOrderCount = 0; ?>
                    <?php foreach( $serviceAlsoOrder as $also ): ?>
                        <tr>
                            <td class="text-center"><?= ++$serviceAlsoOrderCount ?></td>
                            <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id='.$also->service_also_id) ?>"><?= $also->getServiceName($also->service_also_id) ?></a></td>
                            <td class="text-center">от <?= $also->getMinPrice($also->service_also_id) ?> руб.</td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!--<tr>
                    <td class="text-center">1</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=1') ?>">Выписка из ЕГРН</a></td>
                    <td class="text-center">от 4000 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=10') ?>">Справка из ЦАБ</a></td>
                    <td class="text-center">1500 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=5') ?>">История перехода права</a></td>
                    <td class="text-center">1500 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=6') ?>">Документы БТИ</a></td>
                    <td class="text-center">от 10000 руб.</td>
                </tr>-->
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Срочное получение выписки из домовой книги</h2>
            <h2 class="text-center">ПОЧЕМУ ВЫПИСКУ ИЗ ДОМОВОЙ КНИГИ НУЖНО ПОЛУЧИТЬ У НАС?</h2>
            <ul>
                <li>Гарантированный срок</li>
                <li>Точные сведения</li>
                <li>Вы экономите ваше время</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">ВЫПИСКА ИЗ ДОМОВОЙ КНИГИ ПО ТЕЛЕФОНУ В МОСКВЕ</h2>
            <hr>
            <h3 class="text-center"><?= Yii::$app->controller->getCompany('company')->phone1 ?></h3>
        </div> <!-- end content-block col -->
        
    </div> <!-- end row -->
</div> <!-- end container -->