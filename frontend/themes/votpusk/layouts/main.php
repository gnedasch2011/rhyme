<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

//AppAsset::register($this);
\frontend\themes\votpusk\VotpuskAsset::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="image/x-icon" href="/images/main/favicon/favicon.ico" rel="icon">
    <script src="/js/metrika.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div class="wrapper">
    <?= $this->render('@votpuskView/layouts/block/headers/_header.php'); ?>
    <section class="main_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?= $content; ?>
                </div>
                <div class="col-md-3">
                    <aside>
                        <div>
                            <?= $this->render('@votpuskView/layouts/block/adversting/block_2') ;?>

                        </div>

                        <div class="news_side">
                            <h3><a href="#">Всё про рифму</a></h3>
                            <?php
                            $items = [
							[
                                            'label'=>'Рифмы к словам',
                                            'url'=>'/',
                                    ],
									[
                                            'label'=>'Рифма к именам',
                                            'url'=>'/names',
                                    ],
                                                                              [
                                            'label'=>'Мужская рифма',
                                            'url'=>'/muzhskie-rifmy',
                                    ],
                                     [
                                            'label'=>'Женская рифма',
                                            'url'=>'/zhenskie-rifmy',
                                    ],
									[
                                            'label'=>'Ассонансные и диссонансные рифмы',
                                            'url'=>'/assonansnye-i-dissonansnye-rifmy',
                                    ],

                            ];

                            echo \yii\widgets\Menu::widget([
                                'items' => $items,
                                'itemOptions' => ['class' => '', 'style' => 'font-size = 12px;'],
                                'submenuTemplate' => "\n<ul class='dropdown-menu' role='menu'>\n{items}\n</ul>\n",
                                'options' => ['class' => 'nav text-center'],
                            ]);
                            ?>

                        </div>

                        <div class="baner_side">
                            <?= $this->render('@votpuskView/layouts/block/adversting/block_3') ;?>
                        </div>
                    </aside>

                </div>
            </div>
    </section>
    <?= $this->render('@votpuskView/layouts/block/headers/_footer.php'); ?>
    <?php $this->endBody() ?>
</div>
</body>
</html>


<?php $this->endPage() ?>
<?php
echo common\widgets\micromark\MicromarkWidget::widget([
    'items' => $this->params['breadcrumbs'] ?? [],
    'template' => 'breadcrubs',
]);
?>
<style>

    #my_nav {
        background: #DBE8BA;
        border-radius: 6px;
        padding: 5px 15px;
    }

    #my_nav .nav-divider {
        background-color: #000;
    }

    #my_nav a {
        color: #204460;
    }
</style>