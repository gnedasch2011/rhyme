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
use yii\web\Controller;

class RhymeController extends Controller
{
    public function actionIndex()
    {
        $hagenOrf = new HagenOrf();

        $popularWords = $hagenOrf->getArrUrlName([HagenOrf::popularArrWord()]);
        $SearchRhyme = new SearchRhyme();
        if ($SearchRhyme->load(\Yii::$app->request->post()) && $SearchRhyme->validate()) {

            $searchWord = $SearchRhyme->query;

            return $this->redirect('/rhyme/' . $searchWord);
        }
        $this->view->title = 'Рифмы';

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
            $HagenOrfs = $HagenOrf->mostAccurateRhymes($searchWord);

            $this->view->title = 'Рифмы к слову ' . $searchWord;

            $NamesOrf = new NamesOrf();
            $NamesOrfs = $NamesOrf->mostAccurateRhymes($searchWord);

            $rhymesArr = $HagenOrf->getArrUrlName([$NamesOrfs, $HagenOrfs]);
            $rhymesArrGroup = $HagenOrf->getRhymesArrGroup($rhymesArr);

            //популярных
            $popularWords = [];

            //рандом из популярных

            $popularWords = $HagenOrf->getArrUrlName([HagenOrf::popularArrWord()]);
            $what_were_you_looking_for_earlier = $HagenOrf->getArrUrlName([HagenOrf::randomArrWord()]);

            return $this->render('/rhyme/search_page', [
                'searchWord' => $searchWord,
                'rhymesArrGroup' => $rhymesArrGroup,
                'popularWords' => $popularWords,
                'what_were_you_looking_for_earlier' => $what_were_you_looking_for_earlier,
            ]);
        }

        return $this->redirect('/');
    }

    public function actionPageWithName()
    {
        $NamesOrf = new NamesOrf();
        $NamesOrfAll = $NamesOrf::getNameAll();

        $res = $NamesOrf->getArrNamesWithUrl();


        return $this->render('/rhyme/page_with_name', [
            'namesOrfAll' => $res,
        ]);
    }


}

