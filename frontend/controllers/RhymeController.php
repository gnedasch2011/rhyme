<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 17.08.2020
 * Time: 8:41
 */

namespace frontend\controllers;


use app\models\rhyme\HagenOrf;
use yii\web\Controller;

class RhymeController extends Controller
{
    public function actionIndex()
    {
        
        echo "<pre>"; print_r('fd');die();
      $hagenOrf = new HagenOrf();

        $searchWord = 'Карман';

        $mostAccurateRhymes = HagenOrf::mostAccurateRhymes($searchWord);

        echo "<pre>"; print_r($mostAccurateRhymes);die();
        echo "<pre>";
        print_r($mostAccurateRhymes);
        die();


        die();
    }
}