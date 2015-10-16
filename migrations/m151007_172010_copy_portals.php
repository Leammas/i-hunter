<?php

use yii\db\Migration;

class m151007_172010_copy_portals extends Migration
{
    public function safeUp()
    {
        $this->db->createCommand('CREATE TABLE {{%portal}} LIKE portals')->execute();
        $this->db->createCommand('INSERT {{%portal}} SELECT * FROM portals')->execute();
        try {
            $this->addPrimaryKey('p', '{{%portal}}', ['[[id]]']);
        } catch (\Exception $e)
        {
            // Ну и х@й с ним
        }
    }

    public function down()
    {
        echo "m151007_172010_copy_portals cannot be reverted.\n";

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
