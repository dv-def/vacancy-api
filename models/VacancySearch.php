<?php

namespace app\models;
use yii\data\ActiveDataProvider;

class VacancySearch extends Vacancy
{
    private const DEFAULT_PAGE_SIZE = 10;

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
                    'salary',
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