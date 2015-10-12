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
        $this->orWhere("[[currOwnerId]]={$owner->id}");
        $this->orWhere("[[res1OwnerId]]={$owner->id}");
        $this->orWhere("[[res2OwnerId]]={$owner->id}");
        $this->orWhere("[[res3OwnerId]]={$owner->id}");
        $this->orWhere("[[res4OwnerId]]={$owner->id}");
        $this->orWhere("[[res5OwnerId]]={$owner->id}");
        $this->orWhere("[[res6OwnerId]]={$owner->id}");
        $this->orWhere("[[res7OwnerId]]={$owner->id}");
        $this->orWhere("[[res8OwnerId]]={$owner->id}");
        $this->orWhere("[[mod1OwnerId]]={$owner->id}");
        $this->orWhere("[[mod2OwnerId]]={$owner->id}");
        $this->orWhere("[[mod3OwnerId]]={$owner->id}");
        return $this->orWhere("[[mod4OwnerId]]={$owner->id}");
    }
}