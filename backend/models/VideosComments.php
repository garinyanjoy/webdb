<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos_comments".
 *
 * @property int $Comment_ID
 * @property string $User_name
 * @property int $Video_ID
 * @property string|null $Comment
 * @property string|null $Comment_Date
 * @property int|null $like_count
 */
class VideosComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Comment_ID', 'User_name', 'Video_ID'], 'required'],
            [['Comment_ID', 'Video_ID', 'like_count'], 'integer'],
            [['Comment_Date'], 'safe'],
            [['User_name', 'Comment'], 'string', 'max' => 255],
            [['Comment_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Comment_ID' => 'Comment ID',
            'User_name' => 'User Name',
            'Video_ID' => 'Video ID',
            'Comment' => 'Comment',
            'Comment_Date' => 'Comment Date',
            'like_count' => 'Like Count',
        ];
    }
}
