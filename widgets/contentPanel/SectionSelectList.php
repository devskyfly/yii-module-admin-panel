<?php
namespace devskyfly\yiiModuleAdminPanel\widgets\contentPanel;

use yii\helpers\Url;

class SectionSelectList extends SectionList
{
    /**
     * Init $list property
     */
    protected function formList()
    {
        $section=$this->section_cls;
        $query=$section::find()->andWhere(['__id'=>$this->parent_section_id]);
        $query=$query->orderBy($this->sort);
        
        $result=$query->all();
        $i=0;
        foreach ($result as $item){
            $i++;
            $this->list[]=[
                "order"=>$i,
                "active"=>$item->active=="Y"?true:false,
                "id"=>$item->id,
                "name"=>$item->name,
                "sub_section_url"=>Url::toRoute(['section-select-list','parent_section_id'=>$item->id]),
            ];
        }
    }
    
    public function run()
    {
        return $this->render('section-select-list',$this->variables);
    }
}