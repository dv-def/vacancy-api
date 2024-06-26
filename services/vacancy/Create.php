<?php

namespace app\services\vacancy;
use app\models\Vacancy;
use app\services\BaseService;

class Create extends BaseService
{
    public $params;

    public function perform()
    {
        $model = new Vacancy();

        if ($model->load($this->params, "") && $model->save()) {
            $this->result = [
                'success' => true,
                'id' => $model->id
            ];
            return;
        }

        $this->result = [
            'success' => false,
            'errors' => $this->addErrors($model->getErrors())
        ];
    }
}