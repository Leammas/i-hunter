<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%portal}}".
 *
 * @property string $id
 * @property string $guid
 * @property string $lat
 * @property string $lng
 * @property string $title
 * @property double $approved
 * @property string $curr_owner
 * @property integer $level
 * @property integer $resCount
 * @property double $dateCapture
 * @property string $timeUpdated
 * @property string $mode1owner
 * @property string $mode1name
 * @property string $mode1rarity
 * @property string $mode2owner
 * @property string $mode2name
 * @property string $mode2rarity
 * @property string $mode3owner
 * @property string $mode3name
 * @property string $mode3rarity
 * @property string $mode4owner
 * @property string $mode4name
 * @property string $mode4rarity
 * @property string $res1owner
 * @property integer $res1energy
 * @property integer $res1level
 * @property string $res2owner
 * @property integer $res2energy
 * @property integer $res2level
 * @property string $res3owner
 * @property integer $res3energy
 * @property integer $res3level
 * @property string $res4owner
 * @property integer $res4energy
 * @property integer $res4level
 * @property string $res5owner
 * @property integer $res5energy
 * @property integer $res5level
 * @property string $res6owner
 * @property integer $res6energy
 * @property integer $res6level
 * @property string $res7owner
 * @property integer $res7energy
 * @property integer $res7level
 * @property string $res8owner
 * @property integer $res8energy
 * @property integer $res8level
 * @property string $image
 * @property integer $currOwnerId
 * @property integer $res1OwnerId
 * @property integer $res2OwnerId
 * @property integer $res3OwnerId
 * @property integer $res4OwnerId
 * @property integer $res5OwnerId
 * @property integer $res6OwnerId
 * @property integer $res7OwnerId
 * @property integer $res8OwnerId
 * @property integer $mod1OwnerId
 * @property integer $mod2OwnerId
 * @property integer $mod3OwnerId
 * @property integer $mod4OwnerId
 * @property string $coord
 * @property string $intelLink
 * @property float $timePassed
 * @property string $formattedDateCapture
 *
 * @property Player $mod4Owner
 * @property Player $currOwner
 * @property Player $mod1Owner
 * @property Player $mod2Owner
 * @property Player $mod3Owner
 * @property Player $res1Owner
 * @property Player $res2Owner
 * @property Player $res3Owner
 * @property Player $res4Owner
 * @property Player $res5Owner
 * @property Player $res6Owner
 * @property Player $res7Owner
 * @property Player $res8Owner
 */
class Portal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%portal}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'lat', 'lng', 'title'], 'required'],
            [['approved', 'dateCapture'], 'number'],
            [['curr_owner', 'mode1owner', 'mode2owner', 'mode3owner', 'mode4owner', 'res1owner', 'res2owner', 'res3owner', 'res4owner', 'res5owner', 'res6owner', 'res7owner', 'res8owner', 'image'], 'string'],
            [['level', 'resCount', 'res1energy', 'res1level', 'res2energy', 'res2level', 'res3energy', 'res3level', 'res4energy', 'res4level', 'res5energy', 'res5level', 'res6energy', 'res6level', 'res7energy', 'res7level', 'res8energy', 'res8level', 'currOwnerId', 'res1OwnerId', 'res2OwnerId', 'res3OwnerId', 'res4OwnerId', 'res5OwnerId', 'res6OwnerId', 'res7OwnerId', 'res8OwnerId', 'mod1OwnerId', 'mod2OwnerId', 'mod3OwnerId', 'mod4OwnerId'], 'integer'],
            [['timeUpdated'], 'safe'],
            [['guid'], 'string', 'max' => 35],
            [['lat', 'lng'], 'string', 'max' => 10],
            [['title'], 'string', 'max' => 255],
            [['mode1name', 'mode1rarity', 'mode2name', 'mode2rarity', 'mode3name', 'mode3rarity', 'mode4name', 'mode4rarity'], 'string', 'max' => 1],
            [['mod4OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['mod4OwnerId' => 'id']],
            [['currOwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['currOwnerId' => 'id']],
            [['mod1OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['mod1OwnerId' => 'id']],
            [['mod2OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['mod2OwnerId' => 'id']],
            [['mod3OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['mod3OwnerId' => 'id']],
            [['res1OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['res1OwnerId' => 'id']],
            [['res2OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['res2OwnerId' => 'id']],
            [['res3OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['res3OwnerId' => 'id']],
            [['res4OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['res4OwnerId' => 'id']],
            [['res5OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['res5OwnerId' => 'id']],
            [['res6OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['res6OwnerId' => 'id']],
            [['res7OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['res7OwnerId' => 'id']],
            [['res8OwnerId'], 'exist', 'skipOnError' => true, 'targetClass' => Player::className(), 'targetAttribute' => ['res8OwnerId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guid' => 'Guid',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'title' => 'Наименование портала',
            'approved' => 'Approved',
            'curr_owner' => 'Curr Owner',
            'level' => 'Level',
            'resCount' => 'Res Count',
            'dateCapture' => 'Date Capture',
            'timeUpdated' => 'Time Updated',
            'mode1owner' => 'Mode1owner',
            'mode1name' => 'Mode1name',
            'mode1rarity' => 'Mode1rarity',
            'mode2owner' => 'Mode2owner',
            'mode2name' => 'Mode2name',
            'mode2rarity' => 'Mode2rarity',
            'mode3owner' => 'Mode3owner',
            'mode3name' => 'Mode3name',
            'mode3rarity' => 'Mode3rarity',
            'mode4owner' => 'Mode4owner',
            'mode4name' => 'Mode4name',
            'mode4rarity' => 'Mode4rarity',
            'res1owner' => 'Res1owner',
            'res1energy' => 'Res1energy',
            'res1level' => 'Res1level',
            'res2owner' => 'Res2owner',
            'res2energy' => 'Res2energy',
            'res2level' => 'Res2level',
            'res3owner' => 'Res3owner',
            'res3energy' => 'Res3energy',
            'res3level' => 'Res3level',
            'res4owner' => 'Res4owner',
            'res4energy' => 'Res4energy',
            'res4level' => 'Res4level',
            'res5owner' => 'Res5owner',
            'res5energy' => 'Res5energy',
            'res5level' => 'Res5level',
            'res6owner' => 'Res6owner',
            'res6energy' => 'Res6energy',
            'res6level' => 'Res6level',
            'res7owner' => 'Res7owner',
            'res7energy' => 'Res7energy',
            'res7level' => 'Res7level',
            'res8owner' => 'Res8owner',
            'res8energy' => 'Res8energy',
            'res8level' => 'Res8level',
            'image' => 'Image',
            'currOwnerId' => 'Curr Owner ID',
            'res1OwnerId' => 'Res1 Owner ID',
            'res2OwnerId' => 'Res2 Owner ID',
            'res3OwnerId' => 'Res3 Owner ID',
            'res4OwnerId' => 'Res4 Owner ID',
            'res5OwnerId' => 'Res5 Owner ID',
            'res6OwnerId' => 'Res6 Owner ID',
            'res7OwnerId' => 'Res7 Owner ID',
            'res8OwnerId' => 'Res8 Owner ID',
            'mod1OwnerId' => 'Mod1 Owner ID',
            'mod2OwnerId' => 'Mod2 Owner ID',
            'mod3OwnerId' => 'Mod3 Owner ID',
            'mod4OwnerId' => 'Mod4 Owner ID',
            'coord' => 'Координата',
            'timePassed' => 'Дней с захвата',
            'formattedDateCapture' => 'Дата захвата GMT',
            'intelLink' => 'Ссылка на IntelMap'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrOwner()
    {
        return $this->hasOne(Player::className(), ['id' => 'currOwnerId'])->from(Player::tableName() . ' co');;
    }

    /**
     * @inheritdoc
     * @return PortalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PortalQuery(get_called_class());
    }

    /**
     * @return float Time passed since capture
     */
    public function getTimePassed()
    {
        return ceil(((time() - $this->dateCapture) / 3600) / 24);
    }

    /**
     * @return string Essential content
     */
    public function getBalloon()
    {
        return Yii::$app->view->render('//portal/balloon', ['portal' => $this]);
    }

    public function getCoord()
    {
        return $this->lat . ',' . $this->lng;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMod1Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'mod1OwnerId'])->from(Player::tableName() . ' pmo1');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMod2Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'mod2OwnerId'])->from(Player::tableName() . ' pmo2');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMod3Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'mod3OwnerId'])->from(Player::tableName() . ' pmo3');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMod4Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'mod4OwnerId'])->from(Player::tableName() . ' pmo4');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes1Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'res1OwnerId'])->from(Player::tableName() . ' pro1');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes2Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'res2OwnerId'])->from(Player::tableName() . ' pro2');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes3Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'res3OwnerId'])->from(Player::tableName() . ' pro3');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes4Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'res4OwnerId'])->from(Player::tableName() . ' pro4');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes5Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'res5OwnerId'])->from(Player::tableName() . ' pro5');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes6Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'res6OwnerId'])->from(Player::tableName() . ' pro6');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes7Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'res7OwnerId'])->from(Player::tableName() . ' pro7');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRes8Owner()
    {
        return $this->hasOne(Player::className(), ['id' => 'res8OwnerId'])->from(Player::tableName() . ' pro8');
    }

    public function getIntelLink()
    {
        return 'https://www.ingress.com/intel?pll=' . $this->coord;
    }

    public function getFormattedDateCapture()
    {
        return date('c', $this->dateCapture);
    }
}
