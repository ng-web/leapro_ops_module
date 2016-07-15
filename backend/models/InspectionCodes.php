<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inspection_codes".
 *
 * @property integer $id
 * @property string $name
 * @property string $priority
 * @property string $description
 */
class InspectionCodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inspection_codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['priority'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'priority' => 'Priority',
            'description' => 'Description',
        ];
    }
}
