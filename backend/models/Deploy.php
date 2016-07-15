<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "deploy".
 *
 * @property integer $deploy_id
 * @property integer $customer_id
 * @property integer $address_id
 * @property integer $area_id
 * @property integer $equipment_id
 * @property string $deploy_date
 * @property string $deploy_notes
 *
 * @property Customer $customer
 * @property Address $address
 * @property Area $area
 * @property Equipment $equipment
 */
class Deploy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deploy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'address_id', 'equipment_id', 'deploy_date'], 'required'],
            [['customer_id', 'address_id', 'area_id', 'equipment_id'], 'integer'],
            [['deploy_date'], 'safe'],
            [['deploy_notes'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'deploy_id' => 'Deploy ID',
            'customer_id' => 'Customer Name',
            'address_id' => 'Address',
            'area_id' => 'Area Name',
            'equipment_id' => 'Bait Station No.',
            'deploy_date' => 'Deploy Date',
            'deploy_notes' => 'Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['area_id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['equipment_id' => 'equipment_id']);
    }
}
