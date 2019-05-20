<?php

/* 
 * Государственная регистрация права
 */
?>

<div class="container text-justify">
    <div class="row">
        
        <div class="content-block col-sm-12">
            <h2 class="text-center bg-success"> Государственная регистрация права/перехода права</h2>
            <p>Государственная регистрация прав на недвижимое имущество – юридический акт, направленный на защиту прав по объектам потребителей таких как: комнат, квартир, домов, машино-мест, гаражей, зданий, частей зданий, сооружений, долей в них в Москве, Московской области, а также в любом регионе Российской федерации</p>
            <p>Компания Мсервис осуществляет содействие в регистрации недвижимости и сопровождение сделок по Москве и Московской области.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <p>Наши специалисты помогут Вам по регистрации следующих договоров в Москве и МО:</p>
            <ul>                  
                <li>договора купли-продажи</li>
                <li>договора дарения</li>
                <li>договора ипотеки</li>
                <li>договора залога</li>
                <li>договора мены</li>
                <li>договора ренты</li>
            </ul>
        </div> <!-- end content-block col -->
        

        <div class="content-block col-sm-12">
            <h2 class="text-center">Стоимость регистрации прав на недвижимое имущество</h2>
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
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=1') ?>">Выписка из ЕГРН с печатью</a></td>
                    <td class="text-center">4000 руб. ???</td>
                </tr>
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
        
        <!--<div class="content-block col-sm-12">
            <h2 class="text-center">Документы БТИ по телефону в Москве</h2>
            <hr>
            <h3 class="text-center"><?= Yii::$app->controller->getCompany('company')->phone1 ?></h3>
            <p class="text-center">Документы БТИ по Московской области</p>
            <p class="text-center">Документы БТИ на земельный участок</p>
            <p class="text-center">Документы БТИ по адресу онлайн</p>
        </div>--> <!-- end content-block col -->
        
    </div> <!-- end row -->
</div> <!-- end container -->