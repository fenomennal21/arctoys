<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datakartu;

/**
 * DatakartuSearch represents the model behind the search form about `app\models\Datakartu`.
 */
class DatakartuSearch extends Datakartu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDKARTU'], 'integer'],
            [['USERID', 'NOKARTU', 'NAMAKARTU', 'VALID', 'CVV', 'JNSKARTU'], 'safe'],
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
        $query = Datakartu::find();

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
            'IDKARTU' => $this->IDKARTU,
        ]);

        $query->andFilterWhere(['like', 'USERID', $this->USERID])
            ->andFilterWhere(['like', 'NOKARTU', $this->NOKARTU])
            ->andFilterWhere(['like', 'NAMAKARTU', $this->NAMAKARTU])
            ->andFilterWhere(['like', 'VALID', $this->VALID])
            ->andFilterWhere(['like', 'CVV', $this->CVV])
            ->andFilterWhere(['like', 'JNSKARTU', $this->JNSKARTU]);

        return $dataProvider;
    }
}
