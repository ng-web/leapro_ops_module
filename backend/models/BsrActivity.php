<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bsr_activity".
 *
 * @property integer $bs_id
 * @property integer $bs_status
 * @property integer $bs_qty
 * @property integer $weight
 * @property integer $number_seen
 * @property integer $employee_id
 * @property integer $bs_condition
 * @property string $bs_comments
 * @property integer $bsr_id
 * @property integer $equipment_id
 * @property string $bs_date
 */
class BsrActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bsr_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bs_status', 'bs_condition', 'equipment_id'], 'required'],
            [['bs_status', 'bs_qty', 'weight', 'number_seen', 'employee_id', 'bs_condition', 'bsr_id', 'equipment_id'], 'integer'],
            [['bs_comments'], 'string'],
            [['bs_date'], 'safe']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bs_id' => 'ID',
            'bs_status' => 'Status',
            'bs_qty' => 'Qty Replaced',
            'weight' => 'Weight',
            'number_seen' => 'Number Seen',
            'employee_id' => 'Technician',
            'bs_condition' => 'Condition',
            'bs_comments' => 'Comments',
            'bsr_id' => 'Report No.',
            'equipment_id' => 'Equipment No.',
            'bs_date' => 'Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBsrHeader()
    {
        return $this->hasOne(BsrHeader::className(), ['bsr_id' => 'bsr_id']);
    }
    
    //Employee relationship
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }
    
    //Equipment relationship
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['equipment_id' => 'equipment_id']);
    }
}
