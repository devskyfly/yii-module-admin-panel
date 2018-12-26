<?php
use devskyfly\yiiModuleAdminPanel\widgets\contentPanel\EntityEditor;

/* @var $item devskyfly\yiiModuleAdminPanel\models\AbstractEntity */
/* @var $views callable */
?>
<?
$label=Yii::$app->controller->itemLabel();
$tile_prefix="";
$reflection=new ReflectionClass($item);
if($item->isNewRecord){
    $title_prefix="Создать элемент: ".$reflection->getShortName();
}else{
    $title_prefix="Обновить элемент: ".$reflection->getShortName();
}
$this->title=$title_prefix.Yii::$app->controller->itemLabel();
?>

<?=EntityEditor::widget(compact("item","views","label"));?>