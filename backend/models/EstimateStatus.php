<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estimate_status".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $color
 */
class EstimateStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estimate_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['color'], 'string', 'max' => 16],
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
            'description' => 'Description',
            'color' => 'Color',
        ];
    }
}
