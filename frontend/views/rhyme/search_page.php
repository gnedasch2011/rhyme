<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1>Рифма к слову <?= $searchWord; ?></h1>
</div>

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


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3>Популярные слова:</h3>

</div>