<?php

namespace app\controllers;

use app\services\vacancy\Create;
use Yii;
use yii\rest\Controller;

class VacancyController extends Controller
{
    public function actionCreate()
    {
        $params = Yii::$app->request->post();

        $service = (new Create(['params' => $params]))->call();

        if ($service->isSuccess()) {
            return $service->getResult();
        }

        return $service->getErrors();
    }
}