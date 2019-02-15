<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscribe".
 *
 * @property int $id id подписки
 * @property string $email email подписчика
 * @property string $created дата подписки
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['email'], 'required'],
            [['created'], 'safe'],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'created' => 'Created',
        ];
    }

    /*
     * after subscribe save
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        
        if ($insert) {
            // if new subscribe

            $company = Yii::$app->controller->getCompany('company');

            Yii::$app->mailer->compose([
                'html' => 'test',
                'text' => 'test',
                ])
                ->setFrom([$company['email'] => 'MSERVICE | Подписка оформлена'])
                ->setTo($this->email)
                ->setSubject('Подписка оформлена')
                ->setTextBody('Подписка на новости сайта mservice.pro, адрес: '.$this->email)
                ->setHtmlBody('<p>'.'Подписка на новости сайта mservice.pro, адрес: '.$this->email.'</p>')
                ->send();
            
            Yii::$app->mailer->compose([
                'html' => 'test',
                'text' => 'test',
                ])
                ->setFrom(['mail@mail.ru' => 'MSERVICE | Новая подписка'])
                ->setTo($company['email'])
                ->setSubject('Оформлена новая подписка')
                ->setTextBody('Оформлена новая подписка, адрес: '.$this->email)
                ->setHtmlBody('<p>Оформлена новая подписка, адрес: '.$this->email.'</p>')
                ->send();

        } else {
            // if updates subscribe
            
        }
    }
}
