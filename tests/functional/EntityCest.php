<?php

class EntityCest
{
    public $setSize = 50;
    
    public function _before(FunctionalTester $I)
    {

    }

    protected function getEntites()
    {
        for ($i = 1; $i < $this->setSize; $i++) {
            $item = [
                "Entity[active]" => "Y",
                "Entity[name]" => "Name $i"
            ];
            yield $item;
        }
    }

    public function seeList(FunctionalTester $I)
    {
       $I->amOnPage("/entity");
       $I->see("Сущность с секцией");
    }

    /**
     *
     * @param FunctionalTester $I
     * @depends seeList
     */
    public function createSet(FunctionalTester $I)
    {
       $items = $this->getEntites();
       foreach ($items as $item) {
            $I->amOnPage("/entity");
            $I->click("Создать элемент");
            $I->amOnPage('/entity/entity-create');
            
            foreach ($item as $key => $val) {
                $I->fillField($key, $val);
                $I->click("Создать");
            }
            //$I->see("Обновить");
       }
    }
}
