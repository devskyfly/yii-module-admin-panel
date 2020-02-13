## Реализация класса AbstractItemExtension

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

## [Миграция extends ExtensionMigrationHelper](../migration-helper.md);
