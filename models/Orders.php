<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id id заказа
 * @property int $client_id id клиента
 * @property string $address адрес объекта
 * @property string $address_reg адрес регистрации проверяемого
 * @property int $fio ФИО проверяемого
 * @property string $birthday дата рождения проверяемого
 * @property string $inn ИНН
 * @property string $created дата создания
 *
 * @property Clients $client
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'address'], 'required'],
            [['client_id', 'fio'], 'integer'],
            [['created'], 'safe'],
            [['address', 'address_reg'], 'string', 'max' => 512],
            [['birthday'], 'string', 'max' => 100],
            [['inn'], 'string', 'max' => 20],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'address' => 'Адрес объекта',
            'address_reg' => 'Адрес регистрации проверяемого',
            'fio' => 'ФИО проверяемого',
            'birthday' => 'Дата рождения проверяемого',
            'inn' => 'ИНН проверяемого',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }
    
    /*
     * after order save
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        
        if ($insert) {
            // if new order

            $cookie = Yii::$app->getRequest()->getCookies()->getValue('addOrderItem', (isset($_COOKIE['addOrderItem']))? $_COOKIE['addOrderItem']: 'addOrderItem');
            $jsonItems = json_decode($cookie, true);
            
            $jsonItemsCounter = 0;
            for($i = 0; $i < count($jsonItems); $i++){
                $jsonItemsCounter++;
                $orderItem = new OrderItems();
                $orderItem->order_id = $this->id;
                $orderItem->name = $jsonItems[''.$jsonItemsCounter.'']['name'];
                $orderItem->price = $jsonItems[''.$jsonItemsCounter.'']['sum'];
                $orderItem->save();
            }

            $company = Yii::$app->controller->getCompany('company');

            // prepare params for email
            Yii::$app->mailer->getView()->params['company'] = $company;
            Yii::$app->mailer->getView()->params['client_id'] = $this->client->id;
            Yii::$app->mailer->getView()->params['client_name'] = $this->client->name;
            Yii::$app->mailer->getView()->params['order_id'] = $this->id;
            Yii::$app->mailer->getView()->params['orderItems'] = $jsonItems;
            Yii::$app->mailer->getView()->params['order_date'] = date('d.m.Y');
            // send email to client
            Yii::$app->mailer->compose([
                    'html' => 'view-html',
                    'text' => 'view-text',
                ],
                [
                    'company' => $company,
                    'client_id' => $this->client->id,
                    'client_name' => $this->client->name,
                    'order_id' => $this->id,
                    'orderItems' => $jsonItems,
                    'order_date' => date('d.m.Y'),
                ])
                //->setFrom([$company->email => $company->name.' | Заказ № sbt24-'.$this->id])
                ->setFrom([$company->email => $company->name.' | Заказ № ms-'.$this->id])
                ->setTo($this->client->email)
                ->setSubject('Ваш заказ в MSERVICE № ms-'.$this->id.', от '.date('d.m.Y'))
                //->setTextBody($this->clients->name.', Ваш заказ получен, в ближайшее время мы свяжемся с вами')
                //->setHtmlBody('<p>'.$this->client->name.', Ваш заказ получен, в ближайшее время мы свяжемся с вами</p>')
                ->send();
            // send email to company
            Yii::$app->mailer->compose([
                    'html' => 'company-html',
                    'text' => 'company-text',
                ],
                [
                    'company' => $company,
                    'client_id' => $this->client->id,
                    'client_name' => $this->client->name,
                    'client_phone' => $this->client->phone,
                    'client_email' => $this->client->email,
                    'order_id' => $this->id,
                    'orderItems' => $jsonItems,
                    'order_date' => date('d.m.Y'),
                ])
                //->setFrom([$company->email => $company->name.' | Заказ № sbt24-'.$this->id])
                ->setFrom([$company->email => $company->name.' | Заказ № ms-'.$this->id])
                ->setTo($company->email)
                //->setTo('mhause@mail.ru')
                ->setSubject('Получен заказ № ms-'.$this->id.', от '.date('d.m.Y'))
                //->setTextBody($this->client->company.', '.$this->client->contact.', '.$this->client->phone.', '.$this->client->email)
                //->setHtmlBody('<p>'.$this->client->company.', '.$this->client->contact.', '.$this->client->phone.', '.$this->client->email.'</p>')
                ->send();

            Yii::$app->mailer->getView()->params['company'] = null;
            Yii::$app->mailer->getView()->params['client_id'] = null;
            Yii::$app->mailer->getView()->params['client_name'] = null;
            Yii::$app->mailer->getView()->params['order_id'] = null;
            Yii::$app->mailer->getView()->params['orderItems'] = null;
            Yii::$app->mailer->getView()->params['order_date'] = null;

            /*Yii::$app->mailer->compose([
                'html' => 'test',
                'text' => 'test',
                ])
                ->setFrom([$company['email'] => 'MSERVICE | Заказ № ms-'.$this->id])
                ->setTo($this->client->email)
                ->setSubject('Заказ № ms-'.$this->id.', от '.date('Y.m.d'))
                ->setTextBody($this->client->name.', Ваш заказ получен, в ближайшее время мы свяжемся с вами')
                ->setHtmlBody('<p>'.$this->client->name.', Ваш заказ получен, в ближайшее время мы свяжемся с вами</p>')
                ->send();
            
            Yii::$app->mailer->compose([
                'html' => 'test',
                'text' => 'test',
                ])
                ->setFrom(['mail@mail.ru' => 'MSERVICE | Заказ № ms-'.$this->id])
                ->setTo($company['email'])
                ->setSubject('Получен заказ № ms-'.$this->id.', от '.date('Y.m.d'))
                ->setTextBody($this->client->name.', '.$this->client->phone.', '.$this->client->email)
                ->setHtmlBody('<p>'.$this->client->name.', '.$this->client->phone.', '.$this->client->email.'</p>')
                ->send();*/

        } else {
            // if updates order
            
        }
    }
}
