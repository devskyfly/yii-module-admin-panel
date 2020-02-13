# Yii module admin panel

## Config

```php
'admin-panel' => [
    'class' => 'devskyfly\yiiModuleAdminPanel\Module',
    'upload_dir' => '@app/upload',
]
```

Модуль управления контентом - совокупность *сущностей*, *секций*, *расширений* и *связей*.

**Сущности** - реализуют crud операции с контентом.
**Секции** - реализуют иерархичность представления данных.
**Расширения** - реализуют расширение сущностей общими свойствами характерными для *страниц*, *прикрепленных файлов*
**Связи** - реализую отношение *сущностей* 1 ко многим

Реализованы 2 типа сущностей - **неименованная** и **именованная**.
**Неименованная** сущность используется для управления упорядоченными записями типа реестры.
**Именованная** сущность используется для управления контентом.

### Неименованная сущность:

* id: integer
* _section__id: integer
* active(required)
* create_date_time (required)
* change_date_time (required)
* sort: integer
* custom_field...

### Именованная сущность:

* id: integer
* _section__id: integer
* active: string (required)
* create_date_time: string (required)
* change_date_time: string (required)
* sort: integer
* name
* code
* custom_field...

### Расширения:

Первый способ расширения - добавление свойств в самой сущности.
Второй - [создать экземпляр AbstractEntityExtension](docs/create/extension.md). 

Доступные расширения:

* PageMigrationHelper
* FileMigrationHelper

На примере расшерения PageExtension, этой модели передаются все поля которые характерны для страницы:

* title
* keywords
* description
* detail_text
* preview_Text
* detail_picture
* preview_picture

## Создание

* [Создать контроллер](docs/create/controller.md)
* [Создать сущность](docs/create/entity.md)
* [Создать фильтр списка сущности](docs/create/entity-filter.md)
* [Создать секцию сущности](docs/create/section.md)
* [Создать расширение сущности](docs/create/extensions/extension.md)