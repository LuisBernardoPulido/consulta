<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consultas;

/**
 * ConsultasSearch represents the model behind the search form about `app\models\Consultas`.
 */
class ConsultasSearch extends Consultas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p10_id', 'p10_usuAlta'], 'integer'],
            [['p10_tipo', 'p10_valor', 'p10_fecAlta'], 'safe'],
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
        $query = Consultas::find();

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
            'p10_id' => $this->p10_id,
            'p10_usuAlta' => $this->p10_usuAlta,
            'p10_fecAlta' => $this->p10_fecAlta,
        ]);

        $query->andFilterWhere(['like', 'p10_tipo', $this->p10_tipo])
            ->andFilterWhere(['like', 'p10_valor', $this->p10_valor]);

        return $dataProvider;
    }
}
