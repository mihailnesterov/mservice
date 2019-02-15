<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "complex".
 *
 * @property int $id id комплекса
 * @property string $name название комплекса
 * @property string $comment комментарий
 *
 * @property ServicesInComplex[] $servicesInComplexes
 */
class Complex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['comment'], 'string', 'max' => 512],
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
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicesInComplexes()
    {
        return $this->hasMany(ServicesInComplex::className(), ['complex_id' => 'id']);
    }
}
