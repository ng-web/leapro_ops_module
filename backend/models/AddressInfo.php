<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "address_info".
 *
 * @property integer $addinfo_id
 * @property integer $addinfo_name
 * @property integer $addinfo_province
 * @property integer $addinfo_zip
 */
class AddressInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addinfo_name', 'addinfo_province', 'addinfo_zip'], 'required'],
            [['addinfo_name', 'addinfo_province', 'addinfo_zip'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'addinfo_id' => 'Addinfo ID',
            'addinfo_name' => 'Addinfo Name',
            'addinfo_province' => 'Addinfo Province',
            'addinfo_zip' => 'Addinfo Zip',
        ];
    }
}
