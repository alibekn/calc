<?php

use common\helpers\CourierHelper;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="post-index">
    <h1>Создать новый платёж</h1>

    <?php $form = ActiveForm::begin([
        'validateOnChange' => false,
    ]); ?>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'sum')->input('number', ['min' => 0]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'months')->input('number', ['min' => 0]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'rate')->input('number', ['min' => 0]) ?>
            </div>
        </div>

    <?= Html::submitButton('Создать платёж', ['class' => 'btn btn__success']) ?>

    <?php ActiveForm::end(); ?>
</div>
