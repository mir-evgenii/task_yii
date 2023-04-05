<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Log;

class LogSearch extends Log
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['action', 'date', 'user.name', 'user.email'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Log::find()->joinWith('user');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['user.name'] = [
            'asc' => ['user.name' => SORT_ASC],
            'desc' => ['user.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['user.email'] = [
            'asc' => ['user.email' => SORT_ASC],
            'desc' => ['user.email' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'action', $this->action])
              ->andFilterWhere(['like', 'date', $this->date])
              ->andFilterWhere(['like', 'user.name', $this->getAttribute('user.name')])
              ->andFilterWhere(['like', 'user.email', $this->getAttribute('user.email')]);

        return $dataProvider;
    }
}
