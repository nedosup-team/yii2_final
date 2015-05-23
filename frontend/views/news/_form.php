<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">


    <?php if (isset($event_id)): ?>
        <?php $form = ActiveForm::begin(['action' => \yii\helpers\Url::toRoute('news/create')]); ?>
        <?= $form->field($model, 'event_id')->hiddenInput(['value' => $event_id])->label(false) ?>
    <?php else: ?>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'event_id')->dropDownList($model->getProjectsList()) ?>
    <?php endif ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
