<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datpemesananhotel;

/**
 * DatpemesananhotelSearch represents the model behind the search form about `app\models\Datpemesananhotel`.
 */
class DatpemesananhotelSearch extends Datpemesananhotel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDPESAN', 'KDBOOKING', 'USERID', 'TGLPESAN', 'HOTELID', 'CARABYR'], 'safe'],
            [['TOTALHRG'], 'number'],
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
        $query = Datpemesananhotel::find();

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
            'TGLPESAN' => $this->TGLPESAN,
            'TOTALHRG' => $this->TOTALHRG,
        ]);

        $query->andFilterWhere(['like', 'KDPESAN', $this->KDPESAN])
            ->andFilterWhere(['like', 'KDBOOKING', $this->KDBOOKING])
            ->andFilterWhere(['like', 'USERID', $this->USERID])
            ->andFilterWhere(['like', 'HOTELID', $this->HOTELID])
            ->andFilterWhere(['like', 'CARABYR', $this->CARABYR]);

        return $dataProvider;
    }
}
