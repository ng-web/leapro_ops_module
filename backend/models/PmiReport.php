<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pmi_report".
 *
 * @property integer $pmi_id
 * @property string $pmi_docnum
 * @property string $approved_by
 * @property string $verified_by
 * @property string $pmi_date
 * @property integer $address_id
 * @property integer $job_id
 * @property integer $employee_id
 * 
 * @property PmiActivity[] $pmiActivities
 * @property Address $address
 * @property Job $job
 * @property Employee $employee
 */
class PmiReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pmi_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pmi_docnum', 'pmi_date'], 'required'],
            [['pmi_date'], 'safe'],
            [['address_id', 'job_id', 'employee_id'], 'integer'],
            [['pmi_docnum'], 'string', 'max' => 32],
            [['approved_by', 'verified_by'], 'string', 'max' => 255],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'address_id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'job_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pmi_id' => 'Pmi ID',
            'pmi_docnum' => 'Pmi Docnum',
            'approved_by' => 'Approved By',
            'verified_by' => 'Verified By',
            'pmi_date' => 'Pmi Date',
            'address_id' => 'Address ID',
            'job_id' => 'Job ID',
            'employee_id' => 'Employee ID',
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
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }
}
