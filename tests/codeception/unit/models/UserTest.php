<?php

namespace tests\codeception\unit\models;

use app\models\User;
use yii\codeception\TestCase;

class UserTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        // uncomment the following to load fixtures for user table
        //$this->loadFixtures(['user']);
    }

    public function testDefaultKey()
    {
        $obj = new User(['email' => 'lalam@lalam.com', 'role' => 'admin']);
        $obj->validate();
        $this->assertEquals(255, mb_strlen($obj->key));
    }
}
