<?php

namespace app\services\vacancy;
use app\dto\VacancyItemDto;
use app\models\Vacancy;
use app\services\BaseService;

class View extends BaseService
{
    public $id;

    public function perform()
    {
        $model = Vacancy::findOne($this->id);
        $this->result = $model;
    }

    private function buildDto($model)
    {
        $dto = new VacancyItemDto($model->name, $model->salary, $model->description);
        return $dto->toArray();
    }
}