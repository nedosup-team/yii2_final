<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

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
        <div class="logo"><img src="/images/logo1.png" alt=""></div>
        <div class="login">
            <?php if (Yii::$app->user->isGuest) : ?>
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

        <div class="header-steps text-center">
            <div class="row">
                <div class="small-2 small-offset-3 columns active"><span>1</span></div>
                <div class="small-2 columns"><span>2</span></div>
                <div class="small-2 end columns"><span>3</span></div>
            </div>
        </div>

    </div>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
<?php $this->endBody() ?>
<script>
    jQuery('#test_test').on('click', function(e) {
        e.preventDefault();

        jQuery.ajax({
            url: "http://localhost:8888/participant/create",
            method: 'POST',
            data: {
                event_id: 1,
                user_id: 1
            },
            success: function(data) {
                console.log(data);
            }
        })
    })
</script>
</body>
</html>
<?php $this->endPage() ?>
