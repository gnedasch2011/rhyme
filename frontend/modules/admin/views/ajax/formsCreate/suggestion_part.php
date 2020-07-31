<?php

use yii\helpers\Html;

; ?>

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <?= Html::input('text', "$formName" . "[$positon]" . "[text]", null, ['class' => 'form-control']) ?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?= Html::input('text', "$formName" . "[$positon]" ."[position]", null, [
                'class' => 'form-control',
                'placeholder' => $positon,

        ]) ?>
    </div>
</div>