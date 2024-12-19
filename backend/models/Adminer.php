<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adminer".
 *
 * @property string $adminer_name
 * @property string $create_at
 */
class Adminer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adminer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adminer_name'], 'required'],
            [['create_at'], 'safe'],
            [['adminer_name'], 'string', 'max' => 255],
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
            'create_at' => 'Create At',
        ];
    }
}
