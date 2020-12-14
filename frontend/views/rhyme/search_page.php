<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1>Рифма к <?= ($isName) ? 'имени' : 'слову'; ?> <?= $searchWord; ?></h1>
</div>

<p>
    <?= $searchWord; ?> - ударный слог "<?= $model->accent; ?>" (Ударение на "<?= $model->accent; ?>
    "). В слове содержится <?= \app\models\rhyme\WordHelper::numberOfVowels($searchWord); ?> гласные
    и <?= \app\models\rhyme\WordHelper::numberOfConsonants($searchWord); ?>
    согласные буквы. Наш генератор подобрал в
    онлайн-режиме <?= count($rhymesArrGroup, COUNT_RECURSIVE); ?> рифм
    на <?= implode(',', array_keys($rhymesArrGroup)); ?> слогов. Ниже вы можете осуществить подбор
    рифм к любым другим словоформам. Надеемся наш сервис станет вашим
    лучшим помощником при написании стихов и песен.
</p>

<br>

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

