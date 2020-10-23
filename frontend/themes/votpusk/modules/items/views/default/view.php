<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block-puzzles">
            <h1 style="font-size: 1.7em;">Загадка
                #<?= $model->id; ?> <?= $model->getFullTitleName() ?></h1>
            <p><?= $model->qustion; ?></p>
            <?php if (isset($model->img) && !empty($model->img)): ?>
                <p><img width="100%" src="/images/items/<?= $model->img; ?>" alt=""></p>
            <?php endif; ?>

            <a href="#" class="openAnswerJs openAnswer btn btn-default btn-xs btn_otv">Показать
                ответ …</a>
            <b class="answer"><?= $model->answer; ?></b>
        </div>
    </div>
    <hr>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Эта загадка находится в категориях</h3>
        <div class="page-nav">
            <?php foreach ($model->categories as $category): ?>
                <a href="/<?= $category->url ?>"
                   class="openAnswer btn btn-default btn-xs btn_otv"><?= $category->name; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <hr>

    <hr>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Возможно вам понравятся другие загадки:</h3>
        <div class="page-nav">
            <?php foreach (\frontend\modules\items\model\Items::getRandomItems() as $model): ?>
                <?php
                echo $this->render('@votpuskView/modules/items/views/default/_block/item/detailPuzzles', [
                        'model' => $model,
                    ]
                );
                ?>
            <?php endforeach; ?>
        </div>
    </div>
    <hr>
</div>
