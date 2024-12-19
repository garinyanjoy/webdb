<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video_clicks".
 *
 * @property int $Click_ID
 * @property int|null $Video_ID
 * @property int|null $Click_Count
 */
class VideoClicks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video_clicks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Click_ID'], 'required'],
            [['Click_ID', 'Video_ID', 'Click_Count'], 'integer'],
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
            'Video_ID' => 'Video ID',
            'Click_Count' => 'Click Count',
        ];
    }
}
