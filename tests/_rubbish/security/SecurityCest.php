<?php namespace moduleAdminPanel\security;

use FunctionalTester;

class SecurityCest
{
    public function tryAddIp(FunctionalTester $I)
    {

            $I->amOnPage('/admin-panel/security/ip-black-list');
            $I->see('Создать элемент');
            $I->click('Создать элемент');
            
            $I->amOnPage('/admin-panel/security/ip-black-list/entity-create');

            $active="Y";
            $ip="127.0.0.1";

            $I->fillField('IpBlackList[ip]', $ip);
            $I->fillField('IpBlackList[active]', $active);

            $I->see('Создать');
            $I->click('Создать');

            $I->amOnPage('/admin-panel/security/ip-black-list/entity-edit?entity_id=1');
            $I->seeInField('IpBlackList[ip]', '127.0.0.1');
            $I->see('Обновить');
    }        

    /**
     * @depends tryAddIp
     */
    public function tryCheckAccessDenied(FunctionalTester $I)
    {
        $I->amOnPage('/moduleAdminPanel/security/common/index');
        $I->seeResponseCodeIs(403);
    }

     /**
     * @depends tryCheckAccessDenied
     */
    public function tryDisableIp(FunctionalTester $I)
    {
        $I->amOnPage('/admin-panel/security/ip-black-list/entity-edit?entity_id=1');
        $I->uncheckOption("#ipblacklist-active");
        $I->click('Обновить');
    }

    /**
     * @depends tryDisableIp
     */
    public function tryAccessAllowAfterDisable(FunctionalTester $I)
    {
        $I->amOnPage('/moduleAdminPanel/security/common/index');
    }

    /**
     * @depends tryAccessAllowAfterDisable
     */
    public function tryRemoveIp(FunctionalTester $I)
    {
        $I->amOnPage('/admin-panel/security/ip-black-list/entity-edit?entity_id=1');
        $I->click('Удалить');
    }

    /**
     * @depends tryRemoveIp
     */
    public function tryAccessAllowed(FunctionalTester $I)
    {
        $I->amOnPage('/moduleAdminPanel/security/common/index');
        $I->seeResponseCodeIs(200);
    }
}
