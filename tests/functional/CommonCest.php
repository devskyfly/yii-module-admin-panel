<?php

class CommonCest
{
    public function _before(FunctionalTester $I)
    {

    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
       codecept_debug("-***-".\Yii::getAlias("@webroot"));
       codecept_debug("-***-".\Yii::getAlias("@web"));

    }
}
