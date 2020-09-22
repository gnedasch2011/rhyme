<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1>Рифма к <?= ($isName) ? 'имени' : 'слову'; ?> <?= $searchWord; ?></h1>
</div>
<!-- Yandex.RTB R-A-632107-1 -->
<div id="yandex_rtb_R-A-632107-1"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-632107-1",
                renderTo: "yandex_rtb_R-A-632107-1",
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

<?php if (empty($rhymesArrGroup)): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Рифм на такое слово</h3>
    </div>
<?php else: ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php foreach ($rhymesArrGroup as $number_of_syllables => $arr): ?>
            <h3>Рифма на <?= $number_of_syllables; ?> слог </h3>

            <?php
            echo $this->render('/rhyme/block/_output_words', [
                'words' => $arr,
            ]);
            ?>

            <div class="clearfix"></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<?php if ($popularWords): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Популярные слова для рифм:</h3>
        <?php
        echo $this->render('/rhyme/block/_output_words', [
            'words' => $popularWords,
        ]);
        ?>
    </div>

<?php endif; ?><?php if ($anotherFormWord): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Другие формы слова:</h3>
        <?php
        echo $this->render('/rhyme/block/_output_words', [
            'words' => $anotherFormWord,
        ]);
        ?>
    </div>
<?php endif; ?>


<?php if ($what_were_you_looking_for_earlier): ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Слова, которые искали ранее:</h3>
        <?php
        echo $this->render('/rhyme/block/_output_words', [
            'words' => $what_were_you_looking_for_earlier,
        ]);
        ?>
    </div>
<?php endif; ?>

