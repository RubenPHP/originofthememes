<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Platform;

/**
* PlatformSearch represents the model behind the search form about `common\models\Platform`.
*/
class PlatformSearch extends Platform
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id'], 'integer'],
            [['name', 'slug', 'embed_url_pattern', 'download_url_pattern'], 'safe'],
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
$query = Platform::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'embed_url_pattern', $this->embed_url_pattern])
            ->andFilterWhere(['like', 'download_url_pattern', $this->download_url_pattern]);

return $dataProvider;
}
}