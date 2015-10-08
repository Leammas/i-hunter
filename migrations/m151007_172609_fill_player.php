<?php

use yii\db\Migration;

class m151007_172609_fill_player extends Migration
{
    public function up()
    {
        $this->db->createCommand('
        INSERT INTO {{%player}}(agentId) (SELECT DISTINCT curr_owner FROM {{%portal}} )
        UNION (SELECT DISTINCT res1owner FROM {{%portal}})
        UNION (SELECT DISTINCT res2owner FROM {{%portal}})
        UNION (SELECT DISTINCT res3owner FROM {{%portal}})
        UNION (SELECT DISTINCT res4owner FROM {{%portal}})
        UNION (SELECT DISTINCT res5owner FROM {{%portal}})
        UNION (SELECT DISTINCT res6owner FROM {{%portal}})
        UNION (SELECT DISTINCT res7owner FROM {{%portal}})
        UNION (SELECT DISTINCT res8owner FROM {{%portal}})
        UNION (SELECT DISTINCT mode1owner FROM {{%portal}})
        UNION (SELECT DISTINCT mode2owner FROM {{%portal}})
        UNION (SELECT DISTINCT mode3owner FROM {{%portal}})
        UNION (SELECT DISTINCT mode4owner FROM {{%portal}})
        ')->execute();
    }

    public function down()
    {
        echo "m151007_172609_fill_player cannot be reverted.\n";

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
