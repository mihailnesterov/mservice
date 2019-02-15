<?php

namespace app\models;

use Yii;
use app\models\Orders;

/**
 * This is the model class for table "clients".
 *
 * @property int $id id клиента
 * @property string $name имя клиента
 * @property string $email email клиента
 * @property string $phone телефон клиента
 * @property string $created дата создания
 *
 * @property Orders[] $orders
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['email', 'phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['client_id' => 'id']);
    }
    
    /*
     * add new order if new client added
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        
        if ($insert) {
            // if new client
            $order = new Orders();
            $order->client_id = $this->id;
            $order->address = Yii::$app->request->post('object-address'); /*$_REQUEST['object-address'];*/
            $order->save();

            $cookie = new \yii\web\Cookie([
                'name' => 'msClientId',
                'value' => $this->id,
                'expire' => time() + 60 * 60 * 24 * 365,
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);
        } else {
            // if updates client
            
        }
    }
}
