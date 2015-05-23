<?php

namespace frontend\controllers;

use common\models\EventParticipant;

class ParticipantController extends \yii\web\Controller
{
    public $modelClass = 'common\models\EventParticipant';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'create' => [
                'class' => 'yii\rest\CreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return [
            'create' => ['POST'],
        ];
    }


    public function actionCreate()
    {
        die(json_encode(['success']));
    }

    /**
     * Checks the privilege of the current user.
     *
     * This method should be overridden to check whether the current user has the privilege
     * to run the specified action against the specified data model.
     * If the user does not have access, a [[ForbiddenHttpException]] should be thrown.
     *
     * @param string $action the ID of the action to be executed
     * @param object $model the model to be accessed. If null, it means no specific model is being accessed.
     * @param array $params additional parameters
     * @throws ForbiddenHttpException if the user does not have access
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        $user_id = \Yii::$app->request->post('user_id');
        $event_id = \Yii::$app->request->post('event_id');
        $relation = EventParticipant::find()->where(['user_id'=>$user_id, 'event_id'=>$event_id])->asArray()->one();

//        var_dump($user_id, $event_id, $relation); die;

        if (null !== $relation) {
            die(json_encode(['exist']));
        }

//        if ('create' != $action) {
//            return new ForbiddenHttpException('Нет доступа', 1);
//        }
    }

}
