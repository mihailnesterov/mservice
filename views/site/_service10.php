<?php

/* 
 * Справка из ЦАБ
 */
?>

<div class="container text-justify">
    <div class="row">
        
        <div class="content-block col-sm-12">
            <h2 class="text-center bg-success">Справка из ЦАБ</h2>
            <p>ЦАБ (ЦАСБ) — центральное адресно-справочное бюро</p>
            <p>Справка ЦАБ (ЦАСБ) по объекту - технический документ, содержащий в себе информацию о зарегистрированных лицах по запрашиваемому адресу объекта недвижимого имущества (квартире, дому).</p>
            <p>Справка ЦАБ (ЦАСБ) по субъекту - технический документ, содержащий в себе информацию по адресу регистрации запрашиваемого лица.</p>
        </div> <!-- end content-block col -->

        <div class="content-block col-sm-12">
            <h2 class="text-center">Стоимость выписки из ЦАБ</h2>
            <div id="service-price-block" class="row text-center">
                
            </div>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12 hidden">
            <h2 class="text-center">Стоимость выписки из ЦАБ</h2>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th width="30%" class="text-center">Выписка из ЦАБ</th>
                    <th width="30%" class="text-center">Москва</th>
                    <th class="text-center">Московская область</th>
                </tr>
                <tr>
                    <td class="text-center">1 день</td>
                    <td class="text-center">2000 (объект) <br> 2000 (субъект)</td>
                    <td class="text-center">2000 (объект) <br> 2000 (субъект)</td>
                </tr>
                <tr>
                    <td class="text-center">2 дня</td>
                    <td class="text-center">1500 (объект) <br> 1500 (субъект)</td>
                    <td class="text-center">1500 (объект) <br> 1500 (субъект)</td>
                </tr>
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Структура документа:</h2>
            <ul>                  
                <li>ФИО</li>
                <li>Дата рождения зарегестрированного</li>
                <li>Адрес прибытия и дата прибытия</li>
                <li>Цель/срок приезда</li>
                <li>Гражданство</li>
                <li>Паспортные данные</li>
                <li>Отношение к воинской службе</li>
                <li>Дата регистрации</li>
                <li>Вид регистрации (временная или постоянная)</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Техническая справка из центрального адресного бюро Москвы и Московской области</h2>
            <h3>Порядок получения:</h3>
            <p>Справка выдается на основании запроса уполномоченного органа.</p>
            <h3>Пример:</h3>
            <p>Суд, в рамках поиска ответчика по иску делает запрос в ЦАБ с целью определения адреса для направления ему почтовой корреспонденции.</p>
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
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=5') ?>">История перехода права</a></td>
                    <td class="text-center">от 1500 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=7') ?>">Выписка из домовой книги</a></td>
                    <td class="text-center">от 7500 руб.</td>
                </tr>-->
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Срочная справка из ЦАБ</h2>
            <h2 class="text-center">ПОЧЕМУ СПРАВКУ ИЗ ЦАБ НУЖНО ПОЛУЧИТЬ У НАС?</h2>
            <ul>
                <li>Гарантированный срок</li>
                <li>Точные сведения из ЦАБ</li>
                <li>Вы экономите ваше время</li>
                <li>Вы получаете справку из ЦАБ на электронную почту</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">СПРАВКА ИЗ ЦАБ ПО ТЕЛЕФОНУ В МОСКВЕ</h2>
            <hr>
            <h3 class="text-center"><?= Yii::$app->controller->getCompany('company')->phone1 ?></h3>
            <p class="text-center">справка из ЦАБ по Москве</p>
            <p class="text-center">справка из ЦАБ по Московской области</p>
        </div> <!-- end content-block col -->
        
    </div> <!-- end row -->
</div> <!-- end container -->