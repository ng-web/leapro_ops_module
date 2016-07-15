<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "treatment".
 *
 * @property integer $id
 * @property string $name
 * @property string $brand
 * @property string $ingredient
 * @property string $dilution
 * @property string $application
 * @property string $cost
 * @property string $description
 */
class Treatment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['cost'], 'number'],
            [['description'], 'string'],
            [['name', 'brand', 'ingredient', 'dilution', 'application'], 'string', 'max' => 64],
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
            'brand' => 'Brand',
            'ingredient' => 'Ingredient',
            'dilution' => 'Dilution',
            'application' => 'Application',
            'cost' => 'Cost',
            'description' => 'Description',
        ];
    }
}
