<?php
namespace devskyfly\yiiModuleAdminPanel;

use Yii;

/**
 * This module give opportunity to create admin panel
 * 
 * @author devskyfly
 *
 */
class Module extends \yii\base\Module
{
    /**
     * Store absolute path of current module view path
     * 
     * Because AbstractContentPanelController is used by external controllers
     * @var string
     */
    private $_module_view_path;
    
    public function init()
    {
        parent::init();
        
        /**
         * Define controller namespace
         */
        if(Yii::$app instanceof \yii\console\Application){
            $this->controllerNamespace='devskyfly\yiiMuduleContenPanel\console';
        }
        
        $this->setAbsoluteViewPath();
    }
    
    /**
     * Set _module_view_path property
     * @return string
     */
    public function setAbsoluteViewPath()
    {
        return $this->_module_view_path=__DIR__.'/views';
    }
    
    /**
     * Return _module_view_path property
     * @return string
     */
    public function getAbsoluteViewPath()
    {
        return $this->_module_view_path;
    }
}