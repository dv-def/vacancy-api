<?php

namespace app\services\vacancy;
use app\models\Vacancy;
use app\models\VacancySearch;
use app\services\BaseService;

class Fetch extends BaseService
{
    public $params;

    public function perform()
    {
        $searchModel = new VacancySearch();
        $this->result = $searchModel->search($this->params)->getModels();
    }
}