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

        $dto = new VacancyItemDto($model->id, $model->name, $model->salary, $model->description);
        $this->result = $dto->toArray();
    }
}