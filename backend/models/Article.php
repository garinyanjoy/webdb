<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $article_ID
 * @property string $title
 * @property string|null $context
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_ID', 'title'], 'required'],
            [['article_ID'], 'integer'],
            [['context'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['article_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_ID' => 'Article ID',
            'title' => 'Title',
            'context' => 'Context',
        ];
    }
}
