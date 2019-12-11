<?php namespace moduleAdminPanel\contentPanel;

use app\models\moduleAdminPanel\contentPanel\entityWithSection\Entity;
use app\models\moduleAdminPanel\contentPanel\entityWithSection\Section;
use app\models\moduleAdminPanel\contentPanel\entityWithSection\SectionPageExtension;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Obj;
use FunctionalTester;

class EntityWithSectionCest 
{
    public $sections_nmb=6;
    public $items_nmb=10;
    
    public function tryCreateSections(FunctionalTester $I)
    {
        for($i=1;$i<=$this->sections_nmb;$i++){
            $I->amOnPage('/moduleAdminPanel/contentPanel/entity-with-section');
            $I->see('Создать раздел');
            $I->click('Создать раздел');
            
            $active="Y";
            $name="Первый элемент {$i}";
            $code="code_{$i}";
            $title="Заголовок {$i}";
            $keywords="Ключевое слово {$i}";
            $description="Описание {$i}";
            $preview_text="Превью текст {$i}";
            $detail_text="Детальный текст {$i}";
            
            $I->amOnPage('/moduleAdminPanel/contentPanel/entity-with-section/section-create');
            
            $I->see('Создать');
            $I->fillField("Section[active]", $active);
            
            if($i>3){
                $I->fillField("Section[__id]", ($i-1));
            }
            
            $I->fillField("Section[name]", $name);
            $I->fillField("Section[code]", $code);
            $I->fillField("SectionPageExtension[title]", $title);
            $I->fillField("SectionPageExtension[keywords]", $keywords);
            $I->fillField("SectionPageExtension[description]", $description);
            $I->fillField("SectionPageExtension[preview_text]", $preview_text);
            $I->fillField("SectionPageExtension[detail_text]", $detail_text);
            
            $I->submitForm('form[name=section-editor-form]',[],'button[type=submit]');
            $I->see('Обновить');
            
            if($active=="Y"){
                $I->seeCheckboxIsChecked('Section[active]');
            }
            
            $I->seeInField("Section[name]",$name);
            $I->seeInField("Section[code]",$code);
            $I->seeInField("SectionPageExtension[title]", $title);
            $I->seeInField("SectionPageExtension[keywords]", $keywords);
            $I->seeInField("SectionPageExtension[description]", $description);
            $I->seeInField("SectionPageExtension[preview_text]", $preview_text);
            $I->seeInField("SectionPageExtension[detail_text]", $detail_text);
        }
    }
    
    public function testAfterSectionsCreate(FunctionalTester $I)
    {
        $query=Section::find();
        $nmb=Nmbr::toInteger($query->count());
        
        $I->assertEquals($this->sections_nmb,$nmb);
        
        $items=$query->all();
        
        foreach ($items as $item){
            $extension=SectionPageExtension::findByItem($item, 'page');
            $I->assertTrue(Obj::isA($extension,SectionPageExtension::class));
        } 
    }
    
    /**
     * @depends tryCreateSections
     * @param FunctionalTester $I
     */
    public function tryCreateEntities(FunctionalTester $I)
    {
         for($i=1;$i<=$this->items_nmb;$i++){
            $I->amOnPage('/moduleAdminPanel/contentPanel/entity-with-section');
            $I->see('Создать элемент');
            
            $I->click('Создать элемент');
            
            $active="Y";
            $name="Первый элемент {$i}";
            $code="code_{$i}";
            $title="Заголовок {$i}";
            $keywords="Ключевое слово {$i}";
            $description="Описание {$i}";
            $preview_text="Превью текст {$i}";
            $detail_text="Детальный текст {$i}";
            
            $I->amOnPage('/moduleAdminPanel/contentPanel/entity-with-section/entity-create');
            
            $I->see('Создать');
            
            if($i<=3){
                $I->fillField("Entity[_section__id]", $i);
            }elseif(($i>3)
                &&($i<=4)){
                $I->fillField("Entity[_section__id]", $i);
            }elseif(($i>4)
                &&($i<=7)){
                $I->fillField("Entity[_section__id]", $i-2);
            }elseif($i>7){
                $I->fillField("Entity[_section__id]", 6);
            }
            
            $I->fillField("Entity[active]", $active);
            $I->fillField("Entity[name]", $name);
            $I->fillField("Entity[code]", $code);
            $I->fillField("EntityPageExtension[title]", $title);
            $I->fillField("EntityPageExtension[keywords]", $keywords);
            $I->fillField("EntityPageExtension[description]", $description);
            $I->fillField("EntityPageExtension[preview_text]", $preview_text);
            $I->fillField("EntityPageExtension[detail_text]", $detail_text);
            
            $I->submitForm('form[name=entity-editor-form]',[],'button[type=submit]');
            $I->see('Обновить');
        
        
        
            if($active=="Y"){
                $I->seeCheckboxIsChecked('Entity[active]');
            }
            
            $I->seeInField("Entity[name]",$name);
            $I->seeInField("Entity[code]",$code);
            $I->seeInField("EntityPageExtension[title]", $title);
            $I->seeInField("EntityPageExtension[keywords]", $keywords);
            $I->seeInField("EntityPageExtension[description]", $description);
            $I->seeInField("EntityPageExtension[preview_text]", $preview_text);
            $I->seeInField("EntityPageExtension[detail_text]", $detail_text);
        }
    }
    
    /**
     * @depends tryCreateEntities
     * @param FunctionalTester $I
     */
    public function tryDeleteSection(FunctionalTester $I)
    {
        $query=Section::find();
        $sections_start_nmb=$query->count();
        
        $query=Entity::find();
        $entities_start_nmb=$query->count();
        
        #
        $I->amOnPage('/moduleAdminPanel/contentPanel/entity-with-section/section-edit?section_id=1');
        $I->see('Удалить');
        $I->click('Удалить');
        
        $query=Section::find();
        $sections_nmb=$query->count();
        
        $query=Entity::find();
        $entitites_nmb=$query->count();
        
        $I->assertEquals($sections_nmb,5);
        $I->assertEquals($entitites_nmb,9);
        
        #
        $I->amOnPage('/moduleAdminPanel/contentPanel/entity-with-section/section-edit?section_id=2');
        
        $I->see('Удалить');
        $I->click('Удалить');
        
        $query=Section::find();
        $sections_nmb=$query->count();
        
        $query=Entity::find();
        $entitites_nmb=$query->count();
        
        $I->assertEquals($sections_nmb,4);
        $I->assertEquals($entitites_nmb,8);
        
        #
        $I->amOnPage('/moduleAdminPanel/contentPanel/entity-with-section/section-edit?section_id=3');
        $I->see('Удалить');
        $I->click('Удалить');
        
        $query=Section::find();
        $sections_nmb=$query->count();
        
        $query=Entity::find();
        $entitites_nmb=$query->count();
        
        $I->assertEquals($sections_nmb,0);
        $I->assertEquals($entitites_nmb,0);
    }
    
}
