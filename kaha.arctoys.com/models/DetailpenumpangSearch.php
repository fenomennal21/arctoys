<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detailpenumpang;

/**
 * DetailpenumpangSearch represents the model behind the search form about `app\models\Detailpenumpang`.
 */
class DetailpenumpangSearch extends Detailpenumpang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DETAILID', 'KDPESAN', 'NMPENUMPANG'], 'safe'],
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
        $query = Detailpenumpang::find();

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
        $query->andFilterWhere(['like', 'DETAILID', $this->DETAILID])
            ->andFilterWhere(['like', 'KDPESAN', $this->KDPESAN])
            ->andFilterWhere(['like', 'NMPENUMPANG', $this->NMPENUMPANG]);

        return $dataProvider;
    }
}
