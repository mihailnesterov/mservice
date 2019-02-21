<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Company;
use app\models\Regions;
use app\models\Services;
use app\models\ServiceInRegion;
use app\models\Prices;
use app\models\Scans;
use app\models\Complex;
use app\models\ServicesInComplex;
use app\models\Clients;
use app\models\Orders;
use app\models\OrderItems;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\base\Event;
use yii\web\View;
use yii\data\Pagination;
//use kartik\mpdf\Pdf;

class SiteController extends Controller
{
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    /*
     * send company data to layout
     */
    public function getCompany()
    {
        $company = Company::find()->where(['id' => '1'])->one();
        return $this->view->params['company'] = $company;
    }
    
    /*
     * get services for main menu
     */
    public function getServices()
    {
        $services = Services::find()->orderby(['sort'=>SORT_ASC])->all();
        return $this->view->params['services'] = $services;
    }

    /*
     * get complexes for main menu
     */
    public function getComplexes()
    {
        $complexes = Complex::find()->orderby(['id'=>SORT_ASC])->all();
        return $this->view->params['complexes'] = $complexes;
    }
        
    /*
     * get services for footer menu
     */
    public function getFooterServices()
    {
        $footerServices = Services::find()->orderby(['sort'=>SORT_ASC])->limit(5)->all();
        return $this->view->params['footerServices'] = $footerServices;
    }
    
    /*
     * get complexes for footer menu
     */
    public function getFooterComplexes()
    {
        $footerComplexes = Complex::find()->orderby(['id'=>SORT_ASC])->limit(5)->all();
        return $this->view->params['footerComplexes'] = $footerComplexes;
    }
    
    /*
     * get Yandex.Metrika
     */
    public function getYandexMetrika()
    {
        //$metrika = '<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter51001274 = new Ya.Metrika2({ id:51001274, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/tag.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks2"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/51001274" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->';
        $metrika = '';
        return $this->view->params['metrika'] = $metrika;
    }
    
    /*
     *  random string generation function
     */
    /*public function generateRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }*/
    
    
    
    public function actionIndex()
    {
        $this->view->title = 'Срочные экспертные проверки объектов и субъектов';
        
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => ''
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => ''
        ]);
        
        /*
        Сортировка услуг:
            1 Выписка из ЕГРН с печатью
            2 Выписка из ЕГРН без печати
            3 История перехода права
            4 Архивная выписка из домовой книги "АВДК" 
            5 Справка из ЦАБ	
            6 Справка из ПНД и НД
            7 Справка из ДГИ(ДЖП)
            8 Документы БТИ
            9 Проверка кредитной истории "НБКИ"
            10 Архив Росреестра
            11 Регистрация недвижимости
            12 Юридическое заключение
            13 Выписка из ЕГРЮЛ
            
            14 Проверка на банкротство
            15 Негатив
            16 Наличие собственности
        */

        $regions = Regions::find()->orderby(['id'=>SORT_ASC])->all();
        $services = Services::find()->orderby(['sort'=>SORT_ASC])->all();
        $servicesInRegion = ServiceInRegion::find()->orderby(['sort'=>SORT_ASC])->all();
        $prices = Prices::find()->orderby(['id'=>SORT_ASC])->all();
        $scans = Scans::find()->orderby(['id'=>SORT_ASC])->all();
        
        return $this->render('index', [
            'regions' => $regions,
            'services' => $services,
            'servicesInRegion' => $servicesInRegion,
            'prices' => $prices,
            'scans' => $scans
        ]);
    }
    
    public function actionServices($id)
    {
        $model = $this->findServiceModel($id);
        $regions = Regions::find()->orderby(['id'=>SORT_ASC])->all();
        $servicesInRegion = ServiceInRegion::find()->orderby(['id'=>SORT_ASC])->all();
        $prices = Prices::find()->orderby(['id'=>SORT_ASC])->all();
        $scans = Scans::find()->orderby(['id'=>SORT_ASC])->all();
        
        $this->view->title = $model->name;
        //$this->view->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => Yii::$app->urlManager->createUrl('/')];
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->name
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->description
        ]);

        return $this->render('services', [
            'model' => $model,
            'regions' => $regions,
            'servicesInRegion' => $servicesInRegion,
            'prices' => $prices,
            'scans' => $scans
        ]);
    }
    
    public function actionComplexes()
    {
        $this->view->title = 'Рекомендуемые проверки';
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'комплексная проверка объекта Москва'
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Комплексные проверки объектов и субъектов в Москве и Московской области'
        ]);
        
        $regions = Regions::find()->orderby(['id'=>SORT_ASC])->limit(2)->all();
        $complexes = Complex::find()->orderby(['id'=>SORT_ASC])->all();
        $servicesInComplex = ServicesInComplex::find()->orderby(['id'=>SORT_ASC])->all();
        $complexID = ServicesInComplex::find()->select('complex_id')->distinct()->all();

        $clientName = '';
        $clientEmail = '';
        $clientPhone = '';
        if( Yii::$app->request->cookies->has('msClientId') ) {
            $clientFromCookieId = Yii::$app->getRequest()->getCookies()->getValue('msClientId');
            $clientFromCookie = Clients::find()->where(['id' => $clientFromCookieId])->one();
            $clientName = $clientFromCookie->name;
            $clientEmail = $clientFromCookie->email;
            $clientPhone = $clientFromCookie->phone;
        }
        //Yii::$app->getResponse()->getCookies()->remove('msClientId');
        
        $client = new Clients();
        if ($client->load(Yii::$app->request->post()) && $client->validate()) {
            if ($client->save()) {
                //return true;
                /* отправляем имя клиента в ajax data */
                return $client->name;
            }
        }

        return $this->render('complexes', [
            'regions' => $regions,
            'complexes' => $complexes,
            'servicesInComplex' => $servicesInComplex,
            'complexID' => $complexID,
            'client' => $client,
            'clientName' => $clientName,
            'clientEmail' => $clientEmail,
            'clientPhone' => $clientPhone,
        ]);
    }
    
    public function actionComplex1($id)
    {
        $model = $this->findComplexModel($id);
        $regions = Regions::find()->orderby(['id'=>SORT_ASC])->limit(2)->all();
        $servicesInComplex = ServicesInComplex::find()->where(['complex_id' => $id])->orderby(['id'=>SORT_ASC])->all();
        $complexID = ServicesInComplex::find()->select('complex_id')->distinct()->all();

        $clientName = '';
        $clientEmail = '';
        $clientPhone = '';
        if( Yii::$app->request->cookies->has('msClientId') ) {
            $clientFromCookieId = Yii::$app->getRequest()->getCookies()->getValue('msClientId');
            $clientFromCookie = Clients::find()->where(['id' => $clientFromCookieId])->one();
            $clientName = $clientFromCookie->name;
            $clientEmail = $clientFromCookie->email;
            $clientPhone = $clientFromCookie->phone;
        }
        
        $client = new Clients();
        if ($client->load(Yii::$app->request->post()) && $client->validate()) {
            if ($client->save()) {
                //return true;
                /* отправляем имя клиента в ajax data */
                return $client->name;
            }
        }
        
        /*if($_POST) {
            $data = json_decode($_POST['data']);
            $row = get_text($data->id);
            echo json_encode($row);
            exit();
        }*/
        
        $this->view->title = $model->name;
        $this->view->params['breadcrumbs'][] = ['label' => 'Рекомендуемые проверки', 'url' => Yii::$app->urlManager->createUrl('/complexes')];
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->name
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->name.', заказать комплексную экспертную проверку в Москве и Московской области - '.$model->comment
        ]);

        return $this->render('complex', [
            'model' => $model,
            'regions' => $regions,
            'servicesInComplex' => $servicesInComplex,
            'complexID' => $complexID,
            'client' => $client,
            'id' => $id,
            'clientName' => $clientName,
            'clientEmail' => $clientEmail,
            'clientPhone' => $clientPhone,
        ]);
    }
    
    public function actionAbout()
    {
        $this->view->title = 'О нас';
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => ''
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => ''
        ]);

        return $this->render('about');
    }
    
    public function actionContacts()
    {
        $this->view->title = 'Контакты';
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => ''
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => ''
        ]);

        return $this->render('contacts');
    }

    public function actionPolicy()
    {
        $this->view->title = 'Политика конфиденциальности';
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'mservice политика конфиденциальности'
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Согласие на обработку персональных данных в соответствии с Политикой конфиденциальности'
        ]);

        return $this->render('policy');
    }

    // удалить, если не будет использоваться
    public function actionAddOrderItem()
    {
        $this->view->title = 'Добавить пункт в заказ';

        $orderItem = new OrderItems();
        if ($orderItem->load(Yii::$app->request->post()) && $orderItem->validate()) {
            if ($orderItem->save()) {
                //return true;
                /* отправляем название услуги в ajax res */
                return $orderItem->name;
            }
        }

        return $this->render('add-order-item');
    }
    
    /*
     * Error page (404...)
     */
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception != null) {
            if ($exception instanceof HttpException) {
                return $this->redirect(['404/'])->send();
            }
        }
        return $this->render('error',['exception' => $exception]);
    }    
    
    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findServiceModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /**
     * Finds the Complex model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findComplexModel($id)
    {
        if (($model = Complex::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    

    
    /**
     * Deletes an existing order item model.
     * If deletion is successful, the browser will be redirected to the 'cart' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionDeleteCartItem($id)
    {
        $this->findOrderItemModel($id)->delete();

        return $this->redirect(['/cart']);
    }*/
        
    /**
     * Build sitemap.xml page
     * http://itelect.ru/post/4/sitemap-dlya-proekta-na-yii2
     */
    public function actionSitemap() {
        $urls = array();
        array_push($urls, [ \Yii::$app->urlManager->createUrl(['/']), 'weekly' ]);
        
        array_push($urls, [ \Yii::$app->urlManager->createUrl(['/complexes']), 'weekly' ]);
        array_push($urls, [ \Yii::$app->urlManager->createUrl(['/about']), 'weekly' ]);
        array_push($urls, [ \Yii::$app->urlManager->createUrl(['/contacts']), 'weekly' ]);

        $services = Services::find()->all();
        foreach ($services as $service) {
            array_push($urls, [ \Yii::$app->urlManager->createUrl(['/services?id=' . $service->id]), 'daily' ]);
        }

        $complexes = Complex::find()->all();
        foreach ($complexes as $complex) {
            array_push($urls, [ \Yii::$app->urlManager->createUrl(['/complex?id=' . $complex->id]), 'daily' ]);
        }
        
        $xml_sitemap = $this->renderPartial('sitemap', [
            'host' => \Yii::$app->request->hostInfo,
            'urls' => $urls
        ]);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        echo $xml_sitemap;
    }

    protected function findClientModel($id)
    {
        if (($model = Clients::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
