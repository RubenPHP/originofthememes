<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VidmageTag;

/**
* VidmageTagSearch represents the model behind the search form about `common\models\VidmageTag`.
*/
class VidmageTagSearch extends VidmageTag
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'vidmage_id', 'tag_id'], 'integer'],
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
$query = VidmageTag::find();

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
            'vidmage_id' => $this->vidmage_id,
            'tag_id' => $this->tag_id,
        ]);

return $dataProvider;
}
}