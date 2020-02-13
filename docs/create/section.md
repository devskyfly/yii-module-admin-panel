## Реализация класса AbstractSection

```php
<?php
class Section extends AbstractSection
{
    public static function entityCls()
    {
        return Entity::class;
    }
    
    public function extensions()
    {
        return [];
        /*return [
            'page' = >SectionPageExtension::class
        ];*/
    }
   
    public static function selectListRoute()
    {
        return "module/entity-name/section-select-list";
    }
}
?>
```

## [Миграция extends SectionMigrationHelper](migration-helper.md);