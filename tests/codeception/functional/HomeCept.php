<?php

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->see('Master Data');
$I->seeLink('Data Entry');
$I->click('Data Entry');
$I->see('Works');
