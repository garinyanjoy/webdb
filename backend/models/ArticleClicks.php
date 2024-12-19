<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_clicks".
 *
 * @property int $Click_ID
 * @property int|null $article_ID
 * @property int|null $Click_Count
 */
class ArticleClicks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_clicks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Click_ID'], 'required'],
            [['Click_ID', 'article_ID', 'Click_Count'], 'integer'],
            [['Click_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Click_ID' => 'Click ID',
            'article_ID' => 'Article ID',
            'Click_Count' => 'Click Count',
        ];
    }
}
