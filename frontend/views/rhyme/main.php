<?php
$SearchRhyme = new \frontend\models\form\SearchRhyme();
?>

<h1>Генератор рифмы онлайн</h1>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p>Введите слово в поле ввода, затем нажмите «Найти рифмы». Если в слове есть буква ё, то не
        заменяйте её буквой е.</p>
    <div>
        <?php

        use yii\widgets\ActiveForm;

        $form = ActiveForm::begin([
            'action' => '/rhyme/index',
            'options' => ['class' => 'navbar-form navbar-left'],
        ]) ?>

        <div class="form-group">
            <?= $form->field($SearchRhyme, 'query')
                ->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Поиск',
                ])->label('');
            ?>
        </div>

        <?= \yii\helpers\Html::submitButton('Найти', ['class' => 'btn btn-default buttonCenter']) ?>

        <?php ActiveForm::end() ?>
    </div>

    <div class="border"><p>Рифма — это созвучие в окончании двух или нескольких слов. Иногда бывает
            необходимо написать стих, но вдохновение не всегда позволяет подбирать рифмы к словам.
            Для этой проблемы есть решение. Просто воспользуйтесь формой для поиска рифм на
            rhyme.ru. Введите слово, нажмите на кнопку и получите кучу рифм к нему, самые
            подходящие из которых в начале списка.</p>
        <h2>Почему подбирать рифмы лучше с помощью <?= \Yii::$app->request->hostInfo; ?>?</h2>
        <ul>
            <li>Потому что подбор рифм происходит с учетом звучания слова, вы можете выбрать
                ударение на любую гласную букву.
            </li>
            <li>У нас большая база слов, но при этом редкие слова ставятся в конец списка рифм, а
                очень редкие не показываются.
            </li>
            <li>Первые рифмы в списке наиболее точные.</li>
            <li>Сайтом удобно пользоваться с мобильных устройств.</li>
            <li>Ко многим словам мы показываем синонимы, анаграммы и другие формы после списка
                рифм.
            </li>
            <li>Можно указать необходимое количество слогов в словах и часть речи.</li>
            <li>Сайт понимает аббревиатуры.</li>
            <li>Мы находим ударение для вводимых слов в 99% случаев благодаря большой базе.</li>
            <li>Для любого слова можно искать ассонансы (созвучны только гласные), для этого нужно
                нажать на соответствующую ссылку, которая находится внутри рифм и в подсказках.
            </li>

            <br>Наш генератор рифм – отличная альтернатива таким помощникам
            поэту, как рифмус, рифмоплёт, рифматор и другие словари.
            </li>
        </ul>
    </div>

    <?php if ($popularWords): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Популярные слова для рифм:</h3>
            <?php
            echo $this->render('/rhyme/block/_output_words', [
                'words' => $popularWords,
            ]);
            ?>
        </div>
        <?php endif; ?>
    </div>

</div>
