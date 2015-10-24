<?php

use yii\db\Migration;

class m151024_093026_alter_pl_lat_lng_to_decimal extends Migration
{

    public function up()
    {
        $this->alterColumn('{{%portal}}', '[[lat]]', $this->decimal(10,7));
        $this->alterColumn('{{%portal}}', '[[lng]]', $this->decimal(10,7));
    }

    public function down()
    {
        echo "m151024_093026_alter_pl_lat_lng_to_decimal cannot be reverted.\n";

        return false;
    }

}
