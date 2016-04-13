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
            [['id', 'reports_id'], 'integer'],
            [['problem_type', 'description', 'top1', 'top2', 'top3'], 'safe'],
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
            'reports_id' => $this->reports_id,
        ]);

        $query->andFilterWhere(['like', 'problem_type', $this->problem_type])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'top1', $this->top1])
            ->andFilterWhere(['like', 'top2', $this->top2])
            ->andFilterWhere(['like', 'top3', $this->top3]);

        return $dataProvider;
    }
}
