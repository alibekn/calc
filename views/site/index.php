<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Платежи';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6 text-center">
                <h2>Посмотреть все платежи</h2>
                <p><a class="btn btn-lg btn-success" href="<?= Url::to(['payment/index'])?>">Таблица платежей</a></p>
            </div>
            <div class="col-lg-6 text-center">
                <h2>Создать новый платёж</h2>
                <p><a class="btn btn-lg btn-success" href="<?= Url::to(['payment/create'])?>">Создать новый платёж</a></p>
            </div>
        </div>


    </div>
</div>
