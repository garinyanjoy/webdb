<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $user_name
 * @property string|null $user_password
 * @property string $create_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name'], 'required'],
            [['create_at'], 'safe'],
            [['user_name', 'user_password'], 'string', 'max' => 255],
            [['user_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_name' => 'User Name',
            'user_password' => 'User Password',
            'create_at' => 'Create At',
        ];
    }
}
