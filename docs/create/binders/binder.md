## Реализация класса AbstractBinder

```php
<?php
class EntityToSubEntityBinder extends AbstractBinder
{
    protected static function slaveCls()
    {
        return Entity::class;
    }

    protected static function masterCls()
    {
        return SubEntity::class;
    }
}
?>
```

## [Миграция extends BinderMigrationHelper](../migration-helper.md);