<?php

/* 
 * Справки БТИ
 */
?>

<div class="container text-justify">
    <div class="row">
        
        <div class="content-block col-sm-12">
            <h2 class="text-center bg-success">Справки БТИ срочно</h2>
            <p>БТИ - бюро технической инвентаризации или ТБТИ - территориальное бюро технической инвентаризации.</p>
            <p>Бюро осуществляет инвентаризационный учет объектов недвижимости, собирает и хранит техническую информацию по объектам недвижимости в городе Москве.</p>
            <p>Бюро технической инвентаризации на основании письменного запроса выдает документы, основными из которых являются:</p>
            <ul>                  
                <li>поэтажный план</li>
                <li>экспликация</li>
                <li>технический паспорт помещения</li>
                <li>справка о соответствии адреса</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <p><strong>Поэтажный план помещения</strong> - это чертеж (план) помещения, изображенного на этаже. Содержит в себе схематические сведения о расположении комнат, окон, дверей, технических помещений.</p>
            <p><strong>Экспликация</strong> - это описание объекта недвижимости по конкретному адресу. Экспликация хранит в себе информацию по названию каждого помещения, его площади, высоте, а так же общий итог по площади объекта.</p>
            <p><strong>Технический паспорт помещения</strong> - наиболее полный документ на помещение. Содержит данные по запрашиваемому объекту:</p>
            <ul>
                <!--<li>площадь каждого помещения</li>
                <li>строительных материалов</li>
                <li>инвентаризационная цена</li>
                <li>сведения о здании</li>
                <li>прочие сведения</li>-->
                <li>площадь каждого помещения</li>
                <li>высота помещений</li>
                <li>материал стен и перекрытий</li>
                <li>дата инвентаризации помещения</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Для чего нужны документы БТИ срочно?</h2>
            <ul>                  
                <li>В банк (для сделок с недвижимостью при использовании кредитных средств)</li>
                <li>Суды (при имущественных спорах)</li>
                <li>Органы опеки и попечительства</li>
                <li>Для оформления залога</li>
            </ul>
        </div> <!-- end content-block col -->

        <div class="content-block col-sm-12">
            <h2 class="text-center">Стоимость документов БТИ</h2>
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
            <h2 class="text-center">Срочное получение документов из БТИ</h2>
            <h2 class="text-center">ПОЧЕМУ ДОКУМЕНТЫ БТИ НУЖНО ПОЛУЧИТЬ У НАС?</h2>
            <ul>
                <li>Гарантированный срок</li>
                <li>Точные сведения из БТИ</li>
                <li>Вы экономите ваше время</li>
                <li>Вы получаете справку из БТИ точно в руки</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Документы БТИ по телефону в Москве</h2>
            <hr>
            <h3 class="text-center"><?= Yii::$app->controller->getCompany('company')->phone1 ?></h3>
            <p class="text-center">Документы БТИ по Московской области</p>
            <p class="text-center">Документы БТИ на земельный участок</p>
            <p class="text-center">Документы БТИ по адресу онлайн</p>
        </div> <!-- end content-block col -->
        
    </div> <!-- end row -->
</div> <!-- end container -->