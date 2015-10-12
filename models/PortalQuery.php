<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Portal]].
 *
 * @see Portal
 */
class PortalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Portal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Portal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function portalsByOwner(Player $owner)
    {
        return $this->andWhere("[[currOwnerId]]={$owner->id}");
    }

    public function portalsByInvolved(Player $owner)
    {
        return $this->andWhere("[[currOwnerId]]={$owner->id}");
    }
}