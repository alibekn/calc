<?php

use app\models\Payment;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$this->title = $model->payment_number;
$this->params['breadcrumbs'][] = ['label' => 'Платежи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($model->payment_number) ?></h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Номер платежа</th>
            <th>Дата платежа</th>
            <th>Общая сумма платежа (ежемесячный платеж)</th>
            <th>Сумму погашаемых процентов</th>
            <th>Сумма погашаемого основного долга</th>
            <th>Остаток основного долга по займу на текущую дату (дату платежа)</th>
        </tr>
        </thead>
        <tbody>
        <?php $leftSum = $model->sum;
        $totalPercent = 0;
        $totalPayment = 0;
        for ($i = 1; $i <= $model->months; $i++) :
            $leftSum = $leftSum - $model->countPayment($i);
            $totalPercent = $totalPercent + $model->countPercent($i);
            $totalPayment = $totalPayment + $model->countPayment($i);
            ?>
        <tr>
            <th><?= $i ?></th>
            <td><?= date("d.m.Y", strtotime("+" . $i . "month", $model->date)) ?></td>
            <td><?= $model->monthlyPayment() ?></td>
            <td><?= $model->PRPLT($i) ?></td>
            <td><?= $model->OSPLT($i) ?></td>
            <td><?= round($leftSum, 2) ?></td>
        </tr>
        <?php endfor; ?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="2">Итого</th>
            <th><?= $model->totalPayment() ?></th>
            <th><?= $totalPercent ?></th>
            <th><?= $totalPayment ?></th>
        </tr>
        </tfoot>
    </table>

</div>