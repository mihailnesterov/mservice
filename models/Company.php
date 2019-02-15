<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id id компании
 * @property string $name название компании
 * @property string $company_name полное название компании
 * @property string $phone1 телефон 1
 * @property string $phone2 телефон 2
 * @property string $email email
 * @property string $address адрес компании
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            /*[['name', 'company_name', 'phone1', 'phone2', 'email', 'address'], 'required'],*/
            [['name'], 'required'],
            [['name', 'company_name'], 'string', 'max' => 255],
            [['phone1', 'phone2'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 500],
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
            'company_name' => 'Company Name',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'email' => 'Email',
            'address' => 'Address',
        ];
    }
}
