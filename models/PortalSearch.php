<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Portal;
use yii\helpers\ArrayHelper;

/**
 * PortalSearch represents the model behind the search form about `app\models\Portal`.
 */
class PortalSearch extends Portal
{

    /**
     * @var string
     */
    public $currOwner;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level', 'resCount', 'res1energy', 'res1level', 'res2energy', 'res2level', 'res3energy', 'res3level', 'res4energy', 'res4level', 'res5energy', 'res5level', 'res6energy', 'res6level', 'res7energy', 'res7level', 'res8energy', 'res8level', 'currOwnerId', 'res1OwnerId', 'res2OwnerId', 'res3OwnerId', 'res4OwnerId', 'res5OwnerId', 'res6OwnerId', 'res7OwnerId', 'res8OwnerId', 'mod1OwnerId', 'mod2OwnerId', 'mod3OwnerId', 'mod4OwnerId'], 'integer'],
            [['guid', 'lat', 'lng', 'title', 'curr_owner', 'timeUpdated', 'mode1owner', 'mode1name', 'mode1rarity', 'mode2owner', 'mode2name', 'mode2rarity', 'mode3owner', 'mode3name', 'mode3rarity', 'mode4owner', 'mode4name', 'mode4rarity', 'res1owner', 'res2owner', 'res3owner', 'res4owner', 'res5owner', 'res6owner', 'res7owner', 'res8owner', 'image', 'currOwner'], 'safe'],
            [['approved', 'dateCapture'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'currOwner' => 'Владелец'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Portal::find()->joinWith('currOwner');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['currOwner'] = [
            'asc' => [Player::tableName() . '.agentId' => SORT_ASC],
            'desc' => [Player::tableName() . '.agentId' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'approved' => $this->approved,
            'level' => $this->level,
            'resCount' => $this->resCount,
            'dateCapture' => $this->dateCapture,
            'timeUpdated' => $this->timeUpdated,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', Player::tableName() . '.agentId', $this->currOwner]);
        ;

        return $dataProvider;
    }
}
