<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pest".
 *
 * @property integer $pest_id
 * @property string $pest_name
 * @property string $pest_description
 */
class Pest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pest_description'], 'string'],
            [['pest_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pest_id' => 'Pest ID',
            'pest_name' => 'Pest Name',
            'pest_description' => 'Pest Description',
        ];
    }
}
