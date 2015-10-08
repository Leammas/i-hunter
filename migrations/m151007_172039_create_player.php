<?php

use yii\db\Migration;
use yii\db\Schema;

class m151007_172039_create_player extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%player}}', [
            'id' => Schema::TYPE_PK,
            'agentId' => Schema::TYPE_STRING,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m151007_172039_create_player cannot be reverted.\n";

        return false;
    }

}
