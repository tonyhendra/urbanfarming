<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Signup form
 */
class AddUser extends Model
{
    public $username;
    public $email;
    public $password;
    public $role;
    public $created_at;
    public $updated_at;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['role', 'required'],
            ['role', 'integer'],

            //['created_at', 'default', 'value'=>date('Y-m-d H:i:s'), 'on'=>'insert'],

        ];
    }

        /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function adduser()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->role = $this->role;
        // $user->created_at = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        return $user->save() ? $user : null;
    }

}
