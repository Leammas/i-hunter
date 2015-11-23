<?php
namespace models;

use app\models\Portal;
use app\models\PortalQuery;
use Codeception\Util\Stub;
use tests\codeception\unit\fixtures\PortalFixture;
use yii\codeception\TestCase;

class PortalTest extends TestCase
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

    public function testGetIconColor()
    {
        $portal1 = Stub::make(new Portal(), ['getTimePassed' => 0]);
        $portal2 = Stub::make(new Portal(), ['getTimePassed' => 90]);
        $portal3 = Stub::make(new Portal(), ['getTimePassed' => 150]);
        $portal4 = Stub::make(new Portal(), ['getTimePassed' => 200]);
        $this->assertEquals('#FFFF00', $portal1->getIconColor());
        $this->assertEquals('#FF0000', $portal2->getIconColor());
        $this->assertEquals('#000000', $portal3->getIconColor());
        $this->assertEquals('#FFFFFF', $portal4->getIconColor());
    }
}