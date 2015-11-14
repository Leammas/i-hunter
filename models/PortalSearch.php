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
     * @var int
     */
    public $timePassed;

    /**
     * @var string
     */
    public $formattedDateCapture;

    /**
     * @var int
     */
    public $involved;

    /**
     * @var string
     */
    public $point1;

    /**
     * @var string
     */
    public $point2;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level', 'resCount', 'res1energy', 'res1level', 'res2energy', 'res2level', 'res3energy', 'res3level', 'res4energy', 'res4level', 'res5energy', 'res5level', 'res6energy', 'res6level', 'res7energy', 'res7level', 'res8energy', 'res8level', 'currOwnerId', 'res1OwnerId', 'res2OwnerId', 'res3OwnerId', 'res4OwnerId', 'res5OwnerId', 'res6OwnerId', 'res7OwnerId', 'res8OwnerId', 'mod1OwnerId', 'mod2OwnerId', 'mod3OwnerId', 'mod4OwnerId', 'involved'], 'integer'],
            [['guid', 'lat', 'lng', 'title', 'curr_owner', 'timeUpdated', 'mode1owner', 'mode1name', 'mode1rarity', 'mode2owner', 'mode2name', 'mode2rarity', 'mode3owner', 'mode3name', 'mode3rarity', 'mode4owner', 'mode4name', 'mode4rarity', 'res1owner', 'res2owner', 'res3owner', 'res4owner', 'res5owner', 'res6owner', 'res7owner', 'res8owner', 'image', 'point1', 'point2', 'timePassed'], 'safe'],
            [['approved', 'dateCapture'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'currOwnerId' => 'Владелец',
            'involved' => 'Держал свечу (мод, рез)',
            'point1' => 'Точка раз',
            'point2' => 'Точка два'
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
        if (empty($params))
        {
            $query = Portal::find()->where(0);
        }
        else
        {
            $query = Portal::find()->joinWith('currOwner', true, 'INNER JOIN');
        }
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort'=> [
                'defaultOrder' => [
                    'timePassed'=> SORT_DESC
                ]
            ]
        ]);

        $dataProvider->sort->attributes['currOwner'] = [
            'asc' => [Player::tableName() . '.agentId' => SORT_ASC],
            'desc' => [Player::tableName() . '.agentId' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['involved'] = [
            'asc' => [Player::tableName() . '.agentId' => SORT_ASC],
            'desc' => [Player::tableName() . '.agentId' => SORT_DESC]
        ];

        $dataProvider->sort->attributes['timePassed'] = [
            'asc' => ['dateCapture' => SORT_DESC],
            'desc' => ['dateCapture' => SORT_ASC]
        ];

        $dataProvider->sort->attributes['formattedDateCapture'] = [
            'asc' => ['dateCapture' => SORT_ASC],
            'desc' => ['dateCapture' => SORT_DESC]
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
            'currOwnerId' => $this->currOwnerId,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
        ;

        if (!empty($this->timePassed))
        {
            if (mb_strpos($this->timePassed, '-') === false)
            {
                $this->timePassed = (int) $this->timePassed;
                $query->andFilterWhere(['<', 'dateCapture', time() - ($this->timePassed - 1) * 3600 * 24]);
                $query->andFilterWhere(['>', 'dateCapture', time() - ($this->timePassed)* 3600 * 24]);
            }
            else
            {
                $data = explode('-', $this->timePassed);
                foreach ($data as &$d)
                {
                    $d = (int) $d;
                }
                $query->andFilterWhere(['<', 'dateCapture', time() - $data[0] * 3600 * 24]);
                $query->andFilterWhere(['>', 'dateCapture', time() - $data[1] * 3600 * 24]);
                unset($data, $d);
            }
        }

        if (!empty($this->point1) && !empty($this->point2))
        {
            if ($this->extractCoords($this->point1)[0] < $this->extractCoords($this->point2)[0])
            {
                $query->andWhere(['between', 'lat', $this->extractCoords($this->point1)[0], $this->extractCoords($this->point2)[0]]);
            }
            else
            {
                $query->andWhere(['between', 'lat', $this->extractCoords($this->point2)[0], $this->extractCoords($this->point1)[0]]);
            }
            if ($this->extractCoords($this->point1)[1] < $this->extractCoords($this->point2)[1])
            {
                $query->andWhere(['between', 'lng', $this->extractCoords($this->point1)[1], $this->extractCoords($this->point2)[1]]);
            }
            else
            {
                $query->andWhere(['between', 'lng', $this->extractCoords($this->point2)[1], $this->extractCoords($this->point1)[1]]);
            }

        }

        if (!empty($this->involved))
        {
            $query->andWhere('
            [[currOwnerId]] = :inv OR
            [[mod1OwnerId]] = :inv OR
            [[mod2OwnerId]] = :inv OR
            [[mod3OwnerId]] = :inv OR
            [[mod4OwnerId]] = :inv OR
            [[res1OwnerId]] = :inv OR
            [[res2OwnerId]] = :inv OR
            [[res3OwnerId]] = :inv OR
            [[res4OwnerId]] = :inv OR
            [[res5OwnerId]] = :inv OR
            [[res6OwnerId]] = :inv OR
            [[res7OwnerId]] = :inv OR
            [[res8OwnerId]] = :inv
            ', [':inv' => $this->involved]);
        }

        return $dataProvider;
    }

    protected function extractCoords($point)
    {
        return array_map('trim', explode(',', $point));
    }

}
