<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jadwal;

/**
 * JadwalSearch represents the model behind the search form about `app\models\Jadwal`.
 */
class JadwalSearch extends Jadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['KDPENERB', 'NMMASKAPAI', 'TGLBRGKT', 'JAMBRGKT', 'JAMTIBA', 'KOTAASAL', 'KOTATUJUAN', 'ASALBANDARA', 'TUJUANBANDARA', 'KELAS', 'HARGA'], 'safe'],
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
        $query = Jadwal::find();

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
            'ID' => $this->ID,
            'TGLBRGKT' => $this->TGLBRGKT,
            'JAMBRGKT' => $this->JAMBRGKT,
            'JAMTIBA' => $this->JAMTIBA,
        ]);

        $query->andFilterWhere(['like', 'KDPENERB', $this->KDPENERB])
            ->andFilterWhere(['like', 'NMMASKAPAI', $this->NMMASKAPAI])
            ->andFilterWhere(['like', 'KOTAASAL', $this->KOTAASAL])
            ->andFilterWhere(['like', 'KOTATUJUAN', $this->KOTATUJUAN])
            ->andFilterWhere(['like', 'ASALBANDARA', $this->ASALBANDARA])
            ->andFilterWhere(['like', 'TUJUANBANDARA', $this->TUJUANBANDARA])
            ->andFilterWhere(['like', 'KELAS', $this->KELAS])
            ->andFilterWhere(['like', 'HARGA', $this->HARGA]);

        return $dataProvider;
    }
}
