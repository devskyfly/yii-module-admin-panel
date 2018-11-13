## File transfer

Если необходимо дать пользователям возможность скачивать файлы, но не хотелось бы светить папку в web,
то можно использовать AbstractFileTransferControllerTrait.

```php
public function fileClass()
{
    return EntityFileExtension::class;
}

public function actionIndex($guid)
{
    return $this->sendFileByGuid($guid, $response);
}
```