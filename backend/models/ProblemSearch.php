<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Problem;

/**
 * ProblemSearch represents the model behind the search form about `backend\models\Problem`.
 */
class ProblemSearch extends Problem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'record_id'], 'integer'],
            [['problem_type', 'description', 'problemcol'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Problem::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'record_id' => $this->record_id,
        ]);

        $query->andFilterWhere(['like', 'problem_type', $this->problem_type])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'problemcol', $this->problemcol]);

        return $dataProvider;
    }
}