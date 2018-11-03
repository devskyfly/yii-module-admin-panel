<?php
/* @var $this yii\web\View */
/* @var $list [] */
/* @var $parent_section_id null|number */
/* @var $section_cls */
use devskyfly\php56\types\Vrbl;
use yii\helpers\Html;

?>
<div class="content-panel-section-list-for-select">
    <table class="table">
    <?if(Vrbl::isEmpty($parent_section_id)):?>
    	<tr>
        	<td>-</td>
        	<td></td>
        	<td><a>#</a></td>
        	<td class="content-panel-item-selector__item">
        		<input type="hidden" class="content-panel-item-selector__item-name" value="#"/>
        		<input type="hidden" class="content-panel-item-selector__item-id" value=""/>
            	<a>
            		<span class="glyphicon glyphicon-link content-panel-item-selector__item-link-button"></span>
            	</a>
    		</td>
    	</tr>
    <?endif;?>
    <?foreach ($list as $item):?>
    	<tr>
        	<td><?=$item['order']?></td>
        	<td><span class="<?=$item['active']?"glyphicon glyphicon-ok":""?>"></span></td>
        	<td><?=Html::a($item['name'],$item['sub_section_url'])?></td>
        	<td class="content-panel-item-selector__item">
        		<input type="hidden" class="content-panel-item-selector__item-name" value="<?=addslashes($item['name'])?>"/>
        		<input type="hidden" class="content-panel-item-selector__item-id" value="<?=$item['id']?>"/>
            	<a>
            		<span class="glyphicon glyphicon-link content-panel-item-selector__item-link-button"></span>
            	</a>
    		</td>
    	</tr>
    <?endforeach;?>
    </table>
</div>

<?
$table_name=$section_cls::tableName();

$script = <<<JS_SCRIPT
    var container=$(".content-panel-section-list-for-select");
    var items=$(container).find(".content-panel-item-selector__item");
    $.each(items,function(key,item){
        var id=$(item).find(".content-panel-item-selector__item-id").val();
        var name=$(item).find(".content-panel-item-selector__item-name").val();
        $(item).find(".content-panel-item-selector__item-link-button").click(function(){
        var slave_objects=window.opener.content_panel.slave_objects["$table_name"];
            slave_objects.setId(id);
            slave_objects.setName(name);
            slave_objects.closeWindow();
        });
    });
JS_SCRIPT;
?>

<?$this->registerJs($script);?>