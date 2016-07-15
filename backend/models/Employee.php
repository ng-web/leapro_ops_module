<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $employee_id
 * @property string $employee_name
 * @property string $employee_phone
 * @property string $employee_email
 * @property string $employee_hire_date
 * @property string $employee_end_date
 * @property string $employee_birth_date
 * @property string $employee_gender
 * @property string $employee_license_number
 * @property string $employee_notes
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_name', 'employee_phone', 'employee_hire_date', 'employee_gender'], 'required'],
            [['employee_hire_date', 'employee_end_date', 'employee_birth_date'], 'safe'],
            [['employee_gender', 'employee_notes'], 'string'],
            [['employee_name'], 'string', 'max' => 50],
            [['employee_phone', 'employee_license_number'], 'string', 'max' => 20],
            [['employee_email'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'employee_name' => 'Employee Name',
            'employee_phone' => 'Employee Phone',
            'employee_email' => 'Employee Email',
            'employee_hire_date' => 'Employee Hire Date',
            'employee_end_date' => 'Employee End Date',
            'employee_birth_date' => 'Employee Birth Date',
            'employee_gender' => 'Employee Gender',
            'employee_license_number' => 'Employee License Number',
            'employee_notes' => 'Employee Notes',
        ];
    }
}
