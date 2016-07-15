<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $area_id
 * @property integer $address_id
 * @property string $area_name
 * @property string $area_description
 *
 * @property Address $address
 * @property Deploy[] $deploys
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_id', 'area_name'], 'required'],
            [['address_id'], 'integer'],
            [['area_description'], 'string'],
            [['area_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'area_id' => 'Area ID',
            'address_id' => 'Address ID',
            'area_name' => 'Area Name',
            'area_description' => 'Area Description',
        ];
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
    public function getDeploys()
    {
        return $this->hasMany(Deploy::className(), ['area_id' => 'area_id']);
    }
}
