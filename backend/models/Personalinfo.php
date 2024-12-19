<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personalinfo".
 *
 * @property string $adminer_name
 * @property string|null $Info
 * @property string|null $AvatarURL
 * @property string|null $Email
 * @property string|null $GitHub_Account
 * @property string|null $WeChatID
 * @property string|null $phone_number
 */
class Personalinfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personalinfo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adminer_name'], 'required'],
            [['adminer_name', 'Info', 'AvatarURL', 'Email', 'GitHub_Account', 'WeChatID'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 11],
            [['adminer_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'adminer_name' => 'Adminer Name',
            'Info' => 'Info',
            'AvatarURL' => 'Avatar Url',
            'Email' => 'Email',
            'GitHub_Account' => 'Git Hub Account',
            'WeChatID' => 'We Chat ID',
            'phone_number' => 'Phone Number',
        ];
    }
}
