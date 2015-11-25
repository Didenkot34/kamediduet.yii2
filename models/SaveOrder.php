<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SaveOrder extends Model
{
    public $name;
    public $categories;
    public $email;
    public $tel;
    public $date;
    public $time_event;
    public $subject;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject','tel','date','time_event','categories'], 'required','message'=>'Поле не может быть пустым'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha','message'=>'Верификационный код введён не верно.'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Введите код проверки *',
            'name' => 'Ваше имя *',
            'date' => 'Дата Вашего события *',
            'time_event' => 'Начало мероприятия',
            'categories' => 'Мероприятие *',
            'subject' =>'Ваши пожелания по поводу данного мероприятия *'
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }


        public function saveOrder()
    {
       // $date = new DateTime();
        $order = new Orders();
        $order->categories = $this->categories;
        $order->date = $this->date;
        $order->name = $this->name;
        $order->subject = $this->subject;
        $order->tel = $this->tel;
        $order->time_event = $this->time_event;
        $order->email = $this->email;
        $order->created_at = date('Y-m-d H:i:s');
        if($order->save()){
            return $order;
        }
    }

}
