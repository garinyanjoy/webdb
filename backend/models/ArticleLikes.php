<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_likes".
 *
 * @property int $Like_ID
 * @property int $article_ID
 * @property int|null $likes
 */
class ArticleLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_likes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Like_ID', 'article_ID'], 'required'],
            [['Like_ID', 'article_ID', 'likes'], 'integer'],
            [['Like_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Like_ID' => 'Like ID',
            'article_ID' => 'Article ID',
            'likes' => 'Likes',
        ];
    }
}
