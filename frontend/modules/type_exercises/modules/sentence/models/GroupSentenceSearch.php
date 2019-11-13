<?php

namespace frontend\modules\type_exercises\modules\sentence\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\type_exercises\modules\sentence\models\GroupSentence;

/**
 * GroupSentenceSearch represents the model behind the search form of `frontend\modules\type_exercises\modules\suggestion_constructor\models\GroupSentence`.
 */
class GroupSentenceSearch extends GroupSentence
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_exercises_id'], 'integer'],
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
        $query = GroupSentence::find();

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
        ]);

        return $dataProvider;
    }
}
