<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php foreach ($words as $word): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <a title="<?= $word['word'] ?? ''; ?>" href="<?= $word['url'] ?? ''; ?>" class="accent"><?= $word['word'] ?? ''; ?></a>
        </div>
    <?php endforeach; ?>
</div>