<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSentence */

$this->title = 'Create Group Sentence';
$this->params['breadcrumbs'][] = ['label' => 'Group Sentences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-sentence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
