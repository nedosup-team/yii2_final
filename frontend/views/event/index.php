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
        <div class="step_1 small-2 small-offset-3 columns active"><span>1</span></div>
        <div class="step_2 small-2 columns active"><span>2</span></div>
        <div class="step_3 small-2 end columns"><span>3</span></div>
    </div>
</div>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            'description:ntext',
            'status',
            // 'author_id',
            // 'category_id',
            // 'created_at',
            // 'updated_at',
            // 'lat',
            // 'lng',
            // 'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
