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
            $dto = new VacancyItemDto($model->id, $model->name, $model->salary, $model->description);
            $this->result[] = $dto->toArray();
        }
    }
}