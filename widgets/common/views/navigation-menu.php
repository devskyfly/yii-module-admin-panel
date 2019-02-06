<?php
/* @var $this \yii\web\View */
/* @var $list [] */
use yii\helpers\Url;

?>
<div>
    <?php foreach ($list as $item):?>
    
    <div>
        <div>
        <h3><?=$item['label']?></h3>
        </div>
        <div>
            <ul class="list-group">
            <?php foreach ($item['sub_list'] as $sub_item):?>
            	<li class="list-group-item">
                	<a href="<?=Url::toRoute([$sub_item['route']])?>">
                		<?=$sub_item['name']?>
                	</a>
            	</li>
        	<?php endforeach;?>
            </ul>
        </div>
    </div>
    <?php endforeach;?>
</div>