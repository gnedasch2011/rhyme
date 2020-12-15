<?php
$SearchRhyme = new \frontend\models\form\SearchRhyme();
?> <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "VideoObject",
      "name": "Рифмы | Виды рифм",
      "description": "Виды рифм",
      "thumbnailUrl": [
        "https://i.ytimg.com/vi/RyiEmCqESsg/maxresdefault.jpg"
       ],
      "uploadDate": "2016-03-31T08:00:00+08:00",
      "duration": "PT1M54S",
      "contentUrl": "https://www.youtube.com/embed/RyiEmCqESsg?controls=0",
      "embedUrl": "https://www.youtube.com/embed/RyiEmCqESsg?controls=0",
      "interactionStatistic": {
        "@type": "InteractionCounter",
        "interactionType": { "@type": "http://schema.org/WatchAction" },
        "userInteractionCount": 5647018
      },
      "regionsAllowed": "NL"
    }
    </script>

<h1>Генератор рифм онлайн</h1>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p>Введите слово в поле ввода, затем нажмите «Найти» для поиска рифм к нужному слову. Если в слове есть буква ё, то не
        заменяйте её буквой е.</p>
    <div>
        <form action="/search/default/index" method="post">
            <div class="search_block">
                <input type="search" placeholder="Поиск по сайту">
                <button type="submit" class="btn_search">Подобрать</button>
            </div>
        </form>
    </div>

    <div class="border"><p>Рифма — это созвучие в окончании двух или нескольких слов. Иногда бывает
            необходимо написать стих, но вдохновение не всегда позволяет подбирать рифмы к словам.
            Просто введите слово, нажмите на кнопку и получите кучу рифм к нему, самые
            подходящие из которых в начале списка.</p> <br>
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

            <li>
			 </li>
			 </ul> <br>
			<p>Наш сервис помогает авторам подобрать необходимые рифмы (используя различные правила, в том числе учёт ударных звуков и анализ популярных предложений) для написания стихотворений.
            и песен. Отличная альтернатива таким помощникам поэту, как рифмус, рифмоплёт, рифматор и
            другие словари.
			</p>
			<p>При подборе учитываются как точные, так и неточные рифмы, это поможет вам использовать инструмент максимально эффективно, например, для написания текстов песен, стихотворений или прозы, а также для написания книг. 
			</p>
			<p>Мы хотим предложить поэтам по всему миру лучший сервис для того, чтобы вы могли работать, а мы могли наслаждаться вашим творчеством! Мы проанализировали сотни тысяч страниц и миллионы строк, чтобы достичь этого!
			</p>
			
			
			
             <iframe width="560" height="315" src="https://www.youtube.com/embed/RyiEmCqESsg?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <?php if ($popularWords): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Люди часто ищут:</h2>
            <?php
            echo $this->render('/rhyme/block/_output_words', [
                'words' => $popularWords,
            ]);
            ?>
        </div>
        <?php endif; ?>
    </div>

</div>
