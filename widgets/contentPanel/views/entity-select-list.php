<?php
/* @var $this yii\web\View */
/* @var $data_provider yii\data\ActiveDataProvider */
/* @var $parent_section_id null|number */
/* @var $columns [] */
use yii\grid\GridView;

?>

<div>
	<?=GridView::widget(
	    [
	        'columns'=>$columns,
	        'dataProvider'=>$data_provider        
	    ]
    )?>
</div>
 