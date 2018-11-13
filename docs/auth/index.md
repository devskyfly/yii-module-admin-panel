## Auth

Представляет из себя кооперацию модели devskyfly\yiiModuleAdminPanel\models\auth\User и devskyfly\yiiModuleAdminPanel\console\auth\UserController
для управления пользователями.

Если есть необходимость в реализации своей собственной модели User, то надо ее наследовать от extends ActiveRecord implements IdentityInterface.

Надо создать консольный контроллер унаследованный от devskyfly\yiiModuleAdminPanel\console\auth\UserController и переопределить метод.

```php
protected static function getUserClass()
{
    return User::class;
}
```