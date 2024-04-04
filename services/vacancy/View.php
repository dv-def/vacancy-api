<?php

namespace app\services\vacancy;
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
}