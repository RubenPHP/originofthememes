<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VidmageAuthor;

/**
* VidmageAuthorSearch represents the model behind the search form about `common\models\VidmageAuthor`.
*/
class VidmageAuthorSearch extends VidmageAuthor
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'vidmage_id', 'author_id', 'is_main_author'], 'integer'],
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
$query = VidmageAuthor::find();

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
            'author_id' => $this->author_id,
            'is_main_author' => $this->is_main_author,
        ]);

return $dataProvider;
}
}