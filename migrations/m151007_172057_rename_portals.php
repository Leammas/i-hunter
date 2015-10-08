<?php

use yii\db\Migration;

class m151007_172057_rename_portals extends Migration
{
    public function up()
    {
        $this->renameTable('{{%portals}}', '{{%portal}}');
    }

    public function down()
    {
        echo "m151007_172057_rename_portals cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
