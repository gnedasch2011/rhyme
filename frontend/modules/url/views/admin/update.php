<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\url\model\Url */

$this->title = 'Update Url: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Urls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="url-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
