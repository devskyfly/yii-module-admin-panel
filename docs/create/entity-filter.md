## Реализация класса FilterInterface

```php
<?php
class EntityFilter extends Entity implements FilterInterface
{
    use FilterTrait;
    
    public function rules()
    {
        return [[["data","active"],"string"]];
    }
}
?>