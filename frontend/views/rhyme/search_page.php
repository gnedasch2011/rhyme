<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1>Рифма к слову <?= $searchWord; ?></h1>
</div>

<?php if (empty($rhymesArrGroup)): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Рифм на такое слове</h3>
    </div>
<?php else: ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php foreach ($rhymesArrGroup as $number_of_syllables => $arr): ?>
            <h3>Рифма на <?= $number_of_syllables; ?> слог </h3>
            <?php foreach ($arr as $word): ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <a href="<?= $word['url']; ?>" class="accent"><?= $word['word']; ?></a>
                </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3>Популярные слова:</h3>

</div>