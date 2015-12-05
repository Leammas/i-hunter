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
        $obj = new User(['email' => 'foo@bar.baz']);
        $obj->validate();
        $this->assertEquals(255, mb_strlen($obj->key));
    }

    public function testUsersOnly()
    {
        $obj = new User(['email' => 'foo@bar.baz', 'role' => User::ROLE_ADMIN]);
        $this->assertFalse($obj->validate());
    }
}
