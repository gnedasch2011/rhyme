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
        ['label' => 'Курсы', 'url' => ['/tasks/course']],
        ['label' => 'Дни', 'url' => ['/tasks/tasks']], //тут будет название дня, теория видео и сочетание упражнений
        ['label' => 'Типы упражнений', 'url' => ['/type_exercises/default']],//тесты, комиксы, собрать вопросы
        ['label' => 'Конструктор предложений', 'url' => ['/']],//вопросы, тип теста, правильный вариант ответа


        ['label' => 'Тесты', 'url' => ['/']],//вопросы, тип теста, правильный вариант ответа
        ['label' => 'Комиксы', 'url' => ['/']], //файлы комиксов и привязка к
        ['label' => 'Составить предложение', 'url' => ['/']], //файлы комиксов и привязка к
        ['label' => 'Вставить пропущенные слова', 'url' => ['/']], //файлы комиксов и привязка к
        ['label' => 'Проверка упражнений', 'url' => ['']],


    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Курсы', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Дни', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
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
