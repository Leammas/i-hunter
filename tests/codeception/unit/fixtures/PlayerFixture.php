<?php
namespace tests\codeception\unit\fixtures;

use yii\test\ActiveFixture;

class PlayerFixture extends ActiveFixture
{

    use FixtureDbUtil;

    public $modelClass = 'app\models\Player';

}
