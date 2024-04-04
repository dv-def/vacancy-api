<?php

namespace app\models;
use yii\db\ActiveRecord;

class Vacancy extends ActiveRecord
{
    public static function tableName()
    {
        return 'vacancy';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'salary'], 'required'],
            ['name', 'string', 'max' => 255],
            ['description', 'string'],
            ['salary', 'double'],
            [['created_at'], 'safe']
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = date('Y-m-d');
        }

        return parent::beforeSave($insert);
    }
}