<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="user-profile">
        <div class="row">
            <div class="small-3 columns">
                <img src="http://placehold.it/400x400&amp;text=[img]">
                <p><strong><?= $model->username ?></strong></p>
            </div>
            <div class="small-9 columns">

                <div class="row"><h2>Записан на события:</h2></div>
                <?php foreach ($events as $event): ?>
                <div class="row">

                        <?php $item = \common\models\Event::find()->where(['id'=>$event['event_id']])->asArray()->one() ?>
                        <div class="small-2 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                        <div class="small-8 columns">
                            <p><strong><?= $item['title'] ?></strong><br> <?= $item['description'] ?></p>
                        </div>
                        <div class="columns small-2">
                            <a href="/event/<?= $item['id'] ?>" class="button round"> see</a>
                        </div>
                </div>
                <hr>
                <?php endforeach ?>

            </div>
        </div>
    </div>

</div>
