<?php

namespace app\models\search;

use app\models\Payment;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class PaymentSearch extends Model
{
    public $payment_number;
    public $date;
    public $sum;
    public $months;
    public $rate;

    public function formName()
    {
        return 's';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_number', 'date', 'sum', 'months', 'rate'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = Payment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
                'attributes' => [
                    'id',
                    'payment_number',
                    'date',
                    'sum',
                    'months',
                    'rate',
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'date' => $this->date,
            'sum' => $this->sum,
            'status' => $this->months,
            'rate' => $this->rate,
        ]);

        $query
            ->andFilterWhere(['like', 'payment_number', $this->payment_number]);


        return $dataProvider;
    }

}
