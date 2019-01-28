<?php
use devskyfly\php56\types\Vrbl;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $master_item \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem */
/* @var $slave_item \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem */
/* @var $slave_item_cls \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem */
/* @var $property string */
?>

<?
$widget_id="content-panel-item-selector"."-".$master_item::tableName()."-".$property;
$master_item_table_name=$master_item::tableName();
?>
<div 
class="well well-sm" 
id="<?=$widget_id?>">
    <div 
    style="padding-bottom:30px" 
    class="content-panel-item-selector" >
        <?=$form->field($master_item,$property)->hiddenInput()?>
        <div>
            <strong
            class="content-panel-item-selector__item-name">
                <?if(!Vrbl::isEmpty($slave_item)):?>
                	<?=$slave_item->name?>
                <?else:?>
                	Связь не установлена
                <?endif;?>
            </strong>
            <a>
        		<span class="glyphicon glyphicon-link content-panel-item-selector_link-button">
        		</span>
        	</a>
        </div>
    </div>
</div>
<?

$url=Url::toRoute([$slave_item_cls::selectListRoute(),'bind_name'=>$widget_id]);

$fn_name="content_panel_item_selector_{$master_item::tableName()}_$property";
$script = <<<JS_SCRIPT
function $fn_name(){
    var content_panel_item_selector=$("#$widget_id");
    
    var slave_id=$(content_panel_item_selector).find("#$master_item_table_name-$property");
    var slave_name=$(content_panel_item_selector).find(".content-panel-item-selector__item-name");
    var link_button=$(content_panel_item_selector).find('.content-panel-item-selector_link-button');
    
    
    $(link_button).click(
        function(){
            var slave_window=window.open("$url");
            
            var slave_obj={
                name: '#$master_item_table_name-$property',
                setId:function(id){
                    console.log(this);
                    slave_id.val(id)
                },
                setName:function(name){
                    console.log(this);
                    slave_name.html(name)
                },
                closeWindow:function(){slave_window.close();}
            };
    
            if(!('content_panel' in window)){
                window.content_panel={};
                if(!('slave_objects' in window.content_panel)){
                    Window.content_panel={slave_objects:{}}
                }
            }
    
            window.content_panel.slave_objects={"$widget_id":slave_obj};
        }
    );
};
{$fn_name}();
JS_SCRIPT;
?>

<?$this->registerJs($script);?>