<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Refhotel;

/**
 * RefhotelSearch represents the model behind the search form about `app\models\Refhotel`.
 */
class RefhotelSearch extends Refhotel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOTELID', 'NAMAHOTEL', 'ALAMATHTL', 'NOTLPHTL'], 'safe'],
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
        $query = Refhotel::find();

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
        $query->andFilterWhere(['like', 'HOTELID', $this->HOTELID])
            ->andFilterWhere(['like', 'NAMAHOTEL', $this->NAMAHOTEL])
            ->andFilterWhere(['like', 'ALAMATHTL', $this->ALAMATHTL])
            ->andFilterWhere(['like', 'NOTLPHTL', $this->NOTLPHTL]);

        return $dataProvider;
    }
}
