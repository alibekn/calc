<?php

use app\models\Payment;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Платежи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новый платёж', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class'=>'table table-striped table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'payment_number',
                'format' => 'raw',
                'value' => function (Payment $model) {
                    return Html::a($model->payment_number, ['view', 'id' => $model->id]);
                }

            ],
            [
                'attribute' => 'date',
                'value' => function (Payment $model) {
                    return Yii::$app->formatter->asDatetime($model->date, $format = 'php:d.m.Y');
                }

            ],
            [
                'attribute' => 'sum',
                'value' => function (Payment $model) {
                    return $model->sum;
                }

            ],
            [
                'attribute' => 'months',
                'value' => function (Payment $model) {
                    return $model->months;
                }

            ],
            [
                'attribute' => 'rate',
                'value' => function (Payment $model) {
                    return $model->rate;
                }

            ],
        ],
    ]); ?>


</div>