<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Refkamar;

/**
 * RefkamarSearch represents the model behind the search form about `app\models\Refkamar`.
 */
class RefkamarSearch extends Refkamar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDKMR', 'JENISKMR'], 'safe'],
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
        $query = Refkamar::find();

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
        $query->andFilterWhere(['like', 'KDKMR', $this->KDKMR])
            ->andFilterWhere(['like', 'JENISKMR', $this->JENISKMR]);

        return $dataProvider;
    }
}
