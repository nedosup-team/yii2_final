<?php

namespace frontend\controllers;

use common\models\Sponsor;

class SponsorController extends \yii\web\Controller {

	public $modelClass = 'common\models\Sponsor';

	public function actionAdd()
	{
		$event_id = \Yii::$app->request->post()['event_id'];
		$user_id  = \Yii::$app->getUser()->getId();

		if ( !Sponsor::findOne(['event_id' => $event_id, 'user_id' => $user_id])) {
			$model           = new Sponsor();
			$model->event_id = (int) $event_id;
			$model->user_id  = (int) $user_id;

			$model->validate();

			$model->save();
		}

		return $this->redirect(['/event/view', 'id' => $event_id]);

	}

}
