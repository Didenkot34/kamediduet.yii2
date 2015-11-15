<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;// confirm password

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required', 'message' => 'Поле не может быть пустым.'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2,'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Данный email уже зарегестрирован.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['repassword', 'compare', 'compareAttribute' =>'password','message' => 'Пароли не совпадают. Попробуйте еще  раз.'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {

//                $auth = Yii::$app->authManager;
//                $authorRole = $auth->getRole('admin');
//                $auth->assign($authorRole, $user->getId());
                return $user;
            }
        }

        return null;
    }
    
    public function scenarios() {
        $scenarios = parent::scenarios();
//        $scenarios['short_register'] = ['username','email'];
        return $scenarios;
    }
}
