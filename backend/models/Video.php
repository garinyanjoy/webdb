<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $Video_ID
 * @property string|null $Title
 * @property string|null $Description
 * @property string|null $Picture_URL
 * @property string|null $Video_URL
 * @property string|null $UploadDate
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Video_ID'], 'required'],
            [['Video_ID'], 'integer'],
            [['UploadDate'], 'safe'],
            [['Title', 'Description', 'Picture_URL', 'Video_URL'], 'string', 'max' => 255],
            [['Video_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Video_ID' => 'Video ID',
            'Title' => 'Title',
            'Description' => 'Description',
            'Picture_URL' => 'Picture Url',
            'Video_URL' => 'Video Url',
            'UploadDate' => 'Upload Date',
        ];
    }
}
