<?php

/* 
 * Архивные документы из Росреестра
 */
?>

<div class="container text-justify">
    <div class="row">
        
        <div class="content-block col-sm-12">
            <h2 class="text-center bg-success">Архивные документы из Росреестра</h2>
            <p>Получение заверенных копий документов, сданных на государственную регистрацию прав на недвижимое имущество.</p>
            <p>Основные документы:</p>
            <ul>                  
                <li>Договоры (передачи, купли-продажи, дарения и т.д.)</li>
                <li>Дополнительные соглашения</li>
                <li>Акты</li>
                <li>Прочие документы</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2>Для чего нужны документы из архива Росреестра?</h2>
            <ul>                  
                <li>При утери документов</li>
                <li>При проведении сделок с недвижимостью</li>
                <li>Для судебных инстанций</li>
                <li>Для судебных приставов</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2>Возможно, Вам также потребуются:</h2>
            <ul>                  
                <li><a href="<?= Yii::$app->urlManager->createUrl('services?id=1') ?>">Выписка из ЕГРН</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl('services?id=3') ?>">Выписка из ЕГРЮЛ</a></li>
                <!--<li><a href="<?= Yii::$app->urlManager->createUrl('services?id=0') ?>">Кадастровый паспорт</a></li>-->
                <li><a href="<?= Yii::$app->urlManager->createUrl('services?id=6') ?>">Документы БТИ</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl('services?id=8') ?>">Справка из ДГИ(ДЖП)</a></li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">С этой услугой так же заказывают:</h2>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th width="5%" class="text-center">№</th>
                    <th width="65%" class="text-center">Название услуги</th>
                    <th class="text-center">Цена</th>
                </tr>
                <!--<tr>
                    <td class="text-center">1</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=0') ?>">Кадастровый паспорт</a></td>
                    <td class="text-center">от 1500 руб.</td>
                </tr>-->
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=5') ?>">История перехода права</a></td>
                    <td class="text-center">от 1500 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=7') ?>">Выписка из домовой книги</a></td>
                    <td class="text-center">от 4000 руб.</td>
                </tr>
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Срочное получение документов из архива Росреестра</h2>
            <h2 class="text-center">ПОЧЕМУ ДОКУМЕНТЫ ИЗ АРХИВА РОСРЕЕСТРА НУЖНО ПОЛУЧИТЬ У НАС?</h2>
            <ul>
                <li>Гарантированный срок</li>
                <li>Точные сведения</li>
                <li>Вы экономите ваше время</li>
                <li>Точно в руки</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Документы из архива Росреестра по телефону в Москве</h2>
            <hr>
            <h3 class="text-center"><?= Yii::$app->controller->getCompany('company')->phone1 ?></h3>
            <p class="text-center">Документы из архива Росреестра по Московской области</p>
        </div> <!-- end content-block col -->
        
    </div> <!-- end row -->
</div> <!-- end container -->