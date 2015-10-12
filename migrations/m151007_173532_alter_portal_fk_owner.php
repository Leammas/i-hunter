<?php

use yii\db\Migration;

class m151007_173532_alter_portal_fk_owner extends Migration
{

    public function safeUp()
    {
        $this->db->createCommand('ALTER TABLE `player` CHANGE `agentId` `agentId` VARCHAR(255) CHARSET utf8 COLLATE utf8_unicode_ci NULL; ')->execute();
        $this->addColumn('{{%portal}}', 'currOwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'res1OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'res2OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'res3OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'res4OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'res5OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'res6OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'res7OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'res8OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'mod1OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'mod2OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'mod3OwnerId', \yii\db\Schema::TYPE_INTEGER);
        $this->addColumn('{{%portal}}', 'mod4OwnerId', \yii\db\Schema::TYPE_INTEGER);

        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.curr_owner SET po.currOwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.res1owner SET po.res1OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.res2owner SET po.res2OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.res3owner SET po.res3OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.res4owner SET po.res4OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.res5owner SET po.res5OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.res6owner SET po.res6OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.res7owner SET po.res7OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.res8owner SET po.res8OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.mode1owner SET po.mod1OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.mode2owner SET po.mod2OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.mode3owner SET po.mod3OwnerId = pl.id')->execute();
        $this->db->createCommand('UPDATE portal po INNER JOIN player pl ON pl.agentId = po.mode4owner SET po.mod4OwnerId = pl.id')->execute();

        $this->addForeignKey('currOwner_FK', '{{%portal}}', '[[currOwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('res1Owner_FK', '{{%portal}}', '[[res1OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('res2Owner_FK', '{{%portal}}', '[[res2OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('res3Owner_FK', '{{%portal}}', '[[res3OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('res4Owner_FK', '{{%portal}}', '[[res4OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('res5Owner_FK', '{{%portal}}', '[[res5OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('res6Owner_FK', '{{%portal}}', '[[res6OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('res7Owner_FK', '{{%portal}}', '[[res7OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('res8Owner_FK', '{{%portal}}', '[[res8OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('mode1owner_FK', '{{%portal}}', '[[mod1OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('mode2owner_FK', '{{%portal}}', '[[mod2OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('mode3owner_FK', '{{%portal}}', '[[mod3OwnerId]]', '{{%player}}', '[[id]]');
        $this->addForeignKey('mode4owner_FK', '{{%portal}}', '[[mod4OwnerId]]', '{{%player}}', '[[id]]');
    }

    public function safeDown()
    {
        echo "m151007_173532_alter_portal_fk_owner cannot be reverted.\n";

        return false;
    }

}
