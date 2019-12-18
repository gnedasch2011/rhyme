<?php

namespace frontend\modules\type_exercises\modules\tests\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tests".
 *
 * @property int $id
 * @property string $name
 * @property int $type_exercises_id
 * @property int $type_test_id1
 */
class Tests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_exercises_id', 'type_test_id'], 'required'],
            [['type_exercises_id', 'type_test_id'], 'integer'],
            [['name'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type_exercises_id' => 'Type Exercises ID',
            'type_test_id' => 'Type Test Id1',
        ];
    }

    public function getQustions()
    {
        return $this->hasMany(Qustions::className(), ['tests_id' => 'id']);
    }


    /**
     *   [
     * 'idTest' => 1,
     * 'idQuestion' => 1,
     * 'arrIdAnswers' => [1, 2],
     * ],
     * @param $test
     * return   [
     * 'id_question' => 1,
     * 'check' => true,
     * 'rightAnswers' => [1, 2, 3]
     * 'noRightAnswers' => [1, 2, 3]
     * ],
     */
    public static function checkTest($inputTestArr = [])
    {

//        $inputTestArr = [
//            'idTest' => 1,
//            'idQuestion' => 1,
//            'arrIdAnswers' => [1, 2, 3],
//        ];

        $check = false;
        $id_question = $inputTestArr['idQuestion'];
        $question = Qustions::findOne($id_question);
        $checkAnswersArr = $inputTestArr['arrIdAnswers'] ?? [];

//        echo '<pre>';print_r($question->rightAnswers);
        $rightAnswersArr = ArrayHelper::getColumn($question->rightAnswers, function ($element) {
            return (int)$element['id'];
        });

        $noRightAnswers = array_diff($checkAnswersArr, $rightAnswersArr); //не правильно выбранные
        $rightAnswersCheck = array_intersect($checkAnswersArr, $rightAnswersArr);//правильно выбранные

        $noCheckRightAnswers = array_diff($rightAnswersArr, $rightAnswersCheck);

        if (empty($noRightAnswers) && empty($noRightAnswersNoCheck)) {
            $check = true;
        }

        return [
            'id_question' => $id_question,
            'noRightAnswers' => $noRightAnswers,
            'check' => $check,
            'rightAnswersCheck' => $rightAnswersCheck,
            'rightAnswersArr' => $rightAnswersArr,
            'noCheckRightAnswers' => $noCheckRightAnswers
        ];

    }
}
