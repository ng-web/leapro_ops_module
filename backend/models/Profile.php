<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $profile_id
 * @property integer $customer_id
 * @property integer $profile_medium
 * @property string $profile_other
 * @property string $profile_date
 * @property integer $profile_status
 * @property string $profile_notes
 * @property string $profile_birthdate
 * @property integer $contact_id
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'profile_medium', 'profile_date', 'profile_status', 'contact_id'], 'required'],
            [['customer_id', 'profile_medium', 'profile_status', 'contact_id'], 'integer'],
            [['profile_other', 'profile_notes'], 'string'],
            [['profile_date', 'profile_birthdate'], 'safe'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::className(), 'targetAttribute' => ['contact_id' => 'contact_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => 'Profile ID',
            'customer_id' => 'Customer ID',
            'profile_medium' => 'Profile Medium',
            'profile_other' => 'Profile Other',
            'profile_date' => 'Profile Date',
            'profile_status' => 'Profile Status',
            'profile_notes' => 'Profile Notes',
            'profile_birthdate' => 'Profile Birthdate',
            'contact_id' => 'Contact ID',
        ];
    }
}
