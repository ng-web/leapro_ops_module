<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $event_id
 * @property string $event_title
 * @property string $event_description
 * @property string $event_start
 * @property string $event_end
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_title', 'event_start'], 'required'],
            [['event_description'], 'string'],
            [['event_start', 'event_end'], 'safe'],
            [['event_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'event_title' => 'Event Title',
            'event_description' => 'Event Description',
            'event_start' => 'Event Start',
            'event_end' => 'Event End',
        ];
    }
}
