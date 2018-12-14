<?php
/* @var $this yii\web\View */
/* @var $data_provider yii\data\ActiveDataProvider */
/* @var $parent_section_id null|number */
/* @var $columns [] */
use devskyfly\yiiModuleAdminPanel\Module;
use yii\grid\GridView;

?>

<div class="<?=Module::CSS_NAMESPACE.'content-panel-entity-select-list'?>">
	<?=GridView::widget(
	    [
	        'columns'=>$columns,
	        'dataProvider'=>$data_provider        
	    ]
    )?>
</div>

<?
$entity_select_list=Module::CSS_NAMESPACE.'content-panel-entity-select-list';
$entity_select_list__item_link_button=Module::CSS_NAMESPACE.'content-panel-entity-select-list__item-link-button';

$js= <<<JS_SCRIPT
$('.$entity_select_list__item_link_button').click(function(event){
    alert('ok');    
    event.preventDefault();
    
});
JS_SCRIPT;
?>

<?$this->registerJs($js);?>