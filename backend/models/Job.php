<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property integer $job_id
 * @property string $job_number
 * @property integer $address_id
 * @property string $job_summary
 * @property string $job_receiveddate
 * @property string $job_createddate
 * @property integer $job_treatment_general
 * @property integer $job_treatment_pasting
 * @property integer $job_treatment_misting
 * @property integer $job_treatment_fogging
 * @property integer $job_treatment_baiting
 * @property integer $job_code
 * @property integer $customer_id
 * @property integer $contact_id
 * @property integer $profile_id
 * @property string $job_notes
 *
 * @property Profile $profile
 * @property Contact $contact
 * @property Customer $customer
 * @property Address $address
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_number', 'address_id', 'job_summary', 'job_receiveddate', 'job_createddate', 'job_code', 'contact_id'], 'required'],
            [['address_id', 'job_treatment_general', 'job_treatment_pasting', 'job_treatment_misting', 'job_treatment_fogging', 'job_treatment_baiting', 'job_code', 'customer_id', 'contact_id', 'profile_id'], 'integer'],
            [['job_receiveddate', 'job_createddate'], 'safe'],
            [['job_notes'], 'string'],
            [['job_number'], 'string', 'max' => 11],
            [['job_summary'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => 'Job ID',
            'job_number' => 'Job Number',
            'address_id' => 'Address ID',
            'job_summary' => 'Job Summary',
            'job_receiveddate' => 'Job Receiveddate',
            'job_createddate' => 'Job Createddate',
            'job_treatment_general' => 'Job Treatment General',
            'job_treatment_pasting' => 'Job Treatment Pasting',
            'job_treatment_misting' => 'Job Treatment Misting',
            'job_treatment_fogging' => 'Job Treatment Fogging',
            'job_treatment_baiting' => 'Job Treatment Baiting',
            'job_code' => 'Job Code',
            'customer_id' => 'Customer ID',
            'contact_id' => 'Contact ID',
            'profile_id' => 'Profile ID',
            'job_notes' => 'Job Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['profile_id' => 'profile_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::className(), ['contact_id' => 'contact_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'address_id']);
    }
}
