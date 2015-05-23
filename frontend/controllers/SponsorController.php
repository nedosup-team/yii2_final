<?php

namespace frontend\controllers;

use common\models\Sponsor;

class SponsorController extends \yii\web\Controller {

	public $modelClass = 'common\models\Sponsor';

	public function actionAdd()
	{
		$model           = new Sponsor();
		$model->event_id = (int) \Yii::$app->request->post()['event_id'];
		$model->user_id  = (int) \Yii::$app->getUser()->getId();

		$model->validate();

		$model->save();

		return $this->redirect(['/event/view', 'id' => $model->event_id]);

	}

}
