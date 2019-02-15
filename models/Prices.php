<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prices".
 *
 * @property int $id id цены
 * @property int $serv_in_reg_id id услуги в регионе
 * @property string $speed Срок выполнения
 * @property string $price Цена
 * @property int $sort Порядковый №
 *
 * @property ServiceInRegion $servInReg
 */
class Prices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serv_in_reg_id', 'speed', 'price', 'sort'], 'required'],
            [['serv_in_reg_id', 'sort'], 'integer'],
            [['speed', 'price'], 'string', 'max' => 20],
            [['serv_in_reg_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceInRegion::className(), 'targetAttribute' => ['serv_in_reg_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serv_in_reg_id' => 'Serv In Reg ID',
            'speed' => 'Speed',
            'price' => 'Price',
            'sort' => 'Sort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServInReg()
    {
        return $this->hasOne(ServiceInRegion::className(), ['id' => 'serv_in_reg_id']);
    }
}
