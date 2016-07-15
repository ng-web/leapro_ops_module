<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pmi_activity".
 *
 * @property integer $id
 * @property integer $pest
 * @property integer $activity_type
 * @property integer $count
 * @property string $comments
 * @property integer $action
 * @property integer $area_id
 * @property integer $pmi_id
 * 
 * @property PmiReport $pmi
 * @property Pest $pest
 * @property Area $area
 */
class PmiActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pmi_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pest_id', 'activity_type', 'count', 'action', 'area_id', 'pmi_id'], 'integer'],
            [['comments'], 'string'],
            [['pmi_id'], 'exist', 'skipOnError' => true, 'targetClass' => PmiReport::className(), 'targetAttribute' => ['pmi_id' => 'pmi_id']],
            [['pest_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pest::className(), 'targetAttribute' => ['pest_id' => 'pest_id']],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'area_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pest_id' => 'Pest',
            'activity_type' => 'Activity Type',
            'count' => 'Count',
            'comments' => 'Comments',
            'action' => 'Action',
            'area_id' => 'Area ID',
            'pmi_id' => 'Pmi ID',
        ];
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmi()
    {
        return $this->hasOne(PmiReport::className(), ['pmi_id' => 'pmi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPest()
    {
        return $this->hasOne(Pest::className(), ['pest_id' => 'pest_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['area_id' => 'area_id']);
    }
}
