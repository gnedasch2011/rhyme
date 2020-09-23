<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$SearchRhyme = new \frontend\models\form\SearchRhyme();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <script src="/js/metrika.js"></script>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <nav class="navbar navbar-default">
                <!-- Brand и toggle сгруппированы для лучшего отображения на мобильных дисплеях -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"></a>
                </div>
                <!-- Соберите навигационные ссылки, формы, и другой контент для переключения -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="/">Рифмы к словам<span class="sr-only"></span></a>
                        <li class=""><a href="/names">Рифмы к именам<span
                                        class="sr-only"></span></a>
                    </ul>
                    <?php

                    use yii\widgets\ActiveForm;

                    $form = ActiveForm::begin([
                        'action' => '/rhyme/index',
                        'options' => ['class' => 'navbar-form navbar-left'],
                    ]) ?>
                    <div class="form-group">
                        <?= $form->field($SearchRhyme, 'query')
                            ->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Поиск',
                            ])->label('');
                        ?>
                    </div>
                    <?= Html::submitButton('Найти', ['class' => 'btn btn-default buttonCenter']) ?>
                    <?php ActiveForm::end() ?>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
    <!-- Yandex.RTB R-A-632107-1 -->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
            // $this is the view object currently being used
            echo Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Рифмы',
                    'url' => Yii::$app->homeUrl,
                    'title' => 'Рифмы',
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
            ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="yandex_rtb_R-A-632107-1"></div>
        </div>
        <?php
        echo common\widgets\micromark\MicromarkWidget::widget([
            'items' => $this->params['breadcrumbs'],
            'template' => 'breadcrubs',
        ]);
        ?>
        <?= $content ?>
    </div>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<style>
    .buttonCenter {
        margin-bottom: 10px;
    }
</style>

<script src="/js/advertising.js"></script>