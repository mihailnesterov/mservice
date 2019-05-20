<?php

/* 
 * Выписка из ЕГРЮЛ
 */
?>

<div class="container text-justify">
    <div class="row">
        
        <div class="content-block col-sm-12">
            <h2 class="text-center bg-success">Получить срочную выписку из ЕГРЮЛ за 1 час</h2>
            <p>Выписка ЕГРЮЛ - это официальный источник информации по юридическим лицам.</p>
            <p>ЕГРЮЛ - единый государственный реестр юридических лиц.</p>
            <p>Выписка ЕГРЮЛ содержит сведения об образовании юридического лица; дате, видов деятельности, учредителях, генеральных директорах, уставном капитале, юридическом адресе.</p>
            <p>То есть в выписке ЕГРЮЛ можно увидеть всю информацию по компании.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Зачем нужна справка ЕГРЮЛ?</h2>
            <p>Часто выписка ЕГРЮЛ требуется для определения добросовестности контрагента.</p>
            <p>Перед планированием партнерства, в некоторых случаях выписка ЕГРЮЛ обязательна для предъявления:</p>
            <ul>                  
                <li>Для получения ссуды в банке (будет потребована банком среди прочих документов)</li>
                <li>При обращении в суд</li>
                <li>При купле-продаже имущества (с участием юридического лица или непосредственно имущества юридического лица)</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Структура выписки из ЕГРЮЛ:</h2>
            <ul>
                 <li>Дата выдачи, № выписки</li>
                 <li>Организационно-правовая форма, ИНН, КПП</li>
                 <li>Местонахождение юридического лица</li>
                 <li>Размер уставного капитала</li>
                 <li>Сведения о состоянии юридического лица</li>
                 <li>Дата регистрации</li>
                 <li>Количество учредителей</li>
                 <li>Сведения об учредителях</li>
                 <li>Сведения о количестве физических лиц, имеющих право без доверенности действовать от имени юридического лица</li>
                 <li>Прочие сведения</li>
            </ul>
        </div> <!-- end content-block col -->

        <div class="content-block col-sm-12">
            <h2 class="text-center">Стоимость Выписки из ЕГРЮЛ</h2>
            <div id="service-price-block" class="row text-center">
                
            </div>
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
                    <td class="text-center">от 4000 руб.</td>
                </tr>-->
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Срочное получение выписки из ЕГРЮЛ:</h2>
            <p class="text-center">Заказывая справку из ЕГРЮЛ у нас, вы получаете ее СРОЧНО, в обговоренные сроки и с доставкой лично вам в руки.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">ПОЧЕМУ ВЫПИСКУ ИЗ ЕГРЮЛ НУЖНО ПОЛУЧИТЬ У НАС?:</h2>
            <ul>
                <li>Гарантированный срок</li>
                <li>Точные сведения из ЕГРП</li>
                <li>Вы экономите ваше время</li>
                <li>Вы получаете выписку ЕГРП точно в руки</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Выписка из ЕГРЮЛ по телефону в Москве</h2>
            <hr>
            <h3 class="text-center"><?= Yii::$app->controller->getCompany('company')->phone1 ?></h3>
            <p class="text-center">выписки из ЕГРЮЛ по Московской области</p>
            <p class="text-center">выписки из ЕГРЮЛ на земельный участок</p>
        </div> <!-- end content-block col -->
        
    </div> <!-- end row -->
</div> <!-- end container -->