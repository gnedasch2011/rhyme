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
                            <!-- Yandex.RTB R-A-653585-3 -->
                            <div id="yandex_rtb_R-A-653585-3"></div>
                            <script type="text/javascript">
                                (function(w, d, n, s, t) {
                                    w[n] = w[n] || [];
                                    w[n].push(function() {
                                        Ya.Context.AdvManager.render({
                                            blockId: "R-A-653585-3",
                                            renderTo: "yandex_rtb_R-A-653585-3",
                                            async: true
                                        });
                                    });
                                    t = d.getElementsByTagName("script")[0];
                                    s = d.createElement("script");
                                    s.type = "text/javascript";
                                    s.src = "//an.yandex.ru/system/context.js";
                                    s.async = true;
                                    t.parentNode.insertBefore(s, t);
                                })(this, this.document, "yandexContextAsyncCallbacks");
                            </script>
                        </div>

                        <!-- Yandex.RTB R-A-653585-1 -->
                        <div class="baner_side"><!-- Yandex.RTB R-A-653585-2 -->
                            <!-- Yandex.RTB R-A-653585-2 -->
                            <div id="yandex_rtb_R-A-653585-2"></div>
                            <script type="text/javascript">
                                (function (w, d, n, s, t) {
                                    w[n] = w[n] || [];
                                    w[n].push(function () {
                                        Ya.Context.AdvManager.render({
                                            blockId: "R-A-653585-2",
                                            renderTo: "yandex_rtb_R-A-653585-2",
                                            async: true
                                        });
                                    });
                                    t = d.getElementsByTagName("script")[0];
                                    s = d.createElement("script");
                                    s.type = "text/javascript";
                                    s.src = "//an.yandex.ru/system/context.js";
                                    s.async = true;
                                    t.parentNode.insertBefore(s, t);
                                })(this, this.document, "yandexContextAsyncCallbacks");
                            </script>
                            <?php /*?>

                        <div class="baner_side"><!-- Yandex.RTB R-A-653585-2 -->
                            <!-- Yandex.RTB R-A-653585-2 -->
                            <div id="yandex_rtb_R-A-653585-2"></div>
                            <script type="text/javascript">
                                (function(w, d, n, s, t) {
                                    w[n] = w[n] || [];
                                    w[n].push(function() {
                                        Ya.Context.AdvManager.render({
                                            blockId: "R-A-653585-2",
                                            renderTo: "yandex_rtb_R-A-653585-2",
                                            async: true
                                        });
                                    });
                                    t = d.getElementsByTagName("script")[0];
                                    s = d.createElement("script");
                                    s.type = "text/javascript";
                                    s.src = "//an.yandex.ru/system/context.js";
                                    s.async = true;
                                    t.parentNode.insertBefore(s, t);
                                })(this, this.document, "yandexContextAsyncCallbacks");
                            </script>
                        </div>
    <?php */ ?>
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