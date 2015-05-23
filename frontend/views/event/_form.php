<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'status')->dropDownList([
		$model::STATUS_OPEN   => 'Open',
		$model::STATUS_CLOSED => 'Closed'
	]) ?>

	<?= $form->field($model, 'category_id')->dropDownList($model->getCategoriesList())->label('Category') ?>

	<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
