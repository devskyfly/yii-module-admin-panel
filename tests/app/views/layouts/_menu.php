<?php
/* @var $view \yii\web\View */

use devskyfly\yiiModuleAdminPanel\widgets\common\NavigationMenu;

$list=[
    [
        'label'=>'Admin panel',
        'sub_list'=>[
            ['name'=>'Список','route'=>'moduleAdminPanel/contentPanel/entity-without-section'],
            ['name'=>'Список с секцией','route'=>'moduleAdminPanel/contentPanel/entity-with-section'],
            ['name'=>'Неименованный список','route'=>'moduleAdminPanel/contentPanel/unnamed-entity'],
            ['name'=>'Скачать файл','route'=>'moduleAdminPanel/contentPanel/file-transfer'],
        ],
    ],
    [
        'label'=>'Search',
        'sub_list'=>[
            ['name'=>'Результат поиска','route'=>'moduleAdminPanel/search/query'],
            
        ],
    ],
    [
        'label'=>'Security',
        'sub_list'=>[
            ['name'=>'Черный список (редактор)','route'=>'admin-panel/security/ip-black-list'],
            ['name'=>'Черный список (проверка)','route'=>'moduleAdminPanel/security/common/index'],
        ],
    ],

];
?>

<?=NavigationMenu::widget(['list'=>$list])?>
