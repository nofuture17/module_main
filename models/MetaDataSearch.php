<?php

namespace app\modules\main\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\main\models\MetaData;

/**
 * MetaDataSearch represents the model behind the search form about `app\modules\main\models\MetaData`.
 */
class MetaDataSearch extends MetaData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'h1', 'metaDescription', 'metaTitle'], 'safe'],
            [['id', 'active', 'priority'], 'integer'],
        ];
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
        $query = MetaData::find();

        $order = [
            self::ACTIVE_ACTIVE,
            self::ACTIVE_WAIT,
            self::ACTIVE_BLOCKED,
        ];

        if (empty(\yii::$app->getRequest()->getQueryParam('sort'))) {
            $query->orderBy([new \yii\db\Expression('FIELD (active, ' . implode(', ', $order) . ')')]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'h1', $this->h1])
            ->andFilterWhere(['like', 'metaDescription', $this->metaDescription])
            ->andFilterWhere(['like', 'metaTitle', $this->metaTitle]);

        return $dataProvider;
    }
}
