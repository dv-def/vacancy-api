<?php

namespace app\models;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

class VacancySearch extends Vacancy
{
    //TODO Плменять на 10
    private const DEFAULT_PAGE_SIZE = 2;

    public function search($params)
    {
        $query = Vacancy::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2
            ]
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}