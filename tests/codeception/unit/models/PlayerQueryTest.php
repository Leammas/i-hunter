<?php
namespace models;

use app\models\Player;
use app\models\PlayerQuery;
use tests\codeception\unit\fixtures\PlayerFixture;
use yii\codeception\TestCase;

class PlayerQueryTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function fixtures()
    {
        return [PlayerFixture::className()];
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAll()
    {
        $this->assertCount(2, Player::find()->all());
    }

}