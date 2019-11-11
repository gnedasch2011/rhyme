<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\type_exercises\modules\sentence\models\SentenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sentences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sentence-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sentence', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'desc',
            'type_exercises_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
