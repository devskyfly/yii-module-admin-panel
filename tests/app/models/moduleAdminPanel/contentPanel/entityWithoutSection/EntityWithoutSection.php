<?php
namespace app\models\moduleAdminPanel\contentPanel\entityWithoutSection;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity;

class EntityWithoutSection extends AbstractEntity
{
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleContentPanel\models\contentPanel\AbstractSection::section()
     */
    public static function sectionCls()
    {
        return null;
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleContentPanel\models\contentPanel\AbstractItem::extensions()
     */
    public function extensions()
    {
         return [
            'page'=>EntityPageExtension::class
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
     * Здесь прописывается роут к списку выбора
     */
    public static function selectListRoute()
    {
        return "moduleAdminPanel/contentPanel/entity-without-section/entity-select-list";
    }
}