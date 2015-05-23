<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_sponsor".
 *
 * @property integer $id
 * @property Events  $event_id
 * @property User    $user_id
 */
class Sponsor extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'event_sponsor';
	}


	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id'       => 'ID',
			'event_id' => 'Event ID',
			'user_id'  => 'User ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser()
	{
		return User::findOne(['id' => $this->user_id]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getEvent()
	{
		return $this->hasOne(Events::className(), ['id' => 'event_id']);
	}
}
