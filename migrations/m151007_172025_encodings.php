<?php

use yii\db\Migration;

class m151007_172025_encodings extends Migration
{
    public function up()
    {
        $this->db->createCommand('ALTER TABLE `portals` CHANGE `res3owner` `res3owner` TEXT CHARSET utf8 COLLATE utf8_unicode_ci NULL, CHANGE `res7owner` `res7owner` TEXT CHARSET utf8 COLLATE utf8_unicode_ci NULL;')->execute();
    }

    public function down()
    {
        echo "m151007_172025_encodings cannot be reverted.\n";

        return false;
    }

}
