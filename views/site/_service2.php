<?php

/* 
 * Выписка из ЕГРН без печати (онлайн)
 */
?>

<div class="container text-justify">
    <div class="row">
        <div class="content-block col-sm-12">
            <p>Веб-ресурс MSERVICE предлагает Вам максимально быстро оформить выписку из ЕГРН в режиме реального времени. Выписка из ЕГРН с сайта идентична бумажному документу, который выдаёт Росреестр. Выписка онлайн ЕГРН бесплатно будет доставлена вам на электронную почту.</p>          
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <p>Единый государственный реестр недвижимости - официальный государственный информационно-справочный ресурс, содержащий в себе сведения о правообладателях, сведения об арестах, ограничениях и обременениях недвижимого имущества жилого и нежилого фонда на территории Российской Федерации. Выписка из ЕГРН - основной документ, являющийся подтверждением или отсутствием зарегистрированного права в Едином государственном реестре недвижимости.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <p>Выписка из ЕГРН содержит сведения по объекту недвижимости на всей территории РФ. А именно данные о залоге, ипотеке по объекту, о правообладателе и его доле, об обременениях (ограничениях).</p>
            <p>Так же в нем имеется информация о правопритязании на объект недвижимости.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Стоимость выписки из ЕГРН без печати</h2>
            <div id="service-price-block" class="row text-center">
                
            </div>
            <table class="table table-bordered table-responsive hidden">
                <tr>
                    <th width="25%" class="text-center">ЕГРН (без печати) жилые/нежилые помещения</th>
                    <th width="25%" class="text-center">Москва</th>
                    <th width="25%" class="text-center">Московская область</th>
                    <th class="text-center">Регионы РФ</th>
                </tr>
                <tr class="text-center">
                    <td>2 дня</td>
                    <td colspan="3">999 руб.</td>
                </tr>
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Зачем нужна выписка из ЕГРН?</h2>
            <p>Справка ЕГРН необходима для собственника любого объекта недвижимости (квартиры, дома, участка).</p>
            <ul>                  
                <li>В банк (для сделок с недвижимостью при использовании кредитных средств)</li>
                <li>Для нового собственника (для определения перехода права к новому собственнику)</li>
                <li>Суды (при имущественных спорах)</li>
                <li>Органы опеки и попечительства</li>
                <li>Для оформления залога</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Структура документа:</h2>
            <ul>
                <li>Кадастровый номер</li>
                <li>Наименование объекта</li>
                <li>Назначение объекта</li>
                <li>Площадь</li>
                <li>Этажность</li>
                <li>Адрес</li>
                <li>Правообладатель (актуальный)</li>
                <li>Вид, номер и дата государственной регистрации права</li>
                <li>Ограничения, обременения</li>
                <li>Правопритязания</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Структура (сведения) в выписке из ЕГРН:</h2>
            <ul>
                 <li>Сведения об объекте жилого или нежилого фонда</li>
                 <li>Кадастровый или условный номер, площадь объекта, адрес</li>
                 <li>Сведения о правообладателе или правообладателях (при долевой или совместной собственности)</li>
                 <li>Сведения о наличии ограничения или обременения прав (залог, ипотека)</li>
                 <li>Сведения о зарегистрированных договорах долевого участия</li>
                 <li>Право притязания</li>
                 <li>Заявленные в судебном порядке права требования</li>
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
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=5') ?>">История перехода права</a></td>
                    <td class="text-center">от 1500 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=7') ?>">Расширенная выписка из домовой книги</a></td>
                    <td class="text-center">от 4000 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=9') ?>">Справка из ПНД и НД </a></td>
                    <td class="text-center">от 4000 руб.</td>
                </tr>-->
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Срочное получение выписки из ЕГРН:</h2>
            <p class="text-center">Заказывая справку из ЕГРН у нас, вы получаете ее СРОЧНО, в обговоренные сроки и с доставкой лично вам в руки.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">ПОЧЕМУ ВЫПИСКУ ИЗ ЕГРН НУЖНО ПОЛУЧИТЬ У НАС?:</h2>
            <ul>
                <li>Гарантированный срок</li>
                <li>Точные сведения из ЕГРН</li>
                <li>Вы экономите ваше время</li>
                <li>Вы получаете выписку ЕГРН точно в руки</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Выписки из ЕГРН по телефону в Москве</h2>
            <hr>
            <h3 class="text-center"><?= Yii::$app->controller->getCompany('company')->phone1 ?></h3>
            <p class="text-center">выписки из ЕГРН по Московской области</p>
            <p class="text-center">выписки из ЕГРН на земельный участок</p>
        </div> <!-- end content-block col -->
        
    </div> <!-- end row -->
</div> <!-- end container -->