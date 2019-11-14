<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AdminAsset;
use common\widgets\Alert;

AppAsset::register($this);
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">


    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Общее',
            'items' => [
                ['label' => 'Курсы', 'url' => ['/tasks/course']],
                ['label' => 'Дни', 'url' => ['/tasks/tasks']], //тут будет название дня, теория видео и сочетание упражнений
                ['label' => 'Видео', 'url' => ['/tasks/video']], //тут будет название дня, теория видео и сочетание упражнений
                ['label' => 'Теория', 'url' => ['/tasks/tasks']], //тут будет название дня, теория видео и сочетание упражнений
            ],
        ],//вопросы, тип теста, правильный вариант ответ


        ['label' => 'Предложения, используя фразы',
            'items' => [
                ['label' => 'Группа предложений', 'url' => ['/type_exercises/sentence/group-sentence']],//вопросы, тип теста, правильный вариант ответа
                ['label' => 'Предложения и фразы', 'url' => ['/type_exercises/sentence']],//вопросы, тип теста, правильный вариант ответа

            ],
        ],//вопросы, тип теста, правильный вариант от


        ['label' => 'Типы упражнений',
            'items' => [
                ['label' => 'Типы упражнений', 'url' => ' /type_exercises/default'],
                ['label' => 'Сочетания упражнений', 'url' => ['/type_exercises/exercises']],//вопросы, тип теста, правильный вариант ответа
            ],
        ],//вопросы, тип теста, правильный вариант ответа

        ['label' => 'Остальные упражнения',
            'items' => [
                ['label' => 'Тесты', 'url' => ['/']],//вопросы, тип теста, правильный вариант ответа
                ['label' => 'Комиксы', 'url' => ['/']], //файлы комиксов и привязка к
                ['label' => 'Составить предложение, используя слова', 'url' => ['/']], //файлы комиксов и привязка к
                ['label' => 'Вставить пропущенные слова', 'url' => ['/']], //файлы комиксов и привязка к
            ],
        ],//вопросы, тип теста, правильный вариант ответа


    ];


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
