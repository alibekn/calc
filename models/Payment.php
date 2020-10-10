<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $payment_number
 * @property int $date
 * @property int $sum
 * @property int $months
 * @property int $rate
 *
 */
class Payment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%payment}}';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_number' => 'Номер платежа',
            'date' => 'Дата',
            'sum' => 'Сумма',
            'months' => 'Количество месяцев',
            'rate' => 'Процентная ставка',
        ];
    }

    public function generateNumber()
    {
        $this->payment_number = ($this->id * 3650 + random_int(100, 9999));
    }

    public function monthlyPayment()
    {
        return round($this->sum * $this->getCoefficient(), 2);
    }

    public function totalPayment()
    {
        return $this->monthlyPayment() * $this->months;
    }

    public function countPayment($i)
    {
        return round($this->monthlyPayment() / pow(1.1, $i), 2);
    }

    public function countPercent($i)
    {
        return round($this->countPayment($i) * (pow(1.1, $i) - 1), 2);
    }

    public function OSPLT($i)
    {
        $rate = 1 + $this->rate/12/100;
        $k = $i - $this->months - 1;
        return round($this->monthlyPayment() * pow($rate, $k), 2);
    }

    public function PRPLT($i)
    {
        $rate = 1 + $this->rate/12/100;
        $k = $i - $this->months - 1;
        $x = 1 - pow($rate, $k);
        return round($this->monthlyPayment() * $x, 2);
    }

    private function getCoefficient()
    {
        $monthly_rate = (100 + $this->rate) / 12 / 100;

        $largerOnOne = 1 + $monthly_rate;

        $coefficient = ($monthly_rate * pow($largerOnOne, $this->months)) / (pow($largerOnOne, $this->months) - 1);

        return $coefficient;
    }
}
