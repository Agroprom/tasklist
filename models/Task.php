<?php

namespace app\models;

use Yii;
use dosamigos\taggable\Taggable;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $priority
 * @property int $status
 */
class Task extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'priority'], 'required'],
            [['priority', 'status'], 'integer'],
            [['uuid'], 'string', 'max' => 36],
            [['name'], 'string', 'max' => 56],
            [['uuid'], 'unique'],
            [['tagNames'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'name' => 'Title',
            'priority' => 'Priority',
            'status' => 'Status',
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => Taggable::class,
            ],
        ];
    }

    public function getTags() {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('task_tag', ['task_id' => 'id']);
    }

}
