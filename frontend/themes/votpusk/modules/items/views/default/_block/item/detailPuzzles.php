<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block-puzzles">
    <h1 style="font-size: 1.2em;"><a href="/<?= $model->detailUrl; ?>">Загадка #<?= $model->id; ?>
            : <?= $model->getFullTitleName() ?></a></h1>
    <p><?= $model->qustion; ?></p>
    <?php if (isset($model->img) && !empty($model->img)): ?>
        <p><img width="100%" src="/images/items/<?= $model->img; ?>" alt=""></p>
    <?php endif; ?>

    <a href="#" class="openAnswerJs openAnswer btn btn-default btn-xs btn_otv">Показать ответ …</a>
    <b class="answer"><?= $model->answer; ?></b>
</div>
