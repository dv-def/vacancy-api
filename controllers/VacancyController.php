<?php

namespace app\controllers;

use app\services\vacancy\Create;
use app\services\vacancy\Fetch;
use app\services\vacancy\View;
use Yii;
use yii\rest\Controller;

class VacancyController extends Controller
{
    public function actionIndex()
    {
        $params = Yii::$app->request->get();

        $service = (new Fetch(['params' => $params]))->call();
        return $service->getResult();
    }

    public function actionCreate()
    {
        $params = Yii::$app->request->post();

        $service = (new Create(['params' => $params]))->call();

        if ($service->isSuccess()) {
            return $service->getResult();
        }

        return $service->getErrors();
    }

    public function actionView($id)
    {
        $service = (new View(['id' => $id]))->call();
        return $service->getResult();
    }
}