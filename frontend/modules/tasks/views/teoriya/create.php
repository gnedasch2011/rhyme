<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\tasks\models\Teoriya */

$this->title = 'Create Teoriya';
$this->params['breadcrumbs'][] = ['label' => 'Teoriyas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teoriya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
