<?php
namespace devskyfly\yiiModuleAdminPanel\console\auth;

use devskyfly\php56\core\Cls;
use devskyfly\yiiModuleAdminPanel\models\auth\User;
use Yii;
use yii\console\Controller;
use yii\helpers\BaseConsole;
use yii\web\IdentityInterface;

class UserController extends Controller
{
    protected static $user_cls;
    
    /**
     * Return user model class name
     * 
     * @return string - user classname
     */
    protected static function getUserClass()
    {
        return User::class;
    }
    
    public function init()
    {
        parent::init();
        static::$user_cls=static::getUserClass();
        if(!Cls::isSubClassOf(static::$user_cls, IdentityInterface::class)){
            throw new \InvalidArgumentException('Propoerty $user_cls is not sub class of '.IdentityInterface::class);
        }
    }
    
    public function actionIndex()
    {
        try {
            $user_cls=static::$user_cls;
            $users=$user_cls::find()->orderBy('username')->all();
            $itr=0;
            
            if(!empty($users)){
                foreach ($users as $item){
                    $itr++;
                    BaseConsole::output("{$itr}. {$item['username']}  ['{$item['email']}']");
                }
            }else{
                BaseConsole::output('User list is empty.');
            }
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        
        return 0;
    }
    
    /**
     * Add user to system.
     */
    public function actionAdd(){
        try{
            $user_cls=static::$user_cls;
            $app=Yii::$app;
            $user=new User();
            $user->username = BaseConsole::input("Insert user name:");
            $user->email = BaseConsole::input("Insert email:");
            
            $password_1 = BaseConsole::input("Insert password:");
            $password_2 = BaseConsole::input("Password again:");
            
            if($password_1!==$password_2){
                BaseConsole::stdout("Passwords are not equal.");
                return 0;
            }
            
            $password_hash=$app->security->generatePasswordHash($password_1);
            $user->setPassword($password_hash);            
            $user->generateAuthKey();
            
            if($user->validate())
            {
                if($user->insert()){
                    BaseConsole::output("User $user->username added.".PHP_EOL);
                }else{
                    BaseConsole::output("Can't add user $user->username.".PHP_EOL);
                }
            }else{
                BaseConsole::output("User is invalide.".PHP_EOL);
                
                foreach ($user->errors as $error_key=>$error_item){
                    BaseConsole::stdout($error_key.':'.$error_item.PHP_EOL);
                }
            }
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
             return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0; 
    }
    
    /**
     * Delete user from system.
     */
    public function actionDelete(){
        try{
            $user_cls=static::$user_cls;
            $user_name=BaseConsole::input("Insert user name:");
            $model=$user_cls::find()->where(['username'=>$user_name])->one();
            
            if(BaseConsole::confirm("Are you sure?")){
                if(is_null($model)){
                    BaseConsole::output("No such user '$user_name'.".PHP_EOL);
                }else{
                    if($model->delete()){
                        BaseConsole::output("User '$user_name' was deleted.");
                    }else{
                        BaseConsole::output("Can't delete $user_name.");
                    }
                }
            }else{
                BaseConsole::output("You discard this action.");
            }
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
             return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
    
    /**
     * Delete all users from system.
     */
    public function actionDeleteAll(){
        try{
            $user_cls=static::$user_cls;
            if(BaseConsole::confirm("Are you sure?")
                &&(!BaseConsole::confirm("Are you crazy?"))){
                //if(){
                    try{
                        $user_cls::deleteAll();
                        BaseConsole::output('Users were droped.'.PHP_EOL);
                    }catch(\Exception $e){
                        BaseConsole::output("Can\'t drop all users.".PHP_EOL);
                        throw $e;
                    }
                //}else{
                    
                //}
            }else{
                BaseConsole::output("You discard this action.");
            }
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
             return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    } 
}




   
