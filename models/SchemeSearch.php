<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Scheme;

/**
 * SchemeSearch represents the model behind the search form about `app\models\Scheme`.
 */
class SchemeSearch extends Scheme
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'noofworks'], 'integer'],
            [['scheme_code', 'name_hi', 'name_en', 'documents', 'description', 'finyear'], 'safe'],
            [['totalcost'], 'number'],
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
        $query = Scheme::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'noofworks' => $this->noofworks,
            'totalcost' => $this->totalcost,
        ]);

        $query->andFilterWhere(['like', 'scheme_code', $this->scheme_code])
            ->andFilterWhere(['like', 'name_hi', $this->name_hi])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'documents', $this->documents])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'finyear', $this->finyear]);

        return $dataProvider;
    }
}
