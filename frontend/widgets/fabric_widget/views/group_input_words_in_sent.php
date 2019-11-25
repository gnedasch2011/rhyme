<?php

use frontend\widgets\sentenceInputWordsIn\SentenceInputWordsInWidget;

foreach ($model->sentenceInputWordsIn as $SentenceInputWordsIn) {

    echo SentenceInputWordsInWidget::widget([
        'SentenceInputWordsIn' => $SentenceInputWordsIn,
    ]);
}

/*поддерживать интерфейс "Проверка"
         <span
data-id-sentenceInputWordsIn ="1"
data-id-wordsForInput ="1"  //lorem
 >#1_WORDS#</span> ipsum dolor sit amet, <span
data-id-sentenceInputWordsIn ="1"
data-id-wordsForInput ="2"
 >#2_WORDS#</span> adipisicing elit, sed do eiusmod

*/
