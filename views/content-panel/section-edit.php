<?php
use devskyfly\yiiModuleAdminPanel\widgets\contentPanel\SectionEditor;

/* @var $item devskyfly\yiiModuleAdminPanel\models\AbstractSection */
/* @var $views callable */
?>
<?
$label=Yii::$app->controller->itemLabel();
$tile_prefix="";
$reflection=new ReflectionClass($item);
if($item->isNewRecord){
    $title_prefix="Создать раздел: ".$reflection->getShortName();
}else{
    $title_prefix="Обновить раздел: ".$reflection->getShortName();
}
$this->title=$title_prefix.Yii::$app->controller->itemLabel();
?>

<?=SectionEditor::widget(compact("item","views","label"));?>