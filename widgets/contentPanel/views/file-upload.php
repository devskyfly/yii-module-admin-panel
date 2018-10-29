<?php
use yii\helpers\StringHelper;
use yii\helpers\FileHelper;

/* @var $view \yii\web\View */
/* @var $form \yii\widgets\ActiveForm */
/* @var $item \devskyfly\yiiModuleAdminPanel\models\AbstractItem */
/* @var $file \devskyfly\yiiModuleAdminPanel\models\AbstractFile */
/* @var $attribute string */
?>

<style>
.devskyfly-yii-admin-panel__image-preview{
    width:200px;
    height: 200px;
}
</style>

<?php 
$images_extensions=['png','jpg','jpeg','gif'];
$extension=FileHelper::getExtensionsByMimeType(FileHelper::getMimeType($file->path));
?>
<div>
	<label><?=StringHelper::mb_ucfirst($attribute)?></label>
	
	<div>
		<?if(in_array($extension[0], $images_extensions)):?>
			<img 
			class="devskyfly-yii-admin-panel__image-preview"
			src="<?=$file->path?>"/>
		<?else:?>
			<span class="glyphicon glyphicon-file"></span>
		<?endif;?>
		<span>
			File path: <?=$file->path?>
		</span>
	</div>
	
	<?=$form->field($item, $attribute)->fileInput()->label('')?>
</div>
