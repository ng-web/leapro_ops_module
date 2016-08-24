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
    
    public function getEquipmentCount($addr_id)
    {
        $equipmentCount = Yii::$app->db->createCommand('SELECT customer_company, address_line1, area_name, equipment_name, COUNT(*) as total_deployed FROM deploy DP
                INNER JOIN address A ON DP.address_id = A.address_id
                INNER JOIN area L ON DP.area_id = L.area_id
                INNER JOIN equipment E ON DP.equipment_id = E.equipment_id
                WHERE C.customer_id = :cust_id 
                AND address_id = addr_id
                GROUP BY area_name')
           ->bindValue(':id', $addr_id)->queryAll();
        
        return $equipmentCount;
    }
}
