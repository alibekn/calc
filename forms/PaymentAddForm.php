<?php


namespace app\forms;

use app\models\Payment;
use Exception;
use yii\base\Model;

class PaymentAddForm extends Model
{
    public $sum;
    public $months;
    public $rate;

    public function rules()
    {
        return [
            [['sum', 'months', 'rate'], 'integer'],
            [['sum', 'months', 'rate'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sum' => 'Сумма',
            'months' => 'Количество месяцев',
            'rate' => 'Процентная ставка',
        ];
    }

    public function add()
    {
        if (!$this->validate()) {
            return null;
        }

        $model = new Payment();
        $model->generateNumber();
        $model->date = time();
        $model->sum = $this->sum;
        $model->months = $this->months;
        $model->rate = $this->rate;

        if (!$model->save(false)) {
            throw new Exception('Payment not saved');
        }
        return true;
    }

    public function getErrorMessage()
    {
        return $this->getErrorSummary(true)[0];
    }

}
