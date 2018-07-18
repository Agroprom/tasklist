<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_tag".
 *
 * @property string $task_id
 * @property int $tag_id
 */
class TaskTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'tag_id'], 'required'],
            [['tag_id'], 'integer'],
            [['task_id'], 'string', 'max' => 36],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
