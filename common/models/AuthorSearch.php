<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Author;

/**
* AuthorSearch represents the model behind the search form about `common\models\Author`.
*/
class AuthorSearch extends Author
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'is_famous'], 'integer'],
            [['name', 'biography', 'url_info'], 'safe'],
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
$query = Author::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'is_famous' => $this->is_famous,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'biography', $this->biography])
            ->andFilterWhere(['like', 'url_info', $this->url_info]);

return $dataProvider;
}
}