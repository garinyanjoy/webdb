<?php
namespace app\models;

use yii\db\ActiveRecord;

class Book extends ActiveRecord {
    public static function tableName()
    {
        return '{{%books}}';
    }

    public function rules()
    {
        return [
            [['name', 'author'], 'required'],
            [['name', 'author'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '图书名称',
            'author' => '作者',
        ];
    }
}
