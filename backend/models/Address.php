<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $address_id
 * @property string $address_line1
 * @property string $address_line2
 * @property integer $address_province
 * @property integer $address_zip
 * @property integer $address_type
 * @property integer $address_status
 * @property string $address_details
 * @property integer $customer_id
 *
 * @property Customer $customer
 * @property Area[] $areas
 * @property Contact[] $contacts
 * @property ContactLink[] $contactLinks
 * @property Deploy[] $deploys
 * @property Job[] $jobs
 * @property PmiReport[] $pmiReports
 * 
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_line1', 'address_province', 'address_type', 'customer_id'], 'required'],
            [['address_province', 'address_zip', 'address_type', 'address_status', 'customer_id'], 'integer'],
            [['address_details'], 'string'],
            [['address_line1', 'address_line2'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'address_line1' => 'Address Line1',
            'address_line2' => 'Address Line2',
            'address_province' => 'Address Province',
            'address_zip' => 'Address Zip',
            'address_type' => 'Address Type',
            'address_status' => 'Address Status',
            'address_details' => 'Address Details',
            'customer_id' => 'Customer',
        ];
    }
    
    //return name of parish
    public function getParish()
    {
        if ($this->address_province === 0)
        {
            return ('Kingston');
        }
    }
    
    //return customer type
    public function getType()
    {
        if ($this->address_type === 0)
        {
            return ('Commercial');
        }
        else 
        {
            return ('Residential');
        }
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
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeploys()
    {
        return $this->hasMany(Deploy::className(), ['address_id' => 'address_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactLinks()
    {
        return $this->hasMany(ContactLink::className(), ['address_id' => 'address_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmiReports()
    {
        return $this->hasMany(PmiReport::className(), ['address_id' => 'address_id']);
    }
}
