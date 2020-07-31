<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\tasks\models\TeoriyaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teoriyas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teoriya-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Teoriya', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'template',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
