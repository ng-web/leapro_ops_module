<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $task_id
 * @property string $task_name
 * @property string $task_desc
 * @property integer $task_completed
 * @property integer $project_id
 * @property string $task_due_date
 * @property string $task_created_date
 * @property string $task_updated_date
 *
 * @property Project $project
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_name'], 'required'],
            [['task_desc'], 'string'],
            [['task_completed', 'project_id'], 'integer'],
            [['task_due_date', 'task_created_date', 'task_updated_date'], 'safe'],
            [['task_name'], 'string', 'max' => 128],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'task_name' => 'Task Name',
            'task_desc' => 'Task Desc',
            'task_completed' => 'Task Completed',
            'project_id' => 'Project ID',
            'task_due_date' => 'Task Due Date',
            'task_created_date' => 'Task Created Date',
            'task_updated_date' => 'Task Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }
}
