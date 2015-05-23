<?php
/* @var $this yii\web\View */
/* @var $categories array */
$this->title = 'My Yii Application';
?>

<div class="header-steps text-center">
    <div class="row">
        <div class="step_1 small-2 small-offset-3 columns active"><span>1</span></div>
        <div class="step_2 small-2 columns"><span>2</span></div>
        <div class="step_3 small-2 end columns"><span>3</span></div>
    </div>
</div>

<div class="site-index">

    <div class="body-content">
        <a id="test_test" href="#">Test</a>

        <div class="first-step">
            <div class="row">
                <div class="small-4 small-centered columns">
                    <?php $form = \yii\widgets\ActiveForm::begin(['action' => '/category', 'method' => 'get']); ?>
                        <label>Що вас цікавить?
              <span class="row">
                <span class="small-10 columns">
                   <?= \yii\helpers\Html::dropDownList('category_id', false, $categories) ?>
                </span>
                <span class="small-2 columns">
                    <span class="submit-container">
                  <input type="submit" value="GO">
                </span>
                </span>
              </span>
                        </label>
                    <?php \yii\widgets\ActiveForm::end(); ?>
                    <a href="/event" class="button round">Побачити все</a>
                </div>
            </div>
        </div>
    </div>
</div>
