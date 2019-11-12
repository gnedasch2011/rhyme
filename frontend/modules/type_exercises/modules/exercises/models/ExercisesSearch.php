<?php

namespace frontend\modules\type_exercises\modules\exercises\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\type_exercises\modules\exercises\models\Exercises;

/**
 * ExercisesSearch represents the model behind the search form of `frontend\modules\type_exercises\modules\exercises\models\Exercises`.
 */
class ExercisesSearch extends Exercises
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_exercises_id', 'id_exercises_diff', 'tasks_id', 'position'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Exercises::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type_exercises_id' => $this->type_exercises_id,
            'id_exercises_diff' => $this->id_exercises_diff,
            'tasks_id' => $this->tasks_id,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
