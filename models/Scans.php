<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scans".
 *
 * @property int $id id изображения
 * @property int $service_id id услуги
 * @property int $region_id id региона
 * @property string $img_path путь к изображению
 * @property string $description подпись к изображению
 * @property int $is_active включен / отключен
 *
 * @property Services $service
 * @property Regions $region
 */
class Scans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'region_id', 'img_path'], 'required'],
            [['service_id', 'region_id', 'is_active'], 'integer'],
            [['img_path'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 512],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'region_id' => 'Region ID',
            'img_path' => 'Img Path',
            'description' => 'Description',
            'is_active' => 'Is active',
        ];
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
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }
}
