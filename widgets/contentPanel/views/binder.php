<?php
use devskyfly\php56\core\Cls;
use devskyfly\php56\types\Obj;
use devskyfly\php56\types\Vrbl;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $label string */
/* @var $master_item \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem */
/* @var $list [] */
/* @var $slave_item_cls \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem */
/* @var $binder_cls \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem */
/* @var $property string */
?>

<?
$binder=new $binder_cls();
$bem="content-panel-binder";
$wrapper_id=$wrapper_class_name.'-'.$binder_cls;
$tbl_row_tmp = <<<TBL_ROW_TMP
<tr>
    <td>#hidden_fields#</td>
    <td><input type="text" class="content-panel-binder__item-name"/ value="#slave_item_name#"></td>
    <td>
        <a>
    		<span class="glyphicon glyphicon-link content-panel-binder__link-button"></span>
    		<span class="glyphicon glyphicon-trash content-panel-binder__delete-button"></span>
    	</a>
    </td>
</tr>
TBL_ROW_TMP;

$hidden_fields=$form->field($binder,'master_id')->hiddenInput()->label(false).$form->field($binder,'slave_id')->hiddenInput()->label(false);
$slave_item_name="";

$new_tbl_row=str_replace(["#hidden_fields#","#slave_item_name#"], [$hidden_fields,$slave_item_name], $tbl_row_tmp);
?>

<?if(!$master_item->isNewRecord):?>
<div style="padding-bottom:30px" class="$wrapper_class_name row" id="<?=$wrapper_id?>">
    <div class="col-xs-12">
        <div>
        	<strong><?=$label?></strong>
        </div>
        <table>
        	<?$i=0;?>
        	<?foreach ($list as $item):?>
        		<?
        		$i++;
        		$hidden_fields=$form->field($item['binder'],'master_id')->hiddenInput()->label(false)
        		.$form->field($item['binder'],'slave_id')->hiddenInput()->label(false);
        		$slave_item_name=Vrbl::isEmpty($item->slave)?"":$item->slave->name;
        		?>
        		<?=str_replace(["#hidden_fields#","#slave_item_name#"], [$hidden_fields,$slave_item_name], $tbl_row_tmp)?>
        	<?endforeach;?>
        	<?if($i==0):?>
        		<?=str_replace(["#hidden_fields#","#slave_item_name#"], [$hidden_fields,$slave_item_name], $tbl_row_tmp)?>
        	<?endif;?>
        </table>
    </div>
</div>
<?endif;?>
<?

$url=Url::toRoute($slave_item_cls::selectListRoute());
$table_name=$slave_item_cls::tableName();
$script = <<<JS_SCRIPT
var item_selector=$("#$content_panel_item_selector_id");
var slave_id=$(content_panel_item_selector).find("#$master_item_table_name-$property");
var slave_name=$(content_panel_item_selector).find(".content-panel-item-selector__item-name");
var link_button=$(content_panel_item_selector).find('.content-panel-item-selector_link-button');

var slave_window=null;

var slave_obj={
setId:function(id){slave_id.val(id)},
setName:function(name){slave_name.html(name)},
closeWindow:function(){slave_window.close();}
};

$(link_button).click(
function(){
    slave_window=window.open("$url");
    if(!('content_panel' in window)){
        window.content_panel={};
        if(!('slave_objects' in window.content_panel)){
            window.content_panel={slave_objects:{}}
        }
    }
    window.content_panel.slave_objects={"$table_name":slave_obj};
});
JS_SCRIPT;
?>

<?//$this->registerJs($script);?>