## Реализация класса AbstractEntity | AbstractUnnamedEntity

```php
<?php
class EntityExtension extends AbstractEntity
{
    public static function sectionCls()
    {
        return Section::class;
    }
    
    public function extensions()
    {
        return [];
        /*return [
            'page'=>EntityPageExtension::class
        ];*/
    }

    public function binders(){
        return [];
        /*return [
            'EntityToSubEntityBinder'=>EntityToSubEntityBinder::class,
        ];*/
    }
    
    public static function selectListRoute()
    {
        return "module/entity-name/section-select-list";
    }
}
?>
```

## [Миграция extends EntityMigrationHelper | UnnamedEntityMigrationHelper](migration-helper.md);