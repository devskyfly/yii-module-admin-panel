## Реализация класса FileExtension

```php
<?php
class FileExtension extends AbstractFile
{
    protected static function itemCls()
    {
        return Entity::class;
    }
}
?>
```

## Настройка класса сущности

```php
<?php
class Entity extends AbstractEntity
{
    public $file;
    
    public function rules()
    {
        $rules = parent::rules();

        $new_rules = [
            [['file'], 'file', 'skipOnEmpty'=>true, 'extensions'=>'png,jpg']
        ];
        
        $rules = ArrayHelper::merge($rules, $new_rules);
        return $rules;
    }
}
?>
```

## Реализация класса AbstractFileTransferController

```php
class DownloadController extends AbstractFileTransferController
{
    public function fileClass()
    {
        return EntityFileExtension::class;
    }

    public function actionIndex($guid)
    {
        return $this->sendFileByGuid($guid, $response);
    }
}
```

## Виджет

```php
FileUpload::widget([
    "form"=>$form,
    "item"=>$item,
    "attribute"=>'file'
]);
```

## [Миграция extends FileMigrationHelper](../migration-helper.md);