<?php
namespace models;

use app\models\Player;
use app\models\Portal;
use app\models\PortalQuery;
use tests\codeception\unit\fixtures\PortalFixture;
use yii\codeception\TestCase;

class PortalQueryTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function fixtures()
    {
        return [PortalFixture::className()];
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testPortalsByOwner()
    {
        $this->assertCount(1, Portal::find()->portalsByOwner(new Player(['id' => 1]))->all());
        $this->assertCount(0, Portal::find()->portalsByOwner(new Player(['id' => 2]))->all());
    }

    public function testPortalsByInvolved()
    {
        $this->assertCount(1, Portal::find()->portalsByInvolved(new Player(['id' => 1]))->all());
        $this->assertCount(0, Portal::find()->portalsByInvolved(new Player(['id' => 2]))->all());
    }

}