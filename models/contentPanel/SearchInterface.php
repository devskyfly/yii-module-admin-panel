<?php
namespace devskyfly\yiiModuleAdminPanel\models\contentPanel;

interface SearchInterface
{
    /**
     * Return item by it's id
     *
     * @param string|number $id
     * @return null|\devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem
     */
    public static function getById($id);
}