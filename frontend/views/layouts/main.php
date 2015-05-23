<?php
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $content string */
$model = new \common\models\LoginForm();
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="global-wrap">
    <div id="header">
        <div class="logo"><a href="/"><img src="/images/logo.png" alt=""></a></div>
        <div class="login">
            <?php if (Yii::$app->user->isGuest) : ?>
                <?php echo \nodge\eauth\Widget::widget(array('action' => 'site/login')); ?>
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => '/site/login', 'method' => 'post']); ?>
                <label for="login">Логин</label>
                <input type="text" name="LoginForm[username]" id="login">
                <label for="password">Пароль</label>
                <input type="password" name="LoginForm[password]" id="password">
                <input type="submit" value="Войти">
                <?php ActiveForm::end(); ?>
                <a href="<?= \yii\helpers\Url::toRoute('/site/signup') ?>">Регистрация</a>
            <?php else : ?>
                <?php $form = ActiveForm::begin(['action' => '/site/logout', 'method' => 'post']); ?>
                <button class="btn btn-danger">Выйти (<?= Yii::$app->user->identity->username ?>)</button>
                <?php ActiveForm::end(); ?>

            <?php endif; ?>

        </div>
	    <?php if (Yii::$app->controller->id == 'event'): ?>
		    <button id='go' class="go">GO</button>

	    <?php endif; ?>

    </div>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
<?php $this->endBody() ?>
<script>
	jQuery('#go').on('click', function (e) {
		e.preventDefault();

		jQuery.ajax({
			url: "http://localhost:8888/participant/create",
			method: 'POST',
			data: {
				event_id: window.event_id,
				user_id: <?= Yii::$app->getUser()->getId()?>
			},
			success: function (data) {
				console.log(data);
			}
		})
	})
</script>
</body>
</html>
<?php $this->endPage() ?>
