<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estimate".
 *
 * @property integer $id
 * @property string $doc_num
 * @property string $summary
 * @property string $amount
 * @property string $issue_date
 * @property string $followup_date
 * @property integer $status_id
 * @property integer $substat_id
 * @property integer $treatment_id
 * @property integer $campaign_id
 * @property integer $customer_id
 * @property integer $address_id
 * @property integer $employee_id
 *
 * @property Employee $employee
 * @property EstimateStatus $status
 * @property EstimateSubstat $substat
 * @property Treatment $treatment
 * @property AdvertisingCampaign $campaign
 * @property Customer $customer
 * @property Address $address
 */
class Estimate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estimate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doc_num'], 'required'],
            [['summary'], 'string'],
            [['amount'], 'number'],
            [['issue_date', 'followup_date'], 'safe'],
            [['status_id', 'substat_id', 'treatment_id', 'campaign_id', 'customer_id', 'address_id', 'employee_id'], 'integer'],
            [['doc_num'], 'string', 'max' => 64],
            [['substat_id'], 'unique'],
            [['substat_id'], 'unique'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstimateStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['substat_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstimateSubstat::className(), 'targetAttribute' => ['substat_id' => 'id']],
            [['treatment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Treatment::className(), 'targetAttribute' => ['treatment_id' => 'id']],
            [['campaign_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdvertisingCampaign::className(), 'targetAttribute' => ['campaign_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'address_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_num' => 'Doc Num',
            'summary' => 'Summary',
            'amount' => 'Amount',
            'issue_date' => 'Issue Date',
            'followup_date' => 'Followup Date',
            'status_id' => 'Status ID',
            'substat_id' => 'Substat ID',
            'treatment_id' => 'Treatment ID',
            'campaign_id' => 'Campaign ID',
            'customer_id' => 'Customer ID',
            'address_id' => 'Address ID',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(EstimateStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubstat()
    {
        return $this->hasOne(EstimateSubstat::className(), ['id' => 'substat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTreatment()
    {
        return $this->hasOne(Treatment::className(), ['id' => 'treatment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaign()
    {
        return $this->hasOne(AdvertisingCampaign::className(), ['id' => 'campaign_id']);
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
