<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Player]].
 *
 * @see Player
 */
class PlayerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Player[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Player|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}