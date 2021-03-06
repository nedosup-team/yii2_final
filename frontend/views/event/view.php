<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Event */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$user = $model->getAuthor()->one();
?>
<div class="third-step">
	<div class="content">
		<div class="row">
			<div class="small-3 columns">
				<div class="author">
					<h4>Автор:</h4>
					<img src="http://placehold.it/80x80&amp;text=[img]">

					<p><?= $user->username ?></p>
				</div>
				<div class="participants">
					<h4>На это событие идут:</h4>
					<div class="row">
                    <?php foreach ($model->getEventParticipantsList() as $participante): ?>
                        <?php $user = \common\models\User::find()->where(['id' => $participante['user_id']])->asArray()->one() ?>
                        <div class="small-4 columns"><img src="http://placehold.it/80x80&amp;text=[img]">
                            <a href="/user/<?= $participante['user_id'] ?>"><?= $user['username'] ?></a></div>
                    <?php endforeach ?>
					</div>
				</div>

			</div>
			<div class="small-6 columns">
				<div class="description">
					<?php if ($model->isAuthor()): ?>
						<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
						<?= Html::a('Delete', ['delete', 'id' => $model->id], [
							'class' => 'btn btn-danger',
							'data'  => [
								'confirm' => 'Are you sure you want to delete this item?',
								'method'  => 'post',
							],
						]) ?>
					<?php endif; ?>
					<h1><?= Html::encode($this->title) ?></h1>

					<p><?= $model->content ?></p>
					<?php $sponsors = $model->getSponsors()->all();
					if ($sponsors): ?>
						<h2>Спонсоры</h2>
						<?php foreach ($sponsors as $sponsor) {
							echo $sponsor->getUser()->username . ', ';
						}
					endif;
					?>
					<?php $form = \yii\widgets\ActiveForm::begin(['action' => ['sponsor/add']]); ?>
					<?= $form->field($model, 'event_id')->hiddenInput([
						'value' => $model->id,
						'name'  => 'event_id'
					])->label('') ?>
					<?= Html::submitButton('Стать спонсором', ['class' => 'button round btn-primary']) ?>
					<?php \yii\widgets\ActiveForm::end(); ?>
				</div>

				<?php if ($model->isAuthor()): ?>
					<h3>Добавить новость </h3>
					<div class="create-news">
						<?= $this->render('@frontend/views/news/_form', [
							'model'    => new \common\models\News(),
							'event_id' => $model->id
						]) ?>
					</div>
				<?php endif; ?>
				<div class="comments">
					<h4>Коментарии</h4>
					<div class="fb-comments" data-href="<?= \yii\helpers\Url::to(Yii::$app->request->getUrl(),true) ?>" data-numposts="5" data-colorscheme="light"></div>
				</div>
			</div>
			<div class="small-3 columns">
				<div class="socials">
					<div class="icon-bar three-up">
						<a class="item" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(\yii\helpers\Url::to(Yii::$app->request->getUrl(),true)) ?>">
							<i class="fi-facebook">fb</i>
						</a>
						<a class="item" target="_blank" href="https://twitter.com/home?status=<?= urlencode(\yii\helpers\Url::to(Yii::$app->request->getUrl(),true)) ?>">
							<i class="fi-twitter">tw</i>
						</a>
						<a class="item" target="_blank" href="https://plus.google.com/share?url=<?= urlencode(\yii\helpers\Url::to(Yii::$app->request->getUrl(),true)) ?>">
							<i class="fi-google">g+</i>
						</a>
					</div>

				</div>
				<?php $news = $model->getNews()->all() ?>
				<?php if (count($news)): ?>
					<div class="news">
						<?php foreach ($news as $item): ?>
							<div class="row small-collapse">
								<div class="small-2 columns"><img src="http://placehold.it/40x40&amp;text=[img]"></div>
								<div class="small-10 columns">
									<p>Author: <strong><?= $item->getAuthor()->one()->username ?></strong></p>

									<h3><?= $item->title ?></h3>

									<p><?= $item->description ?></p>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		window.event_id = '<?= $model->id ?>';
	</script>

</div>