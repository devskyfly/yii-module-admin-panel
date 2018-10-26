<?php
namespace devskyfly\yiiModuleAdminPanel\models\contentPanel;

use Ramsey\Uuid\Uuid;
use devskyfly\php56\types\Str;
use devskyfly\php56\types\Vrbl;
use yii\helpers\ArrayHelper;
use GuzzleHttp\Psr7\UploadedFile;

/**
 * 
 * @author devskyfly
 * @property string $item_table
 * @property string $__id
 * @property string $path
 * @property string $guid
 */
abstract class AbstractFile extends AbstractItemExtension
{
    /**
     * File property to make upload and validation
     * 
     * @var string
     */
    public $file;
    
    /**********************************************************************/
    /** REDECLARATE **/
    /**********************************************************************/
    
    /**
     * 
     * {@inheritDoc}
     * @see \yii\db\BaseActiveRecord::init()
     * @throws \Ramsey\Uuid\Exception\UnsatisfiedDependencyException
     */
    public function init()
    {
        parent::init();
        if($this->isNewRecord){
            $uuid4=Uuid::uuid4();
            $this->guid=$uuid4->toString();
        }
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \yii\base\Model::rules()
     */
    public function rules()
    {
        $rules=parent::rules();
        
        $file_extensions=$this->fileValidationRules();
        
        if(!Str::isString()){
            throw \InvalidArgumentException('Param $$file_extensions is not string type.');
        }
        
        $new_rules=[
            [["guid"],"required"],
            [["path","guid"],"string"]
        ];
        
        $rules=ArrayHelper::merge($rules, $new_rules);
        return $rules;
    }
    
     /**
     * Return file extensions for validation separated by comma
     * 
     * @return string 
     */
    //abstract protected function fileExtensions(); 
    
    protected function handleFileUpload()
    {
        $module=Yii::$app->getModule('admin-panel');
        
        if(Vrbl::isNull($module)){
            throw \Exception('admin-panel module is not loaded.');
        }
        
        $upload_dir=$module->upload_dir;
        $this->master_item[$this->extension_name]= UploadedFile::detInstance($this->master_item,$this->extension_name);
        
        if($this->master_item->validate()){
            
        }
    }
    
    public static function tableName()
    {
        return "file";
    }
}