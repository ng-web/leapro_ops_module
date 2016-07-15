<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bsr_header".
 *
 * @property integer $bsr_id
 * @property string $bsr_docnum
 * @property string $bsr_approvedby
 * @property string $bsr_verifiedby
 * @property string $bsr_date
 * @property integer $job_id
 * @property integer $employee_id
 */
class BsrHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bsr_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bsr_docnum', 'bsr_date', 'employee_id'], 'required'],
            [['bsr_date'], 'safe'],
            [['job_id', 'employee_id'], 'integer'],
            [['bsr_docnum'], 'string', 'max' => 32],
            [['bsr_approvedby', 'bsr_verifiedby'], 'string', 'max' => 255],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'job_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bsr_id' => 'Bsr ID',
            'bsr_docnum' => 'Report Number',
            'bsr_approvedby' => 'Approved by',
            'bsr_verifiedby' => 'Verified by',
            'bsr_date' => 'Report Date',
            'job_id' => 'Job No.',
            'employee_id' => 'Employee ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBsrActivity()
    {
        return $this->hasMany(BsrActivity::className(), ['bsr_id' => 'bsr_id']);
    }
}
