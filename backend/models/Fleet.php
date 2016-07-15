<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fleet".
 *
 * @property integer $id
 * @property string $make
 * @property string $model
 * @property string $vin
 * @property string $license
 * @property string $description
 * @property string $year
 * @property string $purchase_year
 * @property integer $starting_miles
 */
class Fleet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fleet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['make', 'model', 'year'], 'required'],
            [['description'], 'string'],
            [['year', 'purchase_year'], 'safe'],
            [['starting_miles'], 'integer'],
            [['make', 'model'], 'string', 'max' => 64],
            [['vin'], 'string', 'max' => 128],
            [['license'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'make' => 'Make',
            'model' => 'Model',
            'vin' => 'Vin',
            'license' => 'License',
            'description' => 'Description',
            'year' => 'Year',
            'purchase_year' => 'Purchase Year',
            'starting_miles' => 'Starting Miles',
        ];
    }
}
