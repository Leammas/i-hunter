<?php
namespace tests\codeception\unit\fixtures;

use yii\test\ActiveFixture;

class PortalFixture extends ActiveFixture
{

    use FixtureDbUtil;

    public $modelClass = 'app\models\Portal';

    public $depends = ['tests\codeception\unit\fixtures\PlayerFixture'];

}
