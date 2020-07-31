<?php

namespace frontend\modules\admin\controllers;

class AjaxController extends \yii\web\Controller
{
    public function actionCreateForm()
    {
        $data = $_POST['data'];

        return $this->renderPartial('formsCreate/' . $data['template'], [
            'formName' => $data['formName'],
            'formAttr' => $data['formAttr'],
            'positon' => $data['positon']
        ]);

    }
}