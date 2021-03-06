<?php

namespace amd_php_dev\module_main\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use amd_php_dev\module_main\models\Menu;

/**
 * MenuSearch represents the model behind the search form about `amd_php_dev\module_main\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active', 'author'], 'integer'],
            [['section', 'name'], 'safe'],
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
        $query = Menu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'author' => $this->author,
        ]);

        $query->andFilterWhere(['like', 'section', $this->section])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
