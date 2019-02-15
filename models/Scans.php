<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scans".
 *
 * @property int $id id изображения
 * @property int $service_id id услуги
 * @property string $img_path путь к изображению
 *
 * @property Services $service
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
            [['service_id', 'img_path'], 'required'],
            [['service_id'], 'integer'],
            [['img_path'], 'string', 'max' => 500],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
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
            'img_path' => 'Img Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
