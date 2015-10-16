<?php

use yii\db\Migration;
use yii\db\Schema;

class m151015_185719_add_user_table extends Migration
{
    public function up()
    {
        if (!in_array('user', $this->db->schema->tableNames))
        {
            $this->createTable('{{%user}}', [
                'id' => Schema::TYPE_PK,
                'email' => Schema::TYPE_STRING,
                'key' => Schema::TYPE_STRING,
                'role' => Schema::TYPE_STRING,
                'created_at' => Schema::TYPE_TIMESTAMP,
                'updated_at' => Schema::TYPE_TIMESTAMP
            ]);

            $this->createIndex('email_unique', '{{%user}}', 'email', true);
            $this->createIndex('key_unique', '{{%user}}', 'key', true);
        }
    }

    public function down()
    {
        echo "m151015_185719_add_user_table cannot be reverted.\n";

        return false;
    }

}
