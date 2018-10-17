<?php
/* @var $this yii\web\View */
/* @var $data_provider yii\data\ActiveDataProvider */
/* @var $parent_section_id null|number */
/* @var $columns [] */
use yii\grid\GridView;

?>
<div style="padding-bottom:20px">
	<?=$this->render('_entity-list-buttons',["parent_section_id"=>$parent_section_id])?>
</div>
<div>
	<?=GridView::widget(
	    [
	        'columns'=>$columns,
	        'dataProvider'=>$data_provider        
	    ]
	    )?>
</div>
 