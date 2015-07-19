<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "author".
 *
 * @property integer $id
 * @property string $name
 * @property string $biography
 * @property string $url_info
 * @property string $url_vine
 * @property string $url_instagram
 * @property string $url_youtube
 * @property string $handle_twitter
 * @property string $handle_snapchat
 * @property integer $is_famous
 *
 * @property \common\models\VidmageAuthor[] $vidmageAuthors
 */
class Author extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['biography'], 'string'],
            [['is_famous'], 'integer'],
            [['name', 'handle_twitter', 'handle_snapchat'], 'string', 'max' => 255],
            [['url_info', 'url_vine', 'url_instagram', 'url_youtube'], 'string', 'max' => 2083]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'biography' => Yii::t('app', 'Biography'),
            'url_info' => Yii::t('app', 'Url Info'),
            'url_vine' => Yii::t('app', 'Url Vine'),
            'url_instagram' => Yii::t('app', 'Url Instagram'),
            'url_youtube' => Yii::t('app', 'Url Youtube'),
            'handle_twitter' => Yii::t('app', 'Handle Twitter'),
            'handle_snapchat' => Yii::t('app', 'Handle Snapchat'),
            'is_famous' => Yii::t('app', 'Is Famous'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmageAuthors()
    {
        return $this->hasMany(\common\models\VidmageAuthor::className(), ['author_id' => 'id']);
    }


    
}
