<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datuser;

/**
 * DatuserSearch represents the model behind the search form about `app\models\Datuser`.
 */
class DatuserSearch extends Datuser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERID', 'USERPWD', 'NAMAUSER', 'JKUSER', 'TGLLHR', 'NIK', 'NOHP', 'ALAMAT', 'EMAIL'], 'safe'],
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
        $query = Datuser::find();

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
            'TGLLHR' => $this->TGLLHR,
        ]);

        $query->andFilterWhere(['like', 'USERID', $this->USERID])
            ->andFilterWhere(['like', 'USERPWD', $this->USERPWD])
            ->andFilterWhere(['like', 'NAMAUSER', $this->NAMAUSER])
            ->andFilterWhere(['like', 'JKUSER', $this->JKUSER])
            ->andFilterWhere(['like', 'NIK', $this->NIK])
            ->andFilterWhere(['like', 'NOHP', $this->NOHP])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL]);

        return $dataProvider;
    }
}
