<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services_in_complex".
 *
 * @property int $id id услуги в комплексе
 * @property int $region_id id региона
 * @property int $service_id id услуги
 * @property int $complex_id id комплекса
 * @property int $counter порядковый номер услуги в комплексе
 * @property string $price цена услуги в комплексе
 *
 * @property Regions $region
 * @property Services $service
 * @property Complex $complex
 */
class ServicesInComplex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services_in_complex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'service_id', 'complex_id', 'counter', 'price'], 'required'],
            [['region_id', 'service_id', 'complex_id', 'counter'], 'integer'],
            [['price'], 'string', 'max' => 20],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
            [['complex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complex::className(), 'targetAttribute' => ['complex_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'service_id' => 'Service ID',
            'complex_id' => 'Complex ID',
            'counter' => 'Counter',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplex()
    {
        return $this->hasOne(Complex::className(), ['id' => 'complex_id']);
    }
}
