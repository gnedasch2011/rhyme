<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSentence */

$this->title = 'Update Group Sentence: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Group Sentences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="group-sentence-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
