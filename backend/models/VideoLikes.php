<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video_likes".
 *
 * @property int $Like_ID
 * @property int $Video_ID
 * @property int|null $likes
 */
class VideoLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video_likes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Like_ID', 'Video_ID'], 'required'],
            [['Like_ID', 'Video_ID', 'likes'], 'integer'],
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
            'Video_ID' => 'Video ID',
            'likes' => 'Likes',
        ];
    }
}
