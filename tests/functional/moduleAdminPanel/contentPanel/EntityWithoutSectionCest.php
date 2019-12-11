<?php namespace moduleAdminPanel\contentPanel;

use \FunctionalTester;
use app\models\moduleAdminPanel\contentPanel\entityWithoutSection\EntityWithoutSection;
use app\models\moduleAdminPanel\contentPanel\entityWithoutSection\EntityPageExtension;
use devskyfly\php56\types\Obj;

class EntityWithoutSectionCest 
{
    public $items_nmb=10;
    
    /**
     * @param FunctionalTester $I
     */
    public function tryCreate(FunctionalTester $I)
    {
        for($i=1;$i<=$this->items_nmb;$i++){
            $I->amOnPage('/moduleAdminPanel/contentPanel/entity-without-section');
            $I->see('Создать элемент');
            
            $I->click('Создать элемент');
            
            $active="Y";
            $name="Первый элемент {$i}";
            $title="Заголовок {$i}";
            $keywords="Ключевое слово {$i}";
            $description="Описание {$i}";
            $preview_text="Превью текст {$i}";
            $detail_text="Детальный текст {$i}";
          
            $I->amOnPage('/moduleAdminPanel/contentPanel/entity-without-section/entity-create');
            
            $I->see('Создать');
            $I->fillField("EntityWithoutSection[active]", $active);
            $I->fillField("EntityWithoutSection[name]", $name);
            $I->fillField("EntityPageExtension[title]", $title);
            $I->fillField("EntityPageExtension[keywords]", $keywords);
            $I->fillField("EntityPageExtension[description]", $description);
            $I->fillField("EntityPageExtension[preview_text]", $preview_text);
            $I->fillField("EntityPageExtension[detail_text]", $detail_text);
            
            $I->submitForm('form[name=entity-editor-form]',[],'button[type=submit]');
            $I->see('Обновить');
       
        
        
            if($active=="Y"){
                $I->seeCheckboxIsChecked('EntityWithoutSection[active]');
            }
            
            $I->seeInField("EntityWithoutSection[name]",$name);
            $I->seeInField("EntityPageExtension[title]", $title);
            $I->seeInField("EntityPageExtension[keywords]", $keywords);
            $I->seeInField("EntityPageExtension[description]", $description);
            $I->seeInField("EntityPageExtension[preview_text]", $preview_text);
            $I->seeInField("EntityPageExtension[detail_text]", $detail_text);
        }
    }
    
    /**
     * @dependes tryCreate
     */
    public function tryCheckAfterCreate(FunctionalTester $I)
    {
        $query=EntityWithoutSection::find();
        $nmb=$query->count();
        
        $I->assertEquals($this->items_nmb,$nmb);
        $items=$query->all();
        
        foreach ($items as $item){
            $extension=EntityPageExtension::findByItem($item, 'page');
            $I->assertTrue(Obj::isA($extension,EntityPageExtension::class));
        }
    }
    
    /**
     * @dependes tryCheckAfterCreate
     * @param FunctionalTester $I
     */
    public function tryToDelete(FunctionalTester $I)
    {
        $items=EntityWithoutSection::find()->all();
        foreach($items as $item){
            $item->deleteLikeItem();
        }
    }
    
    /**
     * @dependes tryToDelete
     * @param FunctionalTester $I
     */
    public function tryCheckAfterDelete(FunctionalTester $I)
    {
        $query=EntityWithoutSection::find();
        $nmb=$query->count();
        $I->assertEquals(0,$nmb);
        
        $query=EntityPageExtension::find()->where(['item_table'=>EntityWithoutSection::tableName()]);
        $nmb=$query->count();
        $I->assertEquals(0,$nmb);
    }
}
