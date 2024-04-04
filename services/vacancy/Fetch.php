<?php

namespace app\services\vacancy;
use app\dto\VacancyItemDto;
use app\models\VacancySearch;
use app\services\BaseService;

class Fetch extends BaseService
{
    public $params;

    public function perform()
    {
        $searchModel = new VacancySearch();
        $searchResult = $searchModel->search($this->params)->getModels();
        
        foreach($searchResult as $model) {
            $this->result[] = $this->buildDto($model);
        }
    }

    private function buildDto($model)
    {
        $dto = new VacancyItemDto($model->name, $model->salary, $model->description);
        return $dto->toArray();
    }
}