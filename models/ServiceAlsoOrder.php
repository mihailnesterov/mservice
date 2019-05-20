<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_also_order".
 *
 * @property int $id id позиции
 * @property int $service_id id услуги
 * @property int $service_also_id id услуги которую заказывают
 *
 * @property Services $service
 */
class ServiceAlsoOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    private $db;

    public static function tableName()
    {
        return 'service_also_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'service_also_id'], 'required'],
            [['service_id', 'service_also_id'], 'integer'],
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
            'service_also_id' => 'Service Also ID',
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
    public function getServiceName($id)
    {
        $service = Services::find()->where(['id' => $id])->one();
        return $service->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMinPrice($id)
    {
        if( !$this->db )
            $this->db = \Yii::$app->getDb();
        $command =  $this->db->createCommand("
            SELECT DISTINCT min(prices.price) FROM `service_in_region`,`services`,`prices` 
            WHERE service_in_region.service_id=".$id." 
            AND service_in_region.service_id=services.id 
            and service_in_region.id=prices.serv_in_reg_id"
        );
        $result = $command->queryScalar();
        return $result;
    }
}
