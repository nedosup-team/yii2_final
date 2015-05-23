<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Event */

$this->title                   = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data'  => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method'  => 'post',
			],
		]) ?>
	</p>
	<?= DetailView::widget([
		'model'      => $model,
		'attributes' => [
			'title',
			'content:ntext',
			'description:ntext',
			[
				'attribute' => 'status',
				'label'     => 'Статус',
				'value'     => $model->getStatusName(),
			],
			[
				'attribute' => 'author_id',
				'label'     => 'Автор',
				'value'     => $model->getAuthor()->one()->username,
			],
			[
				'attribute' => 'category_id',
				'label'     => 'Категория',
				'value'     => $model->getCategoryName(),
			],
			'created_at:datetime',
			'updated_at:datetime',
			/*'lat',
			'lng',*/
			'address',
		],
	]) ?>
	<?php if ($model->isAuthor()): ?>
		<div class="create-news">
			<?= $this->render('@frontend/views/news/_form', [
				'model'    => new \common\models\News(),
				'event_id' => $model->id
			]) ?>
		</div>
	<?php endif; ?>
	<div>
		<?php $news = $model->getNews()->all() ?>

		<?php if (count($news)): ?>
			<h4>Опубликованные новости</h4>
			<?php foreach ($news as $item): ?>
				<?= DetailView::widget([
					'model'      => $item,
					'attributes' => [
						'title',
						'created_at:datetime',
						[
							'attribute' => 'author_id',
							'value'     => $model->getAuthor()->one()->username,
						],
						'description:ntext',
						[
							'attribute' => 'actions',
							'format'    => 'raw',
							'value'     => Html::a('Изменить', [
									'news/edit',
									'id' => $item->id
								], ['class' => 'btn btn-primary'])
							               . '  ' .
							               Html::a('Удалить', ['news/delete', 'id' => $item->id], [
								               'class' => 'btn btn-danger',
								               'data'  => [
									               'confirm' => 'Точно удаляем?',
									               'method'  => 'post',
								               ],
							               ])
						],
					],
				]) ?>
			<?php endforeach ?>
		<?php endif ?>
	</div>
	<div>
		<?php $sponsors = $model->getSponsors()->all();
		foreach($sponsors as $sponsor){
			echo $sponsor->getUser()->username .', ';
		}
		?>
		<?php $form = \yii\widgets\ActiveForm::begin(['action' => ['sponsor/add']]); ?>
		<?= $form->field($model, 'event_id')->hiddenInput(['value' => $model->id, 'name' => 'event_id'])->label('') ?>
		<?= Html::submitButton('Стать спонсором', ['class' => 'btn btn-primary']) ?>
		<?php \yii\widgets\ActiveForm::end(); ?>
	</div>

</div>
