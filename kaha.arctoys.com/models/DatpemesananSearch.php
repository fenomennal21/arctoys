<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datpemesanan;

/**
 * DatpemesananSearch represents the model behind the search form about `app\models\Datpemesanan`.
 */
class DatpemesananSearch extends Datpemesanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDPESAN', 'KDBOOKING', 'USERID', 'TGLPESAN', 'TGLBRGKT', 'TGLPLG', 'KOTAASAL', 'KOTATUJUAN', 'CARABYR'], 'safe'],
            [['JMLPENUMPANG'], 'integer'],
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
        $query = Datpemesanan::find();

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
            'TGLBRGKT' => $this->TGLBRGKT,
            'TGLPLG' => $this->TGLPLG,
            'JMLPENUMPANG' => $this->JMLPENUMPANG,
            'TOTALHRG' => $this->TOTALHRG,
        ]);

        $query->andFilterWhere(['like', 'KDPESAN', $this->KDPESAN])
            ->andFilterWhere(['like', 'KDBOOKING', $this->KDBOOKING])
            ->andFilterWhere(['like', 'USERID', $this->USERID])
            ->andFilterWhere(['like', 'KOTAASAL', $this->KOTAASAL])
            ->andFilterWhere(['like', 'KOTATUJUAN', $this->KOTATUJUAN])
            ->andFilterWhere(['like', 'CARABYR', $this->CARABYR]);

        return $dataProvider;
    }
}
