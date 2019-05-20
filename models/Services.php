<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id id услуги
 * @property string $name название услуги
 * @property string $description описание услуги
 * @property int $sort сортировка
 *
 * @property Scans[] $scans
 * @property ServiceAlsoOrder[] $serviceAlsoOrders
 * @property ServiceInRegion[] $serviceInRegions
 * @property ServicesInComplex[] $servicesInComplexes
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['sort'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'sort' => 'Sort'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScans()
    {
        return $this->hasMany(Scans::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceAlsoOrders()
    {
        return $this->hasMany(ServiceAlsoOrder::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInRegions()
    {
        return $this->hasMany(ServiceInRegion::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicesInComplexes()
    {
        return $this->hasMany(ServicesInComplex::className(), ['service_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getServiceByAlsoId($id)
    {
        $serviceById = $this->find()->where(['id' => $this->id])->one();
        return $serviceById->servicealsoorder->id;
    }*/
}
