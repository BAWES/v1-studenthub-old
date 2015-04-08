<?php
namespace frontend\models;

use common\models\Admin;
use yii\base\Model;
use Yii;

/**
 * Register form
 */
class RegisterForm extends Model
{
    public $name;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\Admin', 'targetAttribute'=>'admin_email', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
            $admin = new Admin();
            $admin->admin_name = $this->name;
            $admin->admin_email = $this->email;
            $admin->setPassword($this->password);
            $admin->generateAuthKey();
            if ($admin->save()) {
                return $admin;
            }
        }

        return null;
    }
}
