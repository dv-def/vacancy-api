<?php

namespace app\models;
use yii\data\ActiveDataProvider;

class VacancySearch extends Vacancy
{
    //TODO Поменять на 10
    private const DEFAULT_PAGE_SIZE = 3;

    public function rules()
    {
        return [
            [['name', 'description'], 'string'],
            [['salary'], 'double']
        ];
    }

    public function search($params)
    {
        $query = Vacancy::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => self::DEFAULT_PAGE_SIZE
            ],
            'sort' => [
                'attributes' => [
                    'id',
                    'created_at'
                ]
            ]
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}