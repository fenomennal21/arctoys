<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detailangkutan;

/**
 * DetailangkutanSearch represents the model behind the search form about `app\models\Detailangkutan`.
 */
class DetailangkutanSearch extends Detailangkutan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDDETAIL', 'KDPESAN', 'KDBOOKING', 'IDMASKAPAI', 'IDKERETA', 'JAMBRGKT', 'JAMTIBA'], 'safe'],
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
        $query = Detailangkutan::find();

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
            'JAMBRGKT' => $this->JAMBRGKT,
            'JAMTIBA' => $this->JAMTIBA,
        ]);

        $query->andFilterWhere(['like', 'IDDETAIL', $this->IDDETAIL])
            ->andFilterWhere(['like', 'KDPESAN', $this->KDPESAN])
            ->andFilterWhere(['like', 'KDBOOKING', $this->KDBOOKING])
            ->andFilterWhere(['like', 'IDMASKAPAI', $this->IDMASKAPAI])
            ->andFilterWhere(['like', 'IDKERETA', $this->IDKERETA]);

        return $dataProvider;
    }
}
