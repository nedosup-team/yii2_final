<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $description
 * @property integer $status
 * @property integer $author_id
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $lat
 * @property string $lng
 * @property string $address
 *
 * @property EventParticipant[] $eventParticipants
 * @property EventSpeaker[] $eventSpeakers
 * @property EventType[] $eventTypes
 * @property Categories $category
 * @property User $author
 * @property News[] $news
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
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content', 'description', 'lat', 'lng', 'address'], 'string'],
            [['status', 'author_id', 'category_id'], 'integer'],
            [['title'], 'string', 'max' => 255]
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
            'content' => 'Content',
            'description' => 'Description',
            'category_id' => 'Категория',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getEventParticipants()
//    {
//        return $this->hasMany(EventParticipant::className(), ['event_id' => 'id']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getEventSpeakers()
//    {
//        return $this->hasMany(EventSpeaker::className(), ['event_id' => 'id']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getEventTypes()
//    {
//        return $this->hasMany(EventType::className(), ['event_id' => 'id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['event_id' => 'id']);
    }
}
