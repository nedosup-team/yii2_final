<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header-steps text-center">
    <div class="row">
        <div class="step_1 small-2 small-offset-3 columns"><span>1</span></div>
        <div class="step_2 small-2 columns active"><span>2</span></div>
        <div class="step_3 small-2 end columns"><span>3</span></div>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="events-index">

    <div class="thecond-step">
        <div class="row">

            <div class="small-8 columns small-centered">

                <?php foreach ($items as $item) : ?>
                    <?php // @var $item common\models\Event ?>
                    <div class="row">
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
