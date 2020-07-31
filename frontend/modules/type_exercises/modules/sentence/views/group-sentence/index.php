<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSentenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Sentences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-sentence-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Group Sentence', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',

            'type_exercises_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
