<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%player}}".
 *
 * @property integer $id
 * @property string $agentId
 *
 * @property Portal[] $portals
 * @property Portal[] $portals0
 * @property Portal[] $portals1
 * @property Portal[] $portals2
 * @property Portal[] $portals3
 * @property Portal[] $portals4
 * @property Portal[] $portals5
 * @property Portal[] $portals6
 * @property Portal[] $portals7
 * @property Portal[] $portals8
 * @property Portal[] $portals9
 * @property Portal[] $portals10
 * @property Portal[] $portals11
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%player}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agentId'], 'string', 'max' => 255],
            [['agentId'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agentId' => 'Agent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals()
    {
        return $this->hasMany(Portal::className(), ['mod4OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals0()
    {
        return $this->hasMany(Portal::className(), ['currOwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals1()
    {
        return $this->hasMany(Portal::className(), ['mod1OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals2()
    {
        return $this->hasMany(Portal::className(), ['mod2OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals3()
    {
        return $this->hasMany(Portal::className(), ['mod3OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals4()
    {
        return $this->hasMany(Portal::className(), ['res1OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals5()
    {
        return $this->hasMany(Portal::className(), ['res2OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals6()
    {
        return $this->hasMany(Portal::className(), ['res3OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals7()
    {
        return $this->hasMany(Portal::className(), ['res4OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals8()
    {
        return $this->hasMany(Portal::className(), ['res5OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals9()
    {
        return $this->hasMany(Portal::className(), ['res6OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals10()
    {
        return $this->hasMany(Portal::className(), ['res7OwnerId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortals11()
    {
        return $this->hasMany(Portal::className(), ['res8OwnerId' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PlayerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PlayerQuery(get_called_class());
    }
}
