<?php

/* 
 * Проверка БКИ
 */
?>

<div class="container text-justify">
    <div class="row">
        
        <div class="content-block col-sm-12">
            <h2 class="text-center bg-success">Информация предоставляется на физическое лицо</h2>
            <p>Бюро кредитных историй — юридическое лицо, зарегистрированное в соответствии с законодательством Российской Федерации, являющееся коммерческой организацией и оказывающее в соответствии с Федеральным законом от 30.12.2004 № 218-ФЗ " О кредитных историях " услуги по формированию, обработке и хранению кредитных историй, а также по предоставлению кредитных отчётов и сопутствующих услуг.</p>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Сведения которые содержатся в БКИ</h2>
            <ul>                  
                <li>Содержит детальную информацию о действующих и ранее выплаченных кредитах, а также о запросах, которые делали банки и другие организации для проверки Вашей кредитной истории.</li>
                <li>Ваш кредитный рейтинг</li>
                <li>Полные данные по всем Вашим кредитам и кредитным картам</li>
                <li>По каждому кредиту Вы увидите детальную историю платежей с указанием допущенных просрочек</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">Для чего нужна информация из БКИ?</h2>
            <ul>                  
                <li>Для проверки кредитной истории физического лица</li>
                <li>Для оценки кредитоспособности физического лица</li>
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
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=1') ?>">Выписка из ЕГРН</a></td>
                    <td class="text-center">от 4000 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=8') ?>">Справка из ДГИ (ДЖП)</a></td>
                    <td class="text-center">от 999 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=7') ?>">Архивная выписка из домовой книги "АВДК"</a></td>
                    <td class="text-center">от 4000 руб.</td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td class="text-left"><a href="<?= Yii::$app->urlManager->createUrl('services?id=9') ?>">Справка из ПНД и НД</a></td>
                    <td class="text-center">от 4000 руб.</td>
                </tr>
            </table>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">СРОЧНОЕ ПОЛУЧЕНИЕ ИНФОРМАЦИИ ИЗ БКИ</h2>
            <h2 class="text-center">ПОЧЕМУ ИНФОРМАЦИЮ ИЗ БКИ НУЖНО ПОЛУЧИТЬ У НАС?</h2>
            <ul>
                <li>Гарантированный срок</li>
                <li>Точные сведения</li>
                <li>Вы экономите ваше время</li>
            </ul>
        </div> <!-- end content-block col -->
        
        <div class="content-block col-sm-12">
            <h2 class="text-center">БКИ НА ФИЗИЧЕСКОЕ ЛИЦО</h2>
            <hr>
            <h3 class="text-center"><?= Yii::$app->controller->getCompany('company')->phone1 ?></h3>
        </div> <!-- end content-block col -->
        
    </div> <!-- end row -->
</div> <!-- end container -->