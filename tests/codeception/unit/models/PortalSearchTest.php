<?php
namespace tests\codeception\unit\models;

use app\models\PortalSearch;
use tests\codeception\unit\fixtures\PortalFixture;
use yii\codeception\TestCase;

class PortalSearchTest extends TestCase
{

    /**
     * @var PortalSearch
     */
    public $searchModel;

    public function fixtures()
    {
        return [PortalFixture::className()];
    }

    protected function setUp()
    {
        parent::setUp();
        $this->searchModel = new PortalSearch();
    }

    public function testByTitle()
    {
        $query = ['PortalSearch' => ['title' => 'foo']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(1, $dataProvider->totalCount);
        unset($query, $dataProvider);
        $query = ['PortalSearch' => ['title' => 'bar']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(0, $dataProvider->totalCount);
    }

    public function testByOwner()
    {
        $query = ['PortalSearch' => ['currOwnerId' => '1']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(1, $dataProvider->totalCount);
        unset($query, $dataProvider);
        $query = ['PortalSearch' => ['currOwnerId' => '-1']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(0, $dataProvider->totalCount);
    }

    public function testByInvolved()
    {
        $query = ['PortalSearch' => ['involved' => '2']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(1, $dataProvider->totalCount);
        unset($query, $dataProvider);
        $query = ['PortalSearch' => ['involved' => '-1']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(0, $dataProvider->totalCount);
    }

    public function testByCoords()
    {
        $query = ['PortalSearch' => ['point1' => '5.111, 10.111', 'point2' => '5.666,10.666']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(1, $dataProvider->totalCount);
        unset($query, $dataProvider);
        $query = ['PortalSearch' => ['point1' => '5.777, 10.777', 'point2' => '5.888,10.888']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(0, $dataProvider->totalCount);
    }

    public function testByTimePassed()
    {
        $query = ['PortalSearch' => ['timePassed' => '1-10000']];
        $dataProvider = $this->searchModel->search($query);
        $this->assertEquals(1, $dataProvider->totalCount);
    }

}
