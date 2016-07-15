<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $customer_id
 * @property string $customer_name
 * @property string $customer_company
 * @property string $customer_details
 *
 * @property Address[] $addresses
 * @property Profile[] $profiles
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name'], 'required'],
            [['customer_details'], 'string'],
            [['customer_name', 'customer_company'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'customer_name' => 'Customer Name',
            'customer_company' => 'Customer Company',
            'customer_details' => 'Customer Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['customer_id' => 'customer_id']);
    }
}
