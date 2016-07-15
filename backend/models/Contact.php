<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $contact_id
 * @property string $contact_name
 * @property string $contact_number
 * @property string $contact_cell
 * @property string $contact_fax
 * @property string $contact_email
 * @property integer $address_id
 *
 * @property Address $address
 * @property Profile[] $profiles
 * @property ContactLink[] $contactLinks
 * @property Job[] $jobs
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_name', 'contact_number', 'address_id'], 'required'],
            [['address_id'], 'integer'],
            [['contact_name', 'contact_email'], 'string', 'max' => 128],
            [['contact_number', 'contact_cell', 'contact_fax'], 'string', 'max' => 32],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'address_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contact_id' => 'Contact ID',
            'contact_name' => 'Contact Name',
            'contact_number' => 'Contact Number',
            'contact_cell' => 'Contact Cell',
            'contact_fax' => 'Contact Fax',
            'contact_email' => 'Contact Email',
            'address_id' => 'Address ID',
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
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['contact_id' => 'contact_id']);
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactLinks()
    {
        return $this->hasMany(ContactLink::className(), ['contact_id' => 'contact_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['contact_id' => 'contact_id']);
    }
}
