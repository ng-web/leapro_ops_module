<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $project_id
 * @property string $project_name
 * @property string $project_desc
 * @property integer $project_completed
 * @property string $project_due_date
 * @property string $project_created_date
 * @property string $project_updated_date
 *
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_desc'], 'string'],
            [['project_completed'], 'integer'],
            [['project_due_date', 'project_created_date', 'project_updated_date'], 'safe'],
            [['project_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'project_name' => 'Project Name',
            'project_desc' => 'Project Desc',
            'project_completed' => 'Project Completed',
            'project_due_date' => 'Project Due Date',
            'project_created_date' => 'Project Created Date',
            'project_updated_date' => 'Project Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'project_id']);
    }
}
