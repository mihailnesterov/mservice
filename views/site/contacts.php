<?php

/*
 * contacts page
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$company = Yii::$app->controller->getCompany('company');

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
                <div id="contacts-in-contacts" class="col-sm-12">
                    <ul>
                        <li><i class="fa fa-phone"></i> <?= $company->phone1 ?></li>
                        <li><i class="fa fa-mobile"></i> <?= $company->phone2 ?></li>
                        <li class="mailto"><i class="fa fa-envelope-o"></i> <a href="mailto: <?= $company->email ?>"><?= $company->email ?></a></li>
                        <li><i class="fa fa-map-marker"></i> <?= $company->address ?></li>
                    </ul>
                </div> <!-- end col -->
                <div id="map" class="col-sm-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2242.847719564617!2d37.80031784931175!3d55.79588210126534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b534cda8941ef3%3A0x77eece94c81ee56a!2z0KHRgNC10LTQvdGP0Y8g0J_QtdGA0LLQvtC80LDQudGB0LrQsNGPINGD0LsuLCA0LCDQnNC-0YHQutCy0LAsIDEwNTA3Nw!5e0!3m2!1sru!2sru!4v1548758864420" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> <!-- end col -->
            </div> <!-- end row -->
    </div> <!-- end container -->

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