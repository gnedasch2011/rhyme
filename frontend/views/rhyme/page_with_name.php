<h1>Рифмы к именам</h1>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php foreach ($namesOrfAll as $word): ?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <a href="<?= $word['url']; ?>" class="accent"><?= $word['word']; ?></a>
            </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
</div>

<?php if ($patronymics): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Рифмы к отчествам:</h3>
        <?php
        echo $this->render('/rhyme/block/_output_words', [
            'words' => $patronymics,
        ]);
        ?>
    </div>
<?php endif; ?>
