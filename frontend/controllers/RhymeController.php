<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 17.08.2020
 * Time: 8:41
 */

namespace frontend\controllers;


use app\models\rhyme\HagenOrf;
use app\models\rhyme\NamesOrf;
use frontend\models\form\SearchRhyme;
use http\Url;
use yii\web\Controller;

class RhymeController extends Controller
{
    public function actionIndex()
    {
        $hagenOrf = new HagenOrf();

        $cache = \Yii::$app->cache;

        $popularWords = $hagenOrf->getArrUrlName([HagenOrf::popularArrWordInAMain()]);

        $popularWords = $cache->getOrSet('popularWordsInMain', function () use ($hagenOrf) {
            $popularWords = $hagenOrf->getArrUrlName([HagenOrf::popularArrWordInAMain()]);
            return $popularWords;
        });


        $SearchRhyme = new SearchRhyme();

        if ($SearchRhyme->load(\Yii::$app->request->post()) && $SearchRhyme->validate()) {

            $searchWord = $SearchRhyme->query;

            return $this->redirect('/rhyme/' . $searchWord);
        }

        $this->view->title = 'Рифма к слову | Генератор рифм онлайн | Словарь | Подобрать';


        $this->view->registerMetaTag(
            ['name' => 'description', 'content' => 'Подобрать рифму к слову онлайн | Генератор рифмы онлайн | Словарь Рифма.орг']
        );


        $this->view->params['breadcrumbs'][] = array(
            'label' => 'Главная',
        );


        return $this->render('/rhyme/main', [
            'popularWords' => $popularWords,
        ]);

    }

    public function actionSearchRhyme()
    {
        if (\Yii::$app->request->get('rhyme')) {
            $SearchRhyme = new SearchRhyme();

            $SearchRhyme->query = \Yii::$app->request->get('rhyme');

            if (!$SearchRhyme->validate()) {
                return false;
            };

            $searchWord = $SearchRhyme->query;
            $HagenOrf = new HagenOrf();
            $HagenOrf->query = $searchWord;

            $HagenOrfs = $HagenOrf->mostAccurateRhymes($searchWord);


            $NamesOrf = new NamesOrf();
            $NamesOrfs = $NamesOrf->mostAccurateRhymes($searchWord);

            $rhymesArr = $HagenOrf->getArrUrlName([$NamesOrfs, $HagenOrfs]);
            $rhymesArrGroup = $HagenOrf->getRhymesArrGroup($rhymesArr);


            //популярных
            $popularWords = [];

            //рандом из популярных


            $cache = \Yii::$app->cache;

            $popularWords = $cache->getOrSet($searchWord, function () use ($HagenOrf) {
                $popularWords = $HagenOrf->getArrUrlName([HagenOrf::popularArrWord()]);
                return $popularWords;
            });

            $what_were_you_looking_for_earlier = $HagenOrf->getArrUrlName([HagenOrf::randomArrWord()]);

            $isName = $NamesOrf->isName($searchWord);

            if ($isName) {
                $this->view->title = "Рифма к имени {$searchWord} | Подобрать онлайн | " . \Yii::$app->request->hostInfo;

                $this->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' =>
                            "Подобрать рифму к имени {$searchWord} | Генератор рифмы онлайн | Словарь " . \Yii::$app->request->hostInfo
                    ]
                );

                $this->view->params['breadcrumbs'][] = array(
                    'label' => 'Имена',
                );
                $this->view->params['breadcrumbs'][] = array(
                    'label' => $searchWord,
                );


            } else {
                $this->view->title = "Рифма к слову {$searchWord} | Подобрать онлайн | Рифма.орг";

                $this->view->registerMetaTag(
                    [
                        'name' => 'description',
                        'content' =>
                            "Подобрать рифму к слову {$searchWord} | Генератор рифмы онлайн | Словарь " . \Yii::$app->request->hostInfo
                    ]
                );


                $this->view->params['breadcrumbs'][] = array(
                    'label' => 'Слова',
                );
                $this->view->params['breadcrumbs'][] = array(
                    'label' => $searchWord,
                );

            }

            $anotherFormWord = $HagenOrf->anotherFormWord();
            $anotherFormWord = $HagenOrf->getArrUrlName([$anotherFormWord]);

            return $this->render('/rhyme/search_page', [
                'searchWord' => $searchWord,
                'rhymesArrGroup' => $rhymesArrGroup,
                'popularWords' => $popularWords,
                'anotherFormWord' => $anotherFormWord,
                'what_were_you_looking_for_earlier' => $what_were_you_looking_for_earlier,
                'isName' => $isName,
            ]);
        }

        return $this->redirect('/');
    }

    public function actionPageWithName()
    {
        $NamesOrf = new NamesOrf();
        $NamesOrfAll = $NamesOrf::getNameAll();


        $patronymics = $NamesOrf::getPatronymics();

        $res = $NamesOrf->getArrNamesWithUrl();

        $this->view->params['breadcrumbs'][] = array(
            'label' => 'Имена',
        );

        $this->view->title = 'Рифмы к мужским и женским именам | Красивые | Смешные | Обидные | Пошлые | Матерные | Прикольные | Оскорбительные рифмы к имени мальчиков и девочек';

        $this->view->registerMetaTag(
            ['name' => 'description', 'content' => 'Рифмы к мужским и женским именам | Красивые и смешные рифмы для имён мальчиков и девочек | ' . \Yii::$app->request->hostInfo]
        );

        return $this->render('/rhyme/page_with_name', [
            'namesOrfAll' => $res,
            'patronymics' => $patronymics,
        ]);
    }

    public function actionTypesOfRhymes()
    {
        $this->view->title = 'Ассонансные и диссонансные рифмы | Рифма.орг';
        $this->view->registerMetaTag(
            ['name' => 'description', 'content' => 'то такое ассонансные и диссонансные рифмы? Чем отличаются ассонансы и диссонансы? Ответ на ' . \Yii::$app->request->hostInfo]
        );

        $this->view->params['breadcrumbs'][] = array(
            'label' => 'Имена',
        );

        return $this->render('types-of-rhymes');
    }

    public function actionMasculineRhyme()
    {
        $this->view->title = 'Ассонансные и диссонансные рифмы | Рифма.орг';
        $this->view->registerMetaTag(
            ['name' => 'description', 'content' => 'то такое ассонансные и диссонансные рифмы? Чем отличаются ассонансы и диссонансы? Ответ на ' . \Yii::$app->request->hostInfo]
        );

        $this->view->params['breadcrumbs'][] = array(
            'label' => 'Имена',
        );

        return $this->render('MasculineRhyme');
    }

    public function actionFeminineRhyme()
    {
        $this->view->title = 'Ассонансные и диссонансные рифмы | Рифма.орг';
        $this->view->registerMetaTag(
            ['name' => 'description', 'content' => 'то такое ассонансные и диссонансные рифмы? Чем отличаются ассонансы и диссонансы? Ответ на ' . \Yii::$app->request->hostInfo]
        );

        $this->view->params['breadcrumbs'][] = array(
            'label' => 'Имена',
        );

        return $this->render('FeminineRhyme');
    }


}

