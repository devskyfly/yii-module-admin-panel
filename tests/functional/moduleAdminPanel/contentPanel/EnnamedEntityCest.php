<?php namespace moduleAdminPanel\contentPanel;

use \FunctionalTester;
use app\models\moduleAdminPanel\contentPanel\unnamedEntity\UnnamedEntity;

use devskyfly\php56\types\Obj;

class UnnamedEntityCest 
{
    public $items_nmb=10;
    
    /**
     * @param FunctionalTester $I
     */
    public function tryCreate(FunctionalTester $I)
    {
        for($i=1;$i<=$this->items_nmb;$i++){
            $I->amOnPage('/moduleAdminPanel/contentPanel/unnamed-entity');
            $I->see('Создать элемент');
            
            $I->click('Создать элемент');
            
            $active="Y";
            $data="Первый элемент {$i}";

            $I->see('Создать');
            $I->checkOption("#unnamedentity-active");
            $I->fillField("UnnamedEntity[data]", $data);

            
            $I->submitForm('form[name=entity-editor-form]',[],'button[type=submit]');
            $I->see('Обновить');
       
            if($active=="Y"){
                $I->seeCheckboxIsChecked('UnnamedEntity[active]');
            }
            
            $I->seeInField("UnnamedEntity[data]",$data);

        }
    }
    
    /**
     * @dependes tryCreate
     * @param FunctionalTester $I
     */
    public function tryToDelete(FunctionalTester $I)
    {
        $items=UnnamedEntity::find()->all();
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
        $query=UnnamedEntity::find();
        $nmb=$query->count();
        $I->assertEquals(0, $nmb);
    }
}
