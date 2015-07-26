<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vidmage;

/**
* VidmageSearch represents the model behind the search form about `common\models\Vidmage`.
*/
class VidmageSearch extends Vidmage
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'user_id', 'views', 'is_active'], 'integer'],
            [['name', 'id_url'], 'safe'],
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
$query = Vidmage::find();

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
            'user_id' => $this->user_id,
            'views' => $this->views,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'id_url', $this->id_url]);

return $dataProvider;
}
}