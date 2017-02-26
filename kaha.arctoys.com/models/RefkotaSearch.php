<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Refkota;

/**
 * RefkotaSearch represents the model behind the search form about `app\models\Refkota`.
 */
class RefkotaSearch extends Refkota
{
    /**
     * @inheritdoc
     */
	public $NMPROP;
	
    public function rules()
    {
        return [
            [['KDKOTA', 'NMKOTA', 'KDPROP', 'NMPROP'], 'safe'],
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
        //$query = Refkota::find();
		$query = Refkota::find()->joinWith(['kDPROP']);
		
		 $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		$dataProvider->sort->attributes['NMPROP'] = [
            'asc' => ['refpropinsi.NMPROP' => SORT_ASC],
            'desc' => ['refpropinsi.NMPROP' => SORT_DESC],
        ];
        $this->load($params);
	
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'KDKOTA', $this->KDKOTA])
            ->andFilterWhere(['like', 'NMKOTA', $this->NMKOTA])
            ->andFilterWhere(['like', 'KDPROP', $this->KDPROP])
			;
			
			        $query->andFilterWhere(['like','refpropinsi.NMPROP',$this->NMPROP]);


        return $dataProvider;
    }
}
