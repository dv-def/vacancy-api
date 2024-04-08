<?php

namespace app\controllers;

use app\services\vacancy\Create;
use app\services\vacancy\Fetch;
use app\services\vacancy\View;
use Yii;
use yii\rest\Controller;

class VacancyController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => false,
            ],
              
        ];
  
        unset($behaviors['authenticator']);

        return $behaviors;
    }

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

        return $service->getResult();
    }

    public function actionView($id)
    {
        $service = (new View(['id' => $id]))->call();
        return $service->getResult();
    }
}