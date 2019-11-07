<?php

namespace frontend\components;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;


class AdminController extends Controller
{

//    public $layout = '//admin/column2';


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ]
                ],
            ],
        ];
    }


    public function init()
    {
        parent::init();
        // запрет на другие разделы админки для менеджеров
//        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 'manager') {
//
//            if (!in_array($this->module->id, ['site', 'order', 'comment', 'news','discount'])) {
//                die('no access');
//            }
//        }
    }


}