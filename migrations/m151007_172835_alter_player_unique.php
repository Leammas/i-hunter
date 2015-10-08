<?php

use yii\db\Migration;

class m151007_172835_alter_player_unique extends Migration
{
    public function up()
    {
        $this->createIndex('agentId', '{{%player}}', ['agentId'], true);
    }

    public function down()
    {
        echo "m151007_172835_alter_player_unique cannot be reverted.\n";

        return false;
    }

}
