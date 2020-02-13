## Миграция

Унаследовать от PageMigrationHelper.

## Реализация класса FileExtension

```php
<?php
class EntityExtension extends AbstractItemExtension
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
public function rules()
{
    $rules = parent::rules();

    $new_rules=[
        [['file'],'file', 'skipOnEmpty'=>true, 'extensions'=>'png, jpg']
    ];
    
    $rules  =ArrayHelper::merge($rules, $new_rules);
    return $rules;
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