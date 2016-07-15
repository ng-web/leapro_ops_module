<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $start_time
 * @property string $end_date
 * @property string $end_time
 * @property integer $recurring
 * @property integer $period
 * @property integer $type
 * @property integer $job_id
 * @property integer $employee_id
 * @property integer $fleet_id
 * @property integer $profile_id
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'start_date'], 'required'],
            [['description'], 'string'],
            [['start_date', 'start_time', 'end_date', 'end_time'], 'safe'],
            [['recurring', 'period', 'type', 'job_id', 'employee_id', 'fleet_id', 'profile_id'], 'integer'],
            [['title'], 'string', 'max' => 32],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'profile_id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'job_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['fleet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fleet::className(), 'targetAttribute' => ['fleet_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'end_date' => 'End Date',
            'end_time' => 'End Time',
            'recurring' => 'Recurring',
            'period' => 'Period',
            'type' => 'Type',
            'job_id' => 'Job ID',
            'employee_id' => 'Employee ID',
            'fleet_id' => 'Fleet ID',
            'profile_id' => 'Profile ID',
        ];
    }
}
