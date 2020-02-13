## Пример использования AbstractMigrationHelper.

```php
<?php
public function up()
{
    $fields = $this->getFieldsDefinition();
    $fields['val'] = "INTEGER(11)"; // Add field val integer type
    $this->createTable($this->table, $fields);
}
?>
```