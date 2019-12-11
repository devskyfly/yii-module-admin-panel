<?php
namespace app\models\moduleAdminPanel\contentPanel\entityWithSection;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractSection;

class Section extends AbstractSection
{
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleContentPanel\models\contentPanel\AbstractSection::entity()
     */
    public static function entityCls()
    {
        return Entity::class;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleContentPanel\models\contentPanel\AbstractItem::extensions()
     */
    public function extensions()
    {
        return [
            'page'=>SectionPageExtension::class
        ];
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleContentPanel\models\contentPanel\AbstractItem::binders()
     */
    public function binders()
    {
        return [];
    }
   
    /**
     * {@inheritdoc}
     * @see devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem::selectListRoute()
     */
    public static function selectListRoute()
    {
        return "moduleAdminPanel/contentPanel/entity-with-section/section-select-list";
    }
}